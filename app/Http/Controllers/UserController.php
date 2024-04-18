<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

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

        // recuperar os papéis
        $roles = Role::pluck('name')->all();

        return view('admin.user.create', [
            'menu' => 'user',
            'roles' => $roles,
        ]);
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

        //Cadastrar papel do usuário
        $user->assignRole($request->roles);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('admin.user.index', ['user' => $user->id])->with('success', 'Usuário cadastrado com sucesso!');
    }

    //Carregar o Formulário de Editar
    public function edit(User $user)
    {
        //recuperar papéis
        $roles = Role::pluck('name')->all();

        //recuperar o papel do usuário
        $userRoles = $user->roles->pluck('name')->first();
        return view('admin.user.edit', [
            'menu' => 'users',
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles,
        ]);
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

        // editar papel do usuário
        $user->syncRoles($request->roles);

        //redirecionar o usuário e enviar mensagem
        return redirect()->route('admin.user.index')->with('success', 'Usuário atualizaoa com sucesso!');
    }


    //Apagar do Banco de Dados
    public function destroy(User $user)
    {
        try {
            // Excluir o registro no Banco de Dados
            $user->delete();

            // remover todos os papéis atribuídos para o usuário
            $user->syncRoles([]);

            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.user.index')->with('success', 'Usuário excluído com sucesso!');
        } catch (Exception $e) {
            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.user.index')->with('error', 'Usuário não excluído!');
        }
    }
}
