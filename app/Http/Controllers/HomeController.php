<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Portifolio;
use App\Models\Servico;
use App\Models\Sobre;
use Illuminate\Support\Facades\DB;

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
        

        // carregar a VIEW
        return view(
            'site.index', 
            ['config' => $config, 
            'banners' => $banners, 
            'servicos' => $servicos, 
            'portifolios' => $portifolios,
            'sobres' => $sobres
        ]);

    }

    // public function banner()
    // {

    //     // Recuperar os registro do Banco de Dados
    //     $banners = Banner::all();

    //     // carregar a VIEW
    //     return view('site.index', ['banners' => $banners]);
    // }
}
