<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Portifolio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    //Listar Configurações
    public function index()
    {

        // Recuperar os registro do Banco de Dados

        $blog = Blog::orderBy('id')->paginate(10);

        // carregar a VIEW
        return view('admin.blog.index', ['menu' => 'blog', 'blogs' => $blog]);
    }


    //Detalhar Configurações
    public function show(Request $request, Blog $blog)
    {
        return view('admin.blog.show', ['blog' => $blog]);
    }

    //Carregar o Formulário de Cadastro
    public function create()
    {
        return view('admin.blog.create');
    }


    //Cadastrar no Banco de Dados
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'slug' => '',
            'resumo' => 'required',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'conteudo' => 'required',
            'editor' => 'required',
        ]);

        $imagem = time() . '.' . $request->imagem->extension();

        // Mova a imagem para a pasta 'public/storage/blogs' no seu projeto
        $request->imagem->move(public_path('storage/blogs'), $imagem);

        // O caminho da imagem será 'storage/blogs/' concatenado com o nome da imagem
        $path = 'storage/blogs/' . $imagem;

        $blog = Blog::create([
            'titulo' => $request->titulo,
            'slug' => Str::slug($request->titulo),
            'resumo' => $request->resumo,
            'imagem' => $path,
            'conteudo' => $request->conteudo,
            'editor' => $request->editor,
        ]);

        return redirect()->route('admin.blog.index', ['blog' => $blog])
            ->with('success', 'Configurações cadastradas com sucesso!');
    }


    //Carregar o Formulário de Editar
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit', ['blog' => $blog]);
    }

    //Editar no Banco de Dados
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'titulo' => 'required',
            'resumo' => 'required',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'conteudo' => 'required',
            'editor' => 'required',
        ]);

        if ($request->hasFile('imagem')) {
            $imagem = time() . '.' . $request->imagem->extension();

            // Mova a imagem para a pasta 'public/storage/blogs' no seu projeto
            $request->imagem->move(public_path('storage/blogs'), $imagem);

            // O caminho da imagem será 'storage/blogs/' concatenado com o nome da imagem
            $path = 'storage/blogs/' . $imagem;
            $blog->imagem = $path;
        }

        $blog->titulo = $request->titulo;
        $blog->resumo = $request->resumo;
        $blog->conteudo = $request->conteudo;
        $blog->editor = $request->editor;
        $blog->save();

        return redirect()->route('admin.blog.index')->with('success', 'blog atualizado com sucesso!');
    }


    //Apagar do Banco de Dados
    public function destroy(Blog $blog)
    {
        try {
            // Excluir o registro no Banco de Dados
            $blog->delete();

            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.blog.index')->with('success', 'Configuração excluída com sucesso!');
        } catch (Exception $e) {
            /// Redirecionar o usuário, enviar a mensagem de sucesso     
            return redirect()->route('admin.blog.index')->with('error', 'Configuração não excluída!');
        }
    }

}
