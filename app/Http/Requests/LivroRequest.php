<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(){
        $rules = [
            'titulo' => 'required',
            'autor'  => 'required',
            'ano' => 'required|integer',
            'preco' => 'nullable|numeric',
        ];
        return $rules;
    }
}
