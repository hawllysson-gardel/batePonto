<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', 'string', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'birthday' => 'nullable|date_format:Y-m-d',
            'cpf'      => 'required|unique:users|digits:11',
            'cep'      => 'required|digits:8',
            'address'  => 'required|string|max:255',
            'role'     => 'required|exists:roles,id'
        ];
    }
}
