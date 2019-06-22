<?php

namespace App\Http\Requests;

use App\Post;

class UpdatePostRequest extends PostRequest
{
    private function postObject()
    {
        return $this->route('post');
    }

    public function save()
    {
        $this->setData();

        tap($this->postObject())->update($this->data)->addTags($this->tags);
    }

    protected function generateSlug()
    {
        if (
            Post::whereSlug($slug = str_slug($this->data['title']))
                ->where('id' , '!=',$this->postObject()->id)
                ->exists()
        ) $slug = "$slug-" . $this->postObject()->id;

        $this->data['slug'] = $slug;
    }
}
