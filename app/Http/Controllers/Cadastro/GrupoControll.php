<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\GrupoRequest;
use App\Models\grupo;
use Illuminate\Http\Request;

class GrupoControll extends Controller
{
    private $grupo;
    private $totalPage = 10;

    public function __construct(grupo $grupo)
    {
        $this->grupo = $grupo;

    }

    public function index()
    {
        $title = 'Listagem de grupo';

        $grupos = grupo::paginate($this->totalPage);

        return view('cadastro.grupo.index', compact('grupos', 'title'));
    }


    public function create()
    {


        return view('cadastro.grupo.create');
    }


    public function store(GrupoRequest $request)
    {

        $dataFormgrupo = $request->all();

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            // Define um aleatório para o imagem baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do imagem
            $extension = $request->imagem->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            $dataFormproduto['imagem'] = $nameFile;
            // Faz o upload:
            $upload = $request->imagem->storeAs('categories', $nameFile);
            // Se tiver funcionado o imagem foi armazenado em storage/app/public/categories/nomedinamicoimagem.extensao

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();

        }

        $insert = grupo::create($dataFormgrupo);

        if($insert)
            return redirect()
                            ->route('grupo.index')
                            ->with(['success' => "Cadastro Realizado com Sucesso"]);
        else
            return redirect()
                            ->route('grupo.create')
                            ->with(['erros' => "Erro ao Cadastrar :("]);
    }


    public function show($id)
    {
        $grupos = grupo::where('id',$id)->get();


        return view('cadastro.grupo.show', compact ('grupos'));
    }

    public function edit($id)
    {
        $grupo = $this->grupo->find($id);

        return view('cadastro.grupo.create', compact ('grupo'));
    }


    public function update(GrupoRequest $request, $id)
    {
        $dataFormgrupo = $request->all();

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            // Define um aleatório para o imagem baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do imagem
            $extension = $request->imagem->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            $dataFormproduto['imagem'] = $nameFile;
            // Faz o upload:
            $upload = $request->imagem->storeAs('categories', $nameFile);
            // Se tiver funcionado o imagem foi armazenado em storage/app/public/categories/nomedinamicoimagem.extensao

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();

        }

         $grupo = $this->grupo->find($id);


         $update = $grupo->update($dataFormgrupo);

         if( $update)
             return redirect()
                            ->route('grupo.index')
                            ->with(['success' => "Alteração com Sucesso"]);
         else
             return redirect()->route('grupo.edit', ['id' => $id])->with(['error' => 'Falha ao editar']);
    }


    public function destroy($id)
    {
        //
    }
}
