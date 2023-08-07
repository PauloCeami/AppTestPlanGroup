<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $primaryKey = 'prd_id';
    protected $fillable = ['prd_nome', 'prd_descricao','mrc_id'];


    /**
     * Get the brand associated with the product.
     */
    public function marca()
    {
        return $this->hasOne(Marcas::class, 'mrc_id');
    }


}