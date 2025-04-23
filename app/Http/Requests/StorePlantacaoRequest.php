<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlantacaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:45',
            'plantacoes_users' => 'required|exists:users,idusers',
            'lucro' => 'required|numeric|min:0',
            'status' => 'required|boolean',
            'custo_producao' => 'required|numeric|min:0',
        ];
    }
}
