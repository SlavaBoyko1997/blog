<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'role' => 'required|string',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Поле не повинне бути пустим',
            'name.string' => 'Імя повинне бути строкою',
            'email.required' => 'Поле не повинне бути пустим',
            'email.string' => 'Імя повинне бути строкою',
            'email.email' => 'Email введений некоректно',
            'email.unique' => 'Користувач з таким Email вже існує',
        ];
    }
}
