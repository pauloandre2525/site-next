<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //Listar Configurações
    public function index()
    {

        // Recuperar os registro do Banco de Dados
        $config = DB::table('config')->first();
        $banners = Banner::all();

        // carregar a VIEW
        return view('site.index', ['config' => $config, 'banners' => $banners]);

    }

    // public function banner()
    // {

    //     // Recuperar os registro do Banco de Dados
    //     $banners = Banner::all();

    //     // carregar a VIEW
    //     return view('site.index', ['banners' => $banners]);
    // }
}
