<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookshelfRequest extends FormRequest
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
            'location' => 'required|string|max:10',
            'active' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'location.required' => 'A localização da Prateleira deve ser preenchida',
            'location.string' => 'A localização da Prateleira deve ser preenchida com caracteres alfa numéricos',
            'location.max' => 'A localização da Prateleira deve conter no máximo 10 caracteres',
            'active.boolean' => 'Status do título deve ser respondido corretamente',
        ];
    }

}
