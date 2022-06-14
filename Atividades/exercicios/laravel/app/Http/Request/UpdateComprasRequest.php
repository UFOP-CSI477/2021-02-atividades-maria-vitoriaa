<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComprasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'pessoa_id' => 'required|exists:pessoa,id',
            'produto_id' => 'required|exists:produtos,id',
        ];
    }

    public function messages()
    {
        return [
            'pessoa_id.required' => 'O campo pessoa é obrigatório',
            'pessoa_id.exists' => 'O campo pessoa deve ser válido',
            'produto_id.required' => 'O campo produto é obrigatório',
            'produto_id.exists' => 'O campo produto deve ser válido',
        ];
    }
}