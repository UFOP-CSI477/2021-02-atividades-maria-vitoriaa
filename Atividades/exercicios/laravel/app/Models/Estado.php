<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;//traits

    protected $fillable = ['name', 'sigla'];

    public function cidades()
    {
        return $this->hasMany(Cidade::class);
    }
}
