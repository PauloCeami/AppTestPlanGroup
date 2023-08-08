<?php

namespace App\Repositories;

use App\Models\Produtos;

class ProdutoRepository
{
    protected $entity;

    public function __construct(Produtos $produto)
    {
        $this->entity = $produto;
    }

    public function getAll()
    {
        return $this->entity->all();
    }

    public function getProduto(string $identify)
    {
        return $this->entity->findOrFail($identify);
    }

    public function createNew(array $data)
    {
        return $this->entity->create($data);
    }

    public function update(string $identify, array $data)
    {
        $produto = $this->getProduto($identify);

        return $produto->update($data);
    }

    public function delete(string $identify)
    {
        $produto = $this->getProduto($identify);

        return $produto->delete();
    }
}