<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaxaRequest;
use App\Models\taxa;
use Illuminate\Http\Request;

class TaxaControll extends Controller
{
    private $taxa;
    private $totalPage = 10;

    public function __construct(taxa $taxa)
    {
        $this->taxa = $taxa;

    }

    public function index()
    {
        $title = 'Listagem de taxa';

        $taxas = taxa::paginate($this->totalPage);

        return view('cadastro.taxa.index', compact('taxas', 'title'));
    }


    public function create()
    {


        return view('cadastro.taxa.create');
    }


    public function store(TaxaRequest $request)
    {

        $dataFormtaxa = $request->all();

        $insert = taxa::create($dataFormtaxa);

        if($insert)
            return redirect()
                            ->route('taxa.index')
                            ->with(['success' => "Cadastro Realizado com Sucesso"]);
        else
            return redirect()
                            ->route('taxa.create')
                            ->with(['erros' => "Erro ao Cadastrar :("]);
    }


    public function show($id)
    {
        $taxas = taxa::where('id',$id)->get();


        return view('cadastro.taxa.show', compact ('taxas'));
    }

    public function edit($id)
    {
        $taxa = $this->taxa->find($id);

        return view('cadastro.taxa.create', compact ('taxa'));
    }


    public function update(TaxaRequest $request, $id)
    {
        $dataFormtaxa = $request->all();



         $taxa = $this->taxa->find($id);


         $update = $taxa->update($dataFormtaxa);

         if( $update)
             return redirect()
                            ->route('taxa.index')
                            ->with(['success' => "Alteração com Sucesso"]);
         else
             return redirect()->route('taxa.edit', ['id' => $id])->with(['error' => 'Falha ao editar']);
    }


    public function destroy($id)
    {
        //
    }
}
