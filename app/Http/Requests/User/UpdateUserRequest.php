<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name'     => 'nullable|string|max:255',
            'email'    => ['nullable', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->id)],
            'password' => ['nullable', 'confirmed', 'string', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'birthday' => 'nullable|date_format:Y-m-d',
            'cpf'      => ['nullable', 'digits:11', Rule::unique('users')->ignore($this->id)],
            'cep'      => 'nullable|digits:8',
            'address'  => 'nullable|string|max:255'
        ];
    }
}
