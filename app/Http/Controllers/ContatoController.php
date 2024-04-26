<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Exception;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    //Listar Configurações
    public function index()
    {

        // Recuperar os registro do Banco de Dados
        $contato = Contato::orderBy('id', 'desc')->paginate(2);

        // carregar a VIEW
        return view('admin.contato.index', ['menu' => 'contato', 'contatos' => $contato]);
    }


    //Detalhar Configurações
    public function show(Request $request, Contato $contato)
    {
        return view('admin.contato.show', ['contato' => $contato]);
    }

    //Carregar o Formulário de Cadastro
    // public function create()
    // {
    //     return view('admin.equipe.create');
    // }


    // //Cadastrar no Banco de Dados
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nome' => 'required',
    //         'funcao' => 'required',
    //         'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'whatsapp' => 'required',
    //         'facebook' => 'required',
    //         'instagram' => 'required',
    //         'status' => 'required',
    //     ]);

    //     $imagem = time() . '.' . $request->imagem->extension();

    //     $path = $request->imagem->storeAs('equipes', $imagem, 'public');

    //     // Obtenha o caminho completo da imagem
    //     $fullPath = asset('storage/' . $path);

    //     $equipe = Equipe::create([
    //         'nome' => $request->nome,
    //         'funcao' => $request->funcao,
    //         'imagem' => $fullPath,
    //         'whatsapp' => $request->whatsapp,
    //         'facebook' => $request->facebook,
    //         'instagram' => $request->instagram,
    //         'status' => $request->status,
    //     ]);

    //     return redirect()->route('admin.equipe.index', ['equipe' => $equipe])
    //         ->with('success', 'Equipe nós cadastrado com sucesso!');
    // }


    // //Carregar o Formulário de Editar
    // public function edit($id)
    // {
    //     $equipe = Equipe::find($id);
    //     return view('admin.equipe.edit', ['equipe' => $equipe]);
    // }

    // //Editar no Banco de Dados
    // public function update(Request $request, Equipe $equipe)
    // {

    //     if ($request->hasFile('imagem')) {
    //         $imagem = time() . '.' . $request->imagem->extension();
    //         $path = $request->imagem->storeAs('equipes', $imagem, 'public');
    //         $equipe->imagem = $imagem;

    //         // Obtenha o caminho completo da imagem
    //         $fullPath = asset('storage/' . $path);
    //         $equipe->imagem = $fullPath;
    //     }

    //     $equipe->nome = $request->nome;
    //     $equipe->funcao = $request->funcao;
    //     $equipe->whatsapp = $request->whatsapp;
    //     $equipe->facebook = $request->facebook;
    //     $equipe->instagram = $request->instagram;
    //     $equipe->status = $request->status;
    //     $equipe->save();

    //     return redirect()->route('admin.equipe.index')->with('success', 'Equipe nós atualizado com sucesso!');
    // }



    // //Apagar do Banco de Dados
    // public function destroy(Equipe $equipe)
    // {
    //     try {
    //         // Excluir o registro no Banco de Dados
    //         $equipe->delete();

    //         /// Redirecionar o usuário, enviar a mensagem de sucesso     
    //         return redirect()->route('admin.equipe.index')->with('success', 'Equipe nós excluído com sucesso!');
    //     } catch (Exception $e) {
    //         /// Redirecionar o usuário, enviar a mensagem de sucesso     
    //         return redirect()->route('admin.equipe.index')->with('error', 'Equipe nós não excluído!');
    //     }
    // }
}
