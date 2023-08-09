<?php

namespace App\Http\Requests;

use App\Models\Produtos;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProdutoRequest extends FormRequest
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
            'prd_nome' => [
                'required',
                'min:4',
                'max:50',
                'unique:produtos'
            ],
            'prd_descricao' => [
                'required',
                'min:3',
                'max:255',
            ],
            'mrc_id' => [
                'required'
            ]
        ];
    }

    public function messages()
    {
        return [
            'prd_nome.required' => 'Nome do Produto obrigatório',
            'prd_nome.min' => 'O minimo de chars deve ser de 4 para o nome do produto',
            'prd_nome.max' => 'Voce ultrapassou o limite de chars para o nome do produto',
            'prd_nome.unique' => 'Este nome de produto já existe',

            'prd_descricao.required' => 'Descrição do produto é obrigatória',
            'prd_descricao.min' => 'O minimo de chars deve ser de 4 para a descrição do produto',
            'prd_descricao.max' => 'Voce ultrapassou o limite de chars na descrição do produto',

            'mrc_id.required' => 'A marca do produto deve ser selecionada',
        ];
    }
}