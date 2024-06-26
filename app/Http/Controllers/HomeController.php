<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Contato;
use App\Models\Equipe;
use App\Models\Portifolio;
use App\Models\Servico;
use App\Models\Sobre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //Listar Configurações
    public function index()
    {

        // Recuperar os registro do Banco de Dados
        $config = DB::table('config')->first();
        $banners = Banner::where('status', 'ativo')->get();
        $servicos = Servico::where('status', 'ativo')->get();
        $portifolios = Portifolio::where('status', 'ativo')->get();
        $sobres = Sobre::where('status', 'ativo')->get();
        $equipes = Equipe::where('status', 'ativo')->get();
        

        // carregar a VIEW
        return view(
            'site.index', 
            ['config' => $config, 
            'banners' => $banners, 
            'servicos' => $servicos, 
            'portifolios' => $portifolios,
            'sobres' => $sobres,
            'equipes' => $equipes
        ]);

    }

    public function contato()
    {
        return view('site.index');
    }

    public function postContato(Request $request)
    {
        $rules = array('nome' => 'required', 'email' => 'required|email', 'texto' => 'required');
        $validation = Validator::make($request->all(), $rules);
        $data = array();
        $data['nome'] = $request->input("nome");
        $data['email'] = $request->input("email");
        $data['telefone'] = $request->input("telefone");
        $data['texto'] = $request->input("texto");

        if ($validation->passes()) {
            // Salvar as informações no banco de dados
            Contato::create($data);

            // Enviar e-mail para o remetente
            Mail::send('site.emails', $data, function ($message) use ($data) {
                $message->from($data['email'], $data['nome'], $data['telefone']);
                $message->to($data['email'])->subject('Mensagem enviada com sucesso!');
            });
            // Redirecionar para a página inicial
            return redirect('/#contato')->with('message', 'Mensagem enviada com sucesso!');
        }
        return redirect('/#contato')
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'Erro! Preencha todos os campos corretamente.');
    }

}
