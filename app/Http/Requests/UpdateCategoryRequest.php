<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories,name,' . $this->category()->id
        ];
    }

    public function save()
    {
        $this->data = $this->validated();

        $this->generateSlug();

        $this->category()->update($this->data);
    }

    protected function generateSlug()
    {
        if (
            Category::whereSlug($slug = str_slug($this->data['name']))
                ->where('id' , '!=', $this->category()->id)
                ->exists()
        ) $slug = "$slug-" . $this->category()->id;

        $this->data['slug'] = $slug;
    }

    private function category()
    {
        return $this->route('category');
    }
}
