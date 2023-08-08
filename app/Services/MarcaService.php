<?php

namespace App\Services;

use App\Repositories\MarcasRepository;


class MarcaService 
{
    protected $repository;

    public function __construct(MarcasRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllMarcas()
    {
        return $this->repository->getAll();
    }

    public function createNewMarca(array $data)
    {
        return $this->repository->createNew($data);
    }

    public function getMarca(string $identify)
    {
        return $this->repository->getMarca($identify);
    }   

    public function updateMarca(string $identify, array $data)
    {
        return $this->repository->update($identify, $data);
    }

    public function deleteMarca(string $identify)
    {
        return $this->repository->delete($identify);
    }
}
