<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
        $update = ($this->route('group')) ? ',name,' . $this->route('group')->id : '';
        return [
            'name' => 'required|min:4|unique:groups' . $update,
            'users' => 'required',
        ];
    }
}
