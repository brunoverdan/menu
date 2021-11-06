<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoRequest;
use App\Models\produto;
use Illuminate\Http\Request;

class ProdutoControll extends Controller
{
    private $produto;
    private $totalPage = 10;

    public function __construct(produto $produto)
    {
        $this->produto = $produto;

    }

    public function index()
    {
        $title = 'Listagem de produto';

        $produtos = produto::paginate($this->totalPage);

        return view('cadastro.produto.index', compact('produtos', 'title'));
    }

    public function create()
    {


        return view('cadastro.produto.create');
    }


    public function store(ProdutoRequest $request)
    {

        $dataFormproduto = $request->all();


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

        //insere os dados
        $insert = produto::create($dataFormproduto);

        //confirma se deu certo o insert
        if($insert)
            return redirect()
                            ->route('produto.index')
                            ->with(['success' => "Cadastro Realizado com Sucesso"]);
        else
            return redirect()
                            ->route('produto.create')
                            ->with(['erros' => "Erro ao Cadastrar :("]);
    }


    public function show($id)
    {
        $produtos = produto::where('id',$id)->get();


        return view('cadastro.produto.show', compact ('produtos'));
    }


    public function edit($id)
    {
        $produto = $this->produto->find($id);

        return view('cadastro.produto.create', compact ('produto'));
    }


    public function update(ProdutoRequest $request, $id)
    {
        $dataFormproduto = $request->all();


         //recupera o dado do banco de dados
         $produto = $this->produto->find($id);


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

         //faz o update
         $update = $produto->update($dataFormproduto);

         if( $update)
             return redirect()
                            ->route('produto.index')
                            ->with(['success' => "Alteração com Sucesso"]);
         else
             return redirect()->route('produto.edit', ['id' => $id])->with(['error' => 'Falha ao editar']);
    }


    public function destroy($id)
    {
        //
    }

}
