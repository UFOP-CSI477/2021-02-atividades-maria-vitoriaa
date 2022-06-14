<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'pessoa_id',
        'produto_id',
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}