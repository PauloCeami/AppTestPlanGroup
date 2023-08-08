<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProdutoRequest;
use App\Http\Resources\ProdutoResource;
use App\Models\Marcas;
use App\Models\Produtos;
use App\Services\MarcaService;
use App\Services\ProdutoService;
use Exception;
use \Illuminate\Database\Eloquent\ModelNotFoundException;

class ProdutosController extends Controller
{

    protected $serviceProduto;
    protected $serviceMarcas;

    public function __construct(ProdutoService $prdService, MarcaService $marcaService)
    {
        $this->serviceProduto = $prdService;
        $this->serviceMarcas = $marcaService;
    }

    public function index()
    {
        $produtos = $this->serviceProduto->getAllProdutos();
        return ProdutoResource::collection($produtos);
    }

    public function store(StoreUpdateProdutoRequest $request)
    {
        try {
            $this->serviceMarcas->getMarca($request->mrc_id);
            $this->serviceProduto->createNewProduto($request->validated());
            return response()->json(
                "produto cadastrado com sucesso !!"
            );
        } catch (ModelNotFoundException $e) {
            return response([
                'status' => 'ERROR',
                'error' => 'marca não encontrada, verifique... [' . $e->getMessage() . ']',
            ], 404);
        }
    }


    public function show($id)
    {
        try {
            $prd = $this->serviceProduto->getProduto($id);
            return new ProdutoResource($prd);
        } catch (ModelNotFoundException $e) {
            return response([
                'status' => 'ERROR',
                'error' => 'produto não encontrada com id:' . $id,
            ], 404);
        }
    }


    public function update(StoreUpdateProdutoRequest $request, $id)
    {
        try {
            $this->serviceMarcas->getMarca($request->mrc_id);
            $prd = $this->serviceProduto->getProduto($id);
            $prd->update($request->all());
            return response()->json(
                "produto alterado com sucesso !!"
            );
        } catch (ModelNotFoundException $e) {
            return response([
                'status' => 'ERROR ',
                'error' => 'erro ao atualizar o produto, verifique... [' . $e->getMessage() . ']',
            ], 404);
        }
    }


    public function destroy($id)
    {
        try {
            $this->serviceProduto->deleteProduto($id);
            return response()->json(
                "produto excluido com sucesso"
            );
        } catch (ModelNotFoundException $e) {
            return response([
                'status' => 'ERROR',
                'error' => 'erro ao excluir o produto, verifique... [' . $e->getMessage() . ']',
            ], 404);
        }

    }

}