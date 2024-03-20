<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Config;

class HomeController extends Controller
{
    //Listar Configurações
    public function index()
    {

        // Recuperar os registro do Banco de Dados
        $config = Config::orderBy('id')->paginate(2);
        $banner = Banner::orderBy('id')->paginate(2);

        // carregar a VIEW
        return view('site.index', ['configs' => $config, 'banners' => $banner]);
    }

    public function banner()
    {

        // Recuperar os registro do Banco de Dados
        $banner = Banner::orderBy('id')->paginate(2);

        // carregar a VIEW
        return view('site.index', ['banners' => $banner]);
    }
}
