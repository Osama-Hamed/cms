<?php

namespace App\Http\Requests;

use App\Post;
use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->redirect = $this->postObject()->newCommentFormPath();

        return [
            'author_name' => 'required',
            'author_email' => 'required|email',
            'author_url' => 'nullable|url',
            'body' => 'required'
        ];
    }

    public function postObject()
    {
        return $this->route('post');
    }


    /**
     * @return Post $post
     */
    public function save()
    {
        return tap($this->postObject())->addComment($this->validated());
    }
}
