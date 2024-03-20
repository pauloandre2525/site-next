<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //Listar Configurações
    public function index()
    {

        // Recuperar os registro do Banco de Dados
        $banner = Banner::orderBy('id')->paginate(10);

        // carregar a VIEW
        return view('admin.banner.index', ['menu' => 'banner', 'banners' => $banner]);
    }


    //Detalhar Configurações
    public function show(Request $request, Banner $banner)
    {
        return view('admin.banner.index', ['banner' => $banner]);
    }


    //Carregar o Formulário de Cadastro
    public function create()
    {
        return view('admin.banner.create');
    }


    //Cadastrar no Banco de Dados
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'legenda' => 'required',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        $imageName = time() . '.' . $request->imagem->extension();

        $request->imagem->move(public_path('images'), $imageName);

        $banner = Banner::create([
            'name' => $request->name,
            'legenda' => $request->legenda,
            'imagem' => $imageName,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.banner.index')
        ->with('success', 'Configurações cadastradas com sucesso!');
    }


    //Carregar o Formulário de Editar
    public function edit(Request $request)
    {
        $banner = Banner::find(1);
        return view('admin.banner.edit', ['banner' => $banner]);
    }

    //Editar no Banco de Dados
    public function update(Request $request)
    {
        $request->update([
            'name' => $request->titulo,
            'legenda' => $request->legenda,
            'imagem' => $request->imagem,
            'status' => $request->status
        ]);

        //redirecionar o usuário e enviar mensagem
        return redirect()->route('admin.banner.index')->with('success', 'Configuração atualizada com sucesso!');
    }


    //Apagar do Banco de Dados
    public function destroy(Banner $banner)
    {
        try {
            // Excluir o registro no Banco de Dados
            $banner->delete();

            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.banner.index')->with('success', 'Configuração excluída com sucesso!');
        } catch (Exception $e) {
            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.banner.index')->with('error', 'Configuração não excluída!');
        }
    }
}
