<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Listar Usuários
    public function index()
    {

        // Recuperar os registro do Banco de Dados
        $user = User::orderBy('id')->paginate(10);

        // carregar a VIEW
        return view('admin.user.index', ['menu' => 'user', 'users' => $user]);
    }


    //Detalhar Usuários
    public function show(Request $request, User $user)
    {
        return view('admin.user.show', ['menu' => 'user', 'user' => $user]);
    }


    //Carregar o Formulário de Cadastro
    public function create()
    {
        return view('admin.user.create', ['menu' => 'user']);
    }


    //Cadastrar no Banco de Dados
    public function store(UserRequest $request, User $user)
    {

        //Validar o Formulário
        $request->validated();

        //Cadastrar no Banco de Dados (valores selecionados)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('admin.user.index', ['user' => $user->id])->with('success', 'Usuário cadastrado com sucesso!');
    }

    //Carregar o Formulário de Editar
    public function edit(Request $request)
    {
        $user = User::find(1);
        return view('admin.user.edit', ['user' => $user]);
    }

    //Editar no Banco de Dados
    public function update(UserRequest $request, User $user)
    {
        //Validar o Formulário
        $request->validated();
      
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        //redirecionar o usuário e enviar mensagem
        return redirect()->route('admin.user.index')->with('success', 'Usuário atualizaoa com sucesso!');
    }


    //Apagar do Banco de Dados
    public function destroy(User $user)
    {
        try {
            // Excluir o registro no Banco de Dados
            $user->delete();

            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.user.index')->with('success', 'Usuário excluído com sucesso!');
        } catch (Exception $e) {
            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.user.index')->with('error', 'Usuário não excluído!');
        }
    }
}
