<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FraseRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'dia_semana' => ['required', 'string'],
            'texto' => ['required', 'string'],
            'pontuacao' => ['required', 'numeric', 'between:0,10'],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('pontuacao')) {
            $value = $this->input('pontuacao');
            if (is_string($value)) {
                $value = str_replace(',', '.', $value);
            }
            $this->merge(['pontuacao' => $value]);
        }
    }
}
