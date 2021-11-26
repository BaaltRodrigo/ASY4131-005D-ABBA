<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePersonalInformationRequest extends FormRequest
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
            'nombre' => ['required', 'string'],
            'apellidos' => ['required', 'string'],
            'direccion' => ['sometimes', 'string', 'nullable'],
            'sexo' => ['required', 'string', Rule::in(['M', 'H', 'm', 'h'])],
        ];
    }
}
