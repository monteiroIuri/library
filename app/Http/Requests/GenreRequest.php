<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
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
            'title' => 'required|string|max:191',
            'description' => 'string',
            'active' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O título deve ser preenchida',
            'title.string' => 'O título deve ser preenchida com caracteres alfa numéricos',
            'title.max' => 'O título deve conter no máximo 191 caracteres',
            'description.string' => 'A descrição deve ser preenchida com caracteres alfa numéricos',
            'active.boolean' => 'Status do título deve ser respondido corretamente',
        ];
    }
}
