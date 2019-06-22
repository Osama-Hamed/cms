<?php

namespace App\Http\Requests;

use App\Post;

class StorePostRequest extends PostRequest
{
	public function save()
	{
		$this->setData();

		$this->user()->posts()->create($this->data)->addTags($this->tags);
	}

    protected function generateSlug()
    {
        if (Post::whereSlug($slug = str_slug($this->data['title']))->exists()) {
            $slug = "$slug-" . (Post::latest()->first()->id + 1);
        }

        $this->data['slug'] = $slug;
	}
}
