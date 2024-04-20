<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Exception;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    //Listar Configurações
    public function index()
    {

        // Recuperar os registro do Banco de Dados
        $servico = Servico::orderBy('id')->paginate(10);

        // carregar a VIEW
        return view('admin.servico.index', ['menu' => 'servico', 'servicos' => $servico]);
    }


    //Detalhar Configurações
    public function show(Request $request, Servico $servico)
    {
        return view('admin.servico.show', ['servico' => $servico]);
    }
 
    //Carregar o Formulário de Cadastro
    public function create()
    {
        return view('admin.servico.create');
    }


    //Cadastrar no Banco de Dados
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'imagem' => 'required',
            'status' => 'required',
        ]);

    //     $imagem = time() . '.' . $request->imagem->extension();

    //    $path = $request->imagem->storeAs('servicos', $imagem, 'public');

    //     // Obtenha o caminho completo da imagem
    //     $fullPath = asset('storage/' . $path);

        $servico = Servico::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'imagem' => $request->imagem,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.servico.index', ['servico' => $servico])
        ->with('success', 'Serviço cadastradas com sucesso!');
    }


    //Carregar o Formulário de Editar
    public function edit($id)
    {
        $servico = Servico::find($id);
        return view('admin.servico.edit', ['servico' => $servico]);
    }

    //Editar no Banco de Dados
    public function update(Request $request, Servico $servico)
    {
        
        // if ($request->hasFile('imagem')) {
        //     $imagem = time() . '.' . $request->imagem->extension();
        //     $request->imagem->storeAs('servicos', $imagem, 'public');
        //     $servico->imagem = $imagem;
        // }

        $servico->titulo = $request->titulo;
        $servico->descricao = $request->descricao;
        $servico->imagem = $request->imagem;
        $servico->status = $request->status;
        $servico->save();

        return redirect()->route('admin.servico.index')->with('success', 'Serviço atualizado com sucesso!');
    }



    //Apagar do Banco de Dados
    public function destroy(Servico $servico)
    {
        try {
            // Excluir o registro no Banco de Dados
            $servico->delete();

            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.servico.index')->with('success', 'Serviço excluída com sucesso!');
        } catch (Exception $e) {
            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.servico.index')->with('error', 'Servico não excluída!');
        }
    }
}
