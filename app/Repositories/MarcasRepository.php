<?php

namespace App\Repositories;

use App\Models\Marcas;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MarcasRepository
{
    protected $entity;

    public function __construct(Marcas $marcas)
    {
        $this->entity = $marcas;
    }

    public function getAll()
    {
        return $this->entity->all();
    }

    public function getMarca(string $identify)
    {
        return $this->entity->findOrFail($identify);
    }

    public function createNew(array $data)
    {
        return $this->entity->create($data);
    }

    public function update(string $identify, array $data)
    {
        $produto = $this->getMarca($identify);

        return $produto->update($data);
    }

    public function delete(string $identify)
    {
        $produto = $this->getMarca($identify);

        return $produto->delete();
    }
}