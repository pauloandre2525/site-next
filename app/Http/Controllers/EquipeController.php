<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Exception;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    //Listar Configurações
    public function index()
    {

        // Recuperar os registro do Banco de Dados
        $equipe = Equipe::orderBy('id')->paginate(10);

        // carregar a VIEW
        return view('admin.equipe.index', ['menu' => 'equipe', 'equipes' => $equipe]);
    }


    //Detalhar Configurações
    public function show(Request $request, Equipe $equipe)
    {
        return view('admin.equipe.show', ['equipe' => $equipe]);
    }

    //Carregar o Formulário de Cadastro
    public function create()
    {
        return view('admin.equipe.create');
    }


    //Cadastrar no Banco de Dados
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'funcao' => 'required',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'whatsapp' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'status' => 'required',
        ]);

        $imagem = time() . '.' . $request->imagem->extension();

        // Mova a imagem para a pasta 'public/storage/equipes' no seu projeto
        $request->imagem->move(public_path('storage/equipes'), $imagem);

        // O caminho da imagem será 'storage/equipes/' concatenado com o nome da imagem
        $path = 'storage/equipes/' . $imagem;

        $equipe = Equipe::create([
            'nome' => $request->nome,
            'funcao' => $request->funcao,
            'imagem' => $path,
            'whatsapp' => $request->whatsapp,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.equipe.index', ['equipe' => $equipe])
            ->with('success', 'Equipe nós cadastrado com sucesso!');
    }


    //Carregar o Formulário de Editar
    public function edit($id)
    {
        $equipe = Equipe::find($id);
        return view('admin.equipe.edit', ['equipe' => $equipe]);
    }

    //Editar no Banco de Dados
    public function update(Request $request, Equipe $equipe)
    {

        if ($request->hasFile('imagem')) {
            $imagem = time() . '.' . $request->imagem->extension();

            // Mova a imagem para a pasta 'public/storage/equipes' no seu projeto
            $request->imagem->move(public_path('storage/equipes'), $imagem);

            // O caminho da imagem será 'storage/equipes/' concatenado com o nome da imagem
            $path = 'storage/equipes/' . $imagem;
            $equipe->imagem = $path;
        }

        $equipe->nome = $request->nome;
        $equipe->funcao = $request->funcao;
        $equipe->whatsapp = $request->whatsapp;
        $equipe->facebook = $request->facebook;
        $equipe->instagram = $request->instagram;
        $equipe->status = $request->status;
        $equipe->save();

        return redirect()->route('admin.equipe.index')->with('success', 'Equipe nós atualizado com sucesso!');
    }



    //Apagar do Banco de Dados
    public function destroy(Equipe $equipe)
    {
        try {
            // Excluir o registro no Banco de Dados
            $equipe->delete();

            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.equipe.index')->with('success', 'Equipe nós excluído com sucesso!');
        } catch (Exception $e) {
            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.equipe.index')->with('error', 'Equipe nós não excluído!');
        }
    }
}
