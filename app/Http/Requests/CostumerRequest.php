<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CostumerRequest extends FormRequest
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
            'name' => 'required',
            'cpf' =>  'required',
            'email' =>  'required',
            'telephone' =>  'required',
            'city' =>  'required',
            'state' =>  'required',
            'street' =>  'required',
            'district' =>  'required',
            'cep' =>  'required',
            'number' =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'cpf.required' => 'CPF é obrigatório',
            'email.required' => 'Email é obrigatório',
            'telephone.required' => 'Telefone é obrigatório',
            'city.required' => 'Cidade é obrigatório',
            'state.required' => 'Estado é obrigatório',
            'street.required' => 'Rua é obrigatório',
            'district.required' => 'Bairro é obrigatório',
            'cep.required' => 'CEP é obrigatório',
            'number.required' => 'Número é obrigatório'
        ];
    }
}
