<?php

namespace App\Http\Requests\Point;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StorePointRequest extends FormRequest
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
            'description' => 'required|string|max:255',
            'entry_time'  => 'required|date_format:Y-m-d\TH:i',
            'exit_time'   => 'required|date_format:Y-m-d\TH:i|after:entry_time'
        ];
    }
}
