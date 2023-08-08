<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    use HasFactory;

    protected $primaryKey = 'mrc_id';

    protected $fillable = ['mrc_nome' ];
   

    public function produtos()
    {
        return $this->hasMany(Produtos::class);
    }
}
