<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;//traits
    protected $fillable = ['name', 'um'];
    public function compras()
    {
        return $this->hasMany(Compra::class);
    }
}
