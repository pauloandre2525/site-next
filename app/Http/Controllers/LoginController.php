<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class LoginController extends Controller
{
    //Login
    public function index()
    {
        //carregar a VIEW
        return view('login.index');
    }

    //Processar o login
    public function loginProcess(LoginRequest $request)
    {
        //validar o formulário
        $request->validated();

        //Validar usuário e senha com o banco de dados
        $auhenticated = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        //verificar se o usuário foi autenticado
        if(!$auhenticated){

            //redirecina para a tela de login e exibi mensagem de erro
            return back()->withInput()->with('error', 'Email ou Senha inválidos!');
        }

        //obter usuário autenticado
        $user = Auth::user();
        $user = User::find($user->id);

        // verifica se a premissão é Super Admin
        if($user->hasRole('Super Admin')){

            // O usuário tem todas as permissões
            $permissions = Permission::pluck('name')->toArray();
        } else{

            // recuperar do banco de dados as permissões que o papel possui
            $permissions = $user->getPermissionsViaRoles()->pluck('name')->toArray();
        }

        // atribuir as permissões ao usuário
        $user->syncPermissions($permissions);

        //redireciona o usuário
        return redirect()->route('admin.index');
    }

    public function destroy()
    {
        //Deslogar o usuário
        Auth::logout();

        //Redireciona o usuário após o logout
        return redirect()->route('login');
    }
}