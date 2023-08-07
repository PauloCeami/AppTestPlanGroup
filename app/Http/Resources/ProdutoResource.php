<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'prd_id' => $this->prd_id,
            'prd_nome' => $this->prd_nome,
            'prd_descricao' => $this->prd_descricao,
            'mrc_id' => $this->mrc_id
        ];
    }
}