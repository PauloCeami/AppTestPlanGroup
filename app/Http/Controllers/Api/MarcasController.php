<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateMarcaRequest;
use App\Http\Resources\MarcaResource;
use App\Models\Marcas;
use App\Services\MarcaService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class MarcasController extends Controller
{


    protected $serviceMarcas;

    public function __construct(MarcaService $marcaService)
    {
        $this->serviceMarcas = $marcaService;
    }

    public function index()
    {
        $marcas = $this->serviceMarcas->getAllMarcas();
        return MarcaResource::collection($marcas);
    }


    public function store(StoreUpdateMarcaRequest $request)
    {
        $this->serviceMarcas->createNewMarca($request->validated());
        return response()->json(
            "marca cadastrada com sucesso !!"
        );
    }


    public function show($id)
    {
        try {
            $marca = $this->serviceMarcas->getMarca($id);
            return new MarcaResource($marca);
        } catch (ModelNotFoundException $e) {
            return response([
                'status' => 'ERROR',
                'error' => 'marca não encontrada com id:' . $id,
            ], 404);
        }
    }


    public function update(StoreUpdateMarcaRequest $request, $id)
    {
        try {
            $marca = $this->serviceMarcas->getMarca($id);
            $marca->update($request->all());
            return response()->json(
                "marca alterada com sucesso !!"
            );
        } catch (ModelNotFoundException $e) {
            return response([
                'status' => 'ERROR',
                'error' => 'marca não encontrada com id:' . $id,
            ], 404);
        }
    }


    public function destroy($id)
    {
        try {
            $this->serviceMarcas->deleteMarca($id);
            return response()->json(
                "marca excluida com sucesso"
            );
        } catch (ModelNotFoundException $e) {
            return response([
                'status' => 'ERROR',
                'error' => 'marca não encontrada com id:' . $id,
            ], 404);
        }

    }


}