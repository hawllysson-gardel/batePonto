<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

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
            'password' => ['required', 'confirmed', 'string', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()]
        ];
    }

    public function messages()
    {
        return [
            'email.required'     => 'O email é obrigatório!',
            'email.string'       => 'Insira um email válido!',
            'email.email'        => 'Insira um email válido!',

            'password.required'  => 'A senha é obrigatória!',
            'password.confirmed' => 'Senha não confirmada!',
            'password.string'    => 'Insira uma senha válida!',
            'password.min'       => 'A senha deve ser maior ou igual a 8 caracteres!'
        ];
    }
}
