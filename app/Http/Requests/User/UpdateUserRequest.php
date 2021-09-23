<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use App\Models\User;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        try {
            $user = User::findOrFail($this->id);

            if(auth()->user()->id == $user->user_id) {
                return true;
            }

            return redirect(route('user.edit', ['id' => $request->id]))->with(['code' => 201, 'message' => 'Usuário editado com sucesso!']);
        } catch (\Throwable $th) {
            return false;
        }
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
            'birthday' => 'nullable|date_format:Y-m-d',
            'cpf'      => ['nullable', 'digits:11', Rule::unique('users')->ignore($this->id)],
            'cep'      => 'nullable|digits:8',
            'address'  => 'nullable|string|max:255',
            'role_id'  => 'nullable|exists:roles,id'
        ];
    }
}
