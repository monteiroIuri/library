<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'abstract' => 'string',
            'amount' => 'integer',
            'active' => 'boolean',        
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do Livro deve ser preenchido',
            'name.string' => 'O nome do Livro deve ser preenchido com caracteres alfa numéricos',
            'name.max' => 'O nome do Livro deve conter no máximo 191 caracteres',
            'abstract.string' => 'O Resumo do Livro deve ser preenchido com caracteres alfa numéricos',
            'amount.integer' => 'A quantidade de Livros deve ser um número inteiro',
            'active.boolean' => 'Status do Livro deve ser respondido corretamente',
        ];
    }
}
