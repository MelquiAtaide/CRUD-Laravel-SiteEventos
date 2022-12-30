<?php

namespace App\Http\Requests;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'titulo' => 'required',
            'cidade' => 'required',
            'privado' => 'required',
            'descricao' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'O campo título é obrigatório.',
            'cidade.required' => 'O campo cidade é obrigatório.',
            'descricao.required' => 'O campo descricao é obrigatório.',
        ];
    }
}
