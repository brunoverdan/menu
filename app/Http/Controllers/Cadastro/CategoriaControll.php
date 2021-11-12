<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use App\Http\Resources\CategoriaResource;
use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaControll extends Controller
{
    protected $repository;

    public function __construct(categoria $model)
    {
        $this->repository = $model;

    }

    public function index(Request $request)
    {


        $categorias= $this->repository->get();
        return $categorias;

    }



    public function store(CategoriaRequest $request)
    {



            $categorias = $this->repository->create($request->validated());
            return response()->json(['messagem' => 'Sucesso'], 200);


        /**
         *  Caso queira pode desabilidar a linha a cima e habilidar
         *  O outro returno para verificar os dados
         */

        //return new CategoriaResource($categorias);


    }

    public function show($id)
    {
        $categorias = $this->repository->where('id', $id)->firstOrFail();

        return new CategoriaResource($categorias);
    }


    public function update(CategoriaRequest $request, $id)
    {

            $categorias = $this->repository->where('id', $id)->firstOrFail();
            $categorias = $this->repository->update($request->validated());
            return response()->json(['messagem' => 'Sucesso'], 200);

    }


    public function destroy($id)
    {
        $categorias = $this->repository->where('id', $id)->firstOrFail();

        $categorias->delete();

        return response()->json([], 204);
    }



}
