<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Exception;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    //Listar Configurações
    public function index()
    {

        // Recuperar os registro do Banco de Dados
        $config = Config::orderBy('id')->paginate(2);

        // carregar a VIEW
        return view('admin.config.index', ['menu' => 'config', 'configs' => $config]);
    }


    //Detalhar Configurações
    public function show(Request $request, Config $config)
    {
        return view('admin.config.show', ['config' => $config]);
    }


    //Carregar o Formulário de Cadastro
    public function create()
    {
        return view('admin.config.create');
    }


    //Cadastrar no Banco de Dados
    public function store(Request $request)
    {
        $config = Config::create($request->all());

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('admin.config.show', ['config' => $config->id])->with('success', 'Configurações cadastradas com sucesso!');
    }

    //Carregar o Formulário de Editar
    public function edit(Request $request)
    {
        $config = Config::find(1);
        return view('admin.config.edit', ['config' => $config]);
    }

    //Editar no Banco de Dados
    public function update(Request $request)
    {
        $config = Config::find(1);
        $config->update([
            'titulo' => $request->titulo,
            'descricao' => $request->slogan,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco
        ]);

        //redirecionar o usuário e enviar mensagem
        return redirect()->route('admin.config.index')->with('success', 'Configuração atualizada com sucesso!');
    }


    //Apagar do Banco de Dados
    public function destroy(Config $config)
    {
        try {
            // Excluir o registro no Banco de Dados
            $config->delete();

            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.config.index')->with('success', 'Configuração excluída com sucesso!');
        } catch (Exception $e) {
            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.config.index')->with('error', 'Configuração não excluída!');
        }
    }
}
