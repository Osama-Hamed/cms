<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    private $data = [];

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
        return [
            'name' => 'required|unique:categories'
        ];
    }

    public function save()
    {
        $this->data = $this->validated();

        $this->generateSlug();

        Category::create($this->data);
    }


    protected function generateSlug()
    {
        if (Category::whereSlug($slug = str_slug($this->data['name']))->exists()) {
            $slug = "$slug-" . (Category::latest()->first()->id + 1);
        }

        $this->data['slug'] = $slug;
    }
}
