<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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