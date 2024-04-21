<?php

namespace App\Http\Controllers;

use App\Models\Sobre;
use Exception;
use Illuminate\Http\Request;

class SobreController extends Controller
{
    //Listar Configurações
    public function index()
    {

        // Recuperar os registro do Banco de Dados
        $sobre = Sobre::orderBy('id')->paginate(10);

        // carregar a VIEW
        return view('admin.sobre.index', ['menu' => 'sobre', 'sobres' => $sobre]);
    }


    //Detalhar Configurações
    public function show(Request $request, Sobre $sobre)
    {
        return view('admin.sobre.show', ['sobre' => $sobre]);
    }

    //Carregar o Formulário de Cadastro
    public function create()
    {
        return view('admin.sobre.create');
    }


    //Cadastrar no Banco de Dados
    public function store(Request $request)
    {
        $request->validate([
            'periodo' => 'required',
            'titulo' => 'required',
            'descricao' => 'required',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'posicaoimagem' => 'required',
            'status' => 'required',
        ]);

        $imagem = time() . '.' . $request->imagem->extension();

        $path = $request->imagem->storeAs('sobres', $imagem, 'public');

        // Obtenha o caminho completo da imagem
        $fullPath = asset('storage/' . $path);

        $sobre = Sobre::create([
            'periodo' => $request->periodo,
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'imagem' => $fullPath,
            'posicaoimagem' => $request->posicaoimagem,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.sobre.index', ['sobre' => $sobre])
            ->with('success', 'Sobre nós cadastrado com sucesso!');
    }


    //Carregar o Formulário de Editar
    public function edit($id)
    {
        $sobre = Sobre::find($id);
        return view('admin.sobre.edit', ['sobre' => $sobre]);
    }

    //Editar no Banco de Dados
    public function update(Request $request, Sobre $sobre)
    {

        if ($request->hasFile('imagem')) {
            $imagem = time() . '.' . $request->imagem->extension();
            $path = $request->imagem->storeAs('sobres', $imagem, 'public');
            $sobre->imagem = $imagem;

            // Obtenha o caminho completo da imagem
            $fullPath = asset('storage/' . $path);
            $sobre->imagem = $fullPath;
        }

        $sobre->periodo = $request->periodo;
        $sobre->titulo = $request->titulo;
        $sobre->descricao = $request->descricao;
        $sobre->posicaoimagem = $request->posicaoimagem;
        $sobre->status = $request->status;
        $sobre->save();

        return redirect()->route('admin.sobre.index')->with('success', 'Sobre nós atualizado com sucesso!');
    }



    //Apagar do Banco de Dados
    public function destroy(Sobre $sobre)
    {
        try {
            // Excluir o registro no Banco de Dados
            $sobre->delete();

            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.sobre.index')->with('success', 'Sobre nós excluído com sucesso!');
        } catch (Exception $e) {
            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.sobre.index')->with('error', 'Sobre nós não excluído!');
        }
    }
}
