<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return [
            'email' => 'required|email|unique:users' . ',email,' . $this->route('user')->id,
            'name' => 'required',
            'surname' => 'required',
            'gender' => 'required|boolean',
            'country' => 'required',
            'city' => 'required',
            'post_number' => 'required',
            'phone_number' => 'required|unique:users' . ',phone_number,' . $this->route('user')->id,
        ];
    }
}
