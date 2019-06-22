<?php

namespace App;

use App\Filters\PostFilters;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'excerpt', 'body', 'published_at', 'image'];
    protected $dates = ['published_at'];
    protected $with = ['author', 'category', 'tags'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('commentsCount', function ($builder) {
            return $builder->withCount('comments');
        });
    }

    public function author()
    {
        return $this->belongsTo(User::class)->withCount('posts');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public static function published()
    {
        return static::latest('published_at')->published();
    }

    public static function popular()
    {
        return static::orderBy('views', 'desc')
            ->published()
            ->take(3)
            ->get();
    }

    public static function archives()
    {
        return static::selectRaw('count(*) posts_count, year(published_at) year, monthname(published_at) month')
            ->published()
            ->groupBy('year', 'month')
            ->orderByRaw('min(published_at) desc')
            ->withoutGlobalScope('commentsCount')
            ->get();
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeFilter($query, PostFilters $filters)
    {
        return $filters->apply($query);
    }

    public function isPublished()
    {
        return ! is_null($this->published_at) && $this->published_at <= Carbon::now();
    }

    public function isScheduled()
    {
        return ! $this->isPublished() && ! is_null($this->published_at);
    }

    public function addComment($comment)
    {
        return $this->comments()->create($comment);
    }

    public function addTags($tagsString)
    {
        if (! $tagsString) {
            $this->tags()->detach();

            return;
        }

        $this->tags()->detach();

        foreach ($tags = explode(',', $tagsString) as $tagName) {

            $tag = Tag::firstOrCreate(
                ['name' => ucwords(trim($tagName))],
                ['slug' => str_slug($tagName)]
            );

            $this->tags()->attach($tag);
        }
    }

    public function getStatusAttribute()
    {
        if ($this->isPublished()) return ['status' => 'Published', 'label' => 'success'];

        elseif ($this->isScheduled()) return ['status' => 'Scheduled', 'label' => 'warning'];

        else return ['status' => 'Draft', 'label' => 'danger'];
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function path()
    {
        return "/posts/{$this->category->slug}/$this->slug";
    }

    public function commentsPath()
    {
        return $this->path() . '#post-comments';
    }

    public function newCommentFormPath()
    {
        return $this->path() . '#comment-form';
    }
}
