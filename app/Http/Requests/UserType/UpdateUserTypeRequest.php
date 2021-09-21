<?php

namespace App\Http\Requests\UserType;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserTypeRequest extends FormRequest
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
            'type' => 'required|unique:user_types|min:2|string'
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'O tipo é obrigatório!',
            'type.unique'   => 'O tipo já existe ou está inativada no banco de dados!',
            'type.min'      => 'O tipo deve ser maior ou igual a 2 caracteres!',
            'type.string'   => 'O tipo deve ser do tipo string!'
        ];
    }
}
