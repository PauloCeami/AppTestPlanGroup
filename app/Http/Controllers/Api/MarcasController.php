<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateMarcaRequest;
use App\Http\Resources\MarcaResource;
use App\Models\Marcas;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class MarcasController extends Controller
{

    public function index()
    {
        return MarcaResource::collection(Marcas::all());
    }


    public function store(StoreUpdateMarcaRequest $request)
    {
        Marcas::create($request->validated());
        return response()->json(
            "marca cadastrado com sucesso !!"
        );
    }


    public function show($id)
    {
        try {
            $marca = Marcas::findorfail($id);
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
            $marca = Marcas::findorfail($id);
            $marca->update($request->all());
            return response()->json(
                "marca alterado com sucesso !!"
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
            Marcas::findorfail($id)->delete();
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