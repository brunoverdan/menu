<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\CupomRequest;
use App\Models\cupom;
use Illuminate\Http\Request;

class CupomControll extends Controller
{

    private $cupom;
    private $totalPage = 10;

    public function __construct(cupom $cupom)
    {
        $this->cupom = $cupom;

    }

    public function index()
    {
        $title = 'Listagem de cupom';

        $cupoms = cupom::paginate($this->totalPage);

        return view('cadastro.cupom.index', compact('cupoms', 'title'));
    }


    public function create()
    {


        return view('cadastro.cupom.create');
    }


    public function store(CupomRequest $request)
    {

        $dataFormcupom = $request->all();

        $insert = cupom::create($dataFormcupom);

        if($insert)
            return redirect()
                            ->route('cupom.index')
                            ->with(['success' => "Cadastro Realizado com Sucesso"]);
        else
            return redirect()
                            ->route('cupom.create')
                            ->with(['erros' => "Erro ao Cadastrar :("]);
    }


    public function show($id)
    {
        $cupoms = cupom::where('id',$id)->get();


        return view('cadastro.cupom.show', compact ('cupoms'));
    }

    public function edit($id)
    {
        $cupom = $this->cupom->find($id);

        return view('cadastro.cupom.create', compact ('cupom'));
    }


    public function update(CupomRequest $request, $id)
    {
        $dataFormcupom = $request->all();



         $cupom = $this->cupom->find($id);


         $update = $cupom->update($dataFormcupom);

         if( $update)
             return redirect()
                            ->route('cupom.index')
                            ->with(['success' => "Alteração com Sucesso"]);
         else
             return redirect()->route('cupom.edit', ['id' => $id])->with(['error' => 'Falha ao editar']);
    }


    public function destroy($id)
    {
        //
    }


}
