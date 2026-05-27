<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Frase extends Model
{
    
    protected function pontuacao(): Attribute
    {
        return Attribute::make(
            get: fn($value) => number_format($value, 2, ',', ''),
            set: fn($value) => str_replace(',','.',$value)
        );
    }
}
