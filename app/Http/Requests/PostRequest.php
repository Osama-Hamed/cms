<?php

namespace App\Http\Requests;

use App\Post;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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

	public function save()
	{
		$data = $this->validated();

		if ($image = $this->file('image')) $data['image'] = $this->uploadImage($image);

		$post = $this->user()->posts()->create($data);

		$post->addTags($this->tags);
	}

	private function uploadImage($image)
	{
		$image->move(public_path('cms/img'), $imageName = time() . '_' . $this->file('image')->getClientOriginalName());

		return $imageName;
	}
}
