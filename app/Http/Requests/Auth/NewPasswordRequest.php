<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class NewPasswordRequest extends FormRequest
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
            'token'    => 'required|string|email|max:255',
            'email'    => 'required|string|email|max:255',
            'password' => ['required', 'confirmed', 'string', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()]
        ];
    }
}
