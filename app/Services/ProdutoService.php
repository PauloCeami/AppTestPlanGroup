<?php

namespace App\Services;

use App\Repositories\ProdutoRepository;

class ProdutoService 
{
    protected $repository;

    public function __construct(ProdutoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllProdutos()
    {
        return $this->repository->getAll();
    }

    public function createNewProduto(array $data)
    {
        return $this->repository->createNew($data);
    }

    public function getProduto(string $identify)
    {
        return $this->repository->getProduto($identify);
    }

    public function updateProduto(string $identify, array $data)
    {
        return $this->repository->update($identify, $data);
    }

    public function deleteProduto(string $identify)
    {
        return $this->repository->delete($identify);
    }
}
