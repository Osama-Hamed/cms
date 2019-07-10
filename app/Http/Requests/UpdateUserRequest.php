<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateUserRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $this->route('user')->id,
            'password' => 'required|min:8|confirmed',
            'role_id' => 'required|exists:roles,id'
        ];
    }

    public function save()
    {
        $this->data = $this->validated();

        $this->data['password'] = Hash::make($this->data['password']);

        if ($this->route('user')->id != 1) tap($this->route('user'))->update($this->data)->detachRoles()->attachRole($this->data['role_id']);
        else $this->route('user')->update($this->data);

    }
}
