<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Frase extends Model
{
    protected $fillable = [
        'dia_semana',
        'texto',
        'pontuacao',
        'user_id',
        'edited_by_user_id',
    ];

    protected function pontuacao(): Attribute
    {
        return Attribute::make(
            get: fn($value) => is_null($value) ? null : number_format($value, 2, ',', ''),
            set: function ($value) {
                if (is_null($value) || $value === '') {
                    return null;
                }
                if (is_string($value)) {
                    $value = trim(str_replace(',', '.', $value));
                }
                return $value;
            }
        );
    }
}
