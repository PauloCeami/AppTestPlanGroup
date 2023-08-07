<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProdutoRequest;

use App\Http\Resources\ProdutoResource;
use App\Models\Marcas;
use App\Models\Produtos;
use \Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        return ProdutoResource::collection(Produtos::all());
    }


    public function store(StoreUpdateProdutoRequest $request)
    {
        try {
            Marcas::findorfail($request->mrc_id);
            Produtos::create($request->validated());
            return response()->json(
                "produto cadastrado com sucesso !!"
            );
        } catch (ModelNotFoundException $e) {
            return response([
                'status' => 'ERROR',
                'error' => 'marca não encontrada com id:' . $request->mrc_id,
            ], 404);
        }
    }


    public function show($id)
    {
        try {
            $prd = Produtos::findorfail($id);
            return new ProdutoResource($prd);
        } catch (ModelNotFoundException $e) {
            return response([
                'status' => 'ERROR',
                'error' => 'produto não encontrada com id:' . $id,
            ], 404);
        }
    }
}