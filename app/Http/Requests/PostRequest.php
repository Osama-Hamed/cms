<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class PostRequest extends FormRequest
{
    protected $data = [];
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function setData()
    {
        $this->data = $this->validated();

        $this->generateSlug();

        $this->uploadImage();
    }

    public function attributes()
    {
        return [
            'category_id' => 'category',
        ];
    }

    public function messages()
    {
        return [
            'published_at.date_format' => 'publishing date format is not valid'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'published_at' => 'nullable|date_format:Y-m-d H:i:s',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    protected function uploadImage()
    {
        if ($image = $this->file('image')) {

            $image->move(public_path('cms/img/posts'), $imageName = time() . '_' . $this->file('image')->getClientOriginalName());

            $this->data['image'] = $imageName;
        }
    }

    abstract protected function generateSlug();
}
