<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cidade_id'];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function compras()
    {
        return $this->hasMany(Compra::class);
    }
}