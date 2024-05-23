<?php

namespace App\Http\Controllers;

use App\Models\Portifolio;
use Exception;
use Illuminate\Http\Request;

class PortifolioController extends Controller
{
    //Listar Configurações
    public function index()
    {

        // Recuperar os registro do Banco de Dados
        $portifolio = Portifolio::orderBy('id')->paginate(10);

        // carregar a VIEW
        return view('admin.portifolio.index', ['menu' => 'portifolio', 'portifolios' => $portifolio]);
    }


    //Detalhar Configurações
    public function show(Request $request, Portifolio $portifolio)
    {
        return view('admin.portifolio.show', ['portifolio' => $portifolio]);
    }

    //Carregar o Formulário de Cadastro
    public function create()
    {
        return view('admin.portifolio.create');
    }


    //Cadastrar no Banco de Dados
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cliente' => 'required',
            'categoria' => 'required',
            'status' => 'required',
        ]);

        $imagem = time() . '.' . $request->imagem->extension();

        // Mova a imagem para a pasta 'public/storage/portifolios' no seu projeto
        $request->imagem->move(public_path('storage/portifolios'), $imagem);

        // O caminho da imagem será 'storage/portifolios/' concatenado com o nome da imagem
        $path = 'storage/portifolios/' . $imagem;

        $portifolio = Portifolio::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'imagem' => $path,
            'cliente' => $request->cliente,
            'categoria' => $request->categoria,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.portifolio.index', ['portifolio' => $portifolio])
            ->with('success', 'Configurações cadastradas com sucesso!');
    }


    //Carregar o Formulário de Editar
    public function edit($id)
    {
        $portifolio = Portifolio::find($id);
        return view('admin.portifolio.edit', ['portifolio' => $portifolio]);
    }

    //Editar no Banco de Dados
    public function update(Request $request, Portifolio $portifolio)
    {

        if ($request->hasFile('imagem')) {
            $imagem = time() . '.' . $request->imagem->extension();

            // Mova a imagem para a pasta 'public/storage/portifolios' no seu projeto
            $request->imagem->move(public_path('storage/portifolios'), $imagem);

            // O caminho da imagem será 'storage/portifolios/' concatenado com o nome da imagem
            $path = 'storage/portifolios/' . $imagem;
            $portifolio->imagem = $path;
        }

        $portifolio->nome = $request->nome;
        $portifolio->descricao = $request->descricao;
        $portifolio->cliente = $request->cliente;
        $portifolio->categoria = $request->categoria;
        $portifolio->status = $request->status;
        $portifolio->save();

        return redirect()->route('admin.portifolio.index')->with('success', 'Portifolio atualizado com sucesso!');
    }



    //Apagar do Banco de Dados
    public function destroy(Portifolio $portifolio)
    {
        try {
            // Excluir o registro no Banco de Dados
            $portifolio->delete();

            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.portifolio.index')->with('success', 'Configuração excluída com sucesso!');
        } catch (Exception $e) {
            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.portifolio.index')->with('error', 'Configuração não excluída!');
        }
    }
}
