<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
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
            'titulo' => 'required|max:90',
            'sub' => 'required|max:90',
            'biografia' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Título é um campo obrigatório',
            'sub.required'  => 'Subtítulo é um campo obrigatório',
            'biografia.required' => 'Biografia é um campo obrigatório'

        ];
    }
}
