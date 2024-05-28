<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PortifolioController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/aplicacoes', [HomeController::class, 'servico'])->name('aplicacoes');
Route::get('/clientes', [HomeController::class, 'portifolio'])->name('clientes');
Route::get('/blog', [HomeController::class, 'show'])->name('blog');
Route::get('/sobre-nos', [HomeController::class, 'empresa'])->name('sobre-nos');
Route::get('/contato', [HomeController::class, 'contato'])->name('contato');
Route::post('/contato', [HomeController::class, 'postContato'])->name('postContato');


//LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loginprocess', [LoginController::class, 'loginProcess'])->name('login.process');

Route::middleware(['auth'])->group(function () {
    //LOGOUT
    Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');

    //ADMIN
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    //CONFIGURAÇÕES
    Route::get('/admin/config', [ConfigController::class, 'index'])
        ->middleware('permission:index-config')
        ->name('admin.config.index');
    Route::get('/admin/show-config/{config}', [ConfigController::class, 'show'])
        ->middleware('permission:show-config')
        ->name('admin.config.show');
    Route::get('/admin/create-config', [ConfigController::class, 'create'])
        ->middleware('permission:create-config')
        ->name('admin.config.create');
    Route::post('/admin/store-config', [ConfigController::class, 'store'])
        ->name('admin.config.store');
    Route::get('/admin/edit-config/{config}', [ConfigController::class, 'edit'])
        ->middleware('permission:edit-config')
        ->name('admin.config.edit');
    Route::put('/admin/update-config/{config}', [ConfigController::class, 'update'])
        ->name('admin.config.update');
    Route::delete('/admindelete-config/{config}', [ConfigController::class, 'destroy'])
        ->middleware('permission:destroy-config')
        ->name('admin.config.delete');

    //USUÁRIOS
    Route::get('/admin/user', [UserController::class, 'index'])
        ->middleware('permission:index-user')
        ->name('admin.user.index');
    Route::get('/admin/show-user/{user}', [UserController::class, 'show'])
        ->middleware('permission:show-user')
        ->name('admin.user.show');
    Route::get('/admin/create-user', [UserController::class, 'create'])
        ->middleware('permission:create-user')
        ->name('admin.user.create');
    Route::post('/admin/store-user', [UserController::class, 'store'])
        ->name('admin.user.store');
    Route::get('/admin/edit-user/{user}', [UserController::class, 'edit'])
        ->middleware('permission:edit-user')
        ->name('admin.user.edit');
    Route::put('/admin/update-user/{user}', [UserController::class, 'update'])
        ->name('admin.user.update');
    Route::delete('/admindelete-user/{user}', [UserController::class, 'destroy'])
        ->middleware('permission:destroy-user')
        ->name('admin.user.delete');


    //BANNER TOPO
    Route::get('/admin/banner', [BannerController::class, 'index'])
        ->middleware('permission:index-banner')
        ->name('admin.banner.index');
    Route::get('/admin/show-banner/{banner}', [BannerController::class, 'show'])
        ->middleware('permission:show-banner')
        ->name('admin.banner.show');
    Route::get('/admin/create-banner', [BannerController::class, 'create'])
        ->middleware('permission:create-banner')
        ->name('admin.banner.create');
    Route::post('/admin/store-banner', [BannerController::class, 'store'])
        ->name('admin.banner.store');
    Route::get('/admin/edit-banner/{banner}', [BannerController::class, 'edit'])
        ->middleware('permission:edit-banner')
        ->name('admin.banner.edit');
    Route::put('/admin/update-banner/{banner}', [BannerController::class, 'update'])
        ->name('admin.banner.update');
    Route::delete('/admindelete-banner/{banner}', [BannerController::class, 'destroy'])
        ->middleware('permission:destroy-banner')
        ->name('admin.banner.delete');

    //AREA SERVIÇOS
    Route::get('/admin/servico', [ServicoController::class, 'index'])
        ->middleware('permission:index-servico')
        ->name('admin.servico.index');
    Route::get('/admin/show-servico/{servico}', [ServicoController::class, 'show'])
        ->middleware('permission:show-servico')
        ->name('admin.servico.show');
    Route::get('/admin/create-servico', [ServicoController::class, 'create'])
        ->middleware('permission:create-servico')
        ->name('admin.servico.create');
    Route::post('/admin/store-servico', [ServicoController::class, 'store'])
        ->name('admin.servico.store');
    Route::get('/admin/edit-servico/{servico}', [ServicoController::class, 'edit'])
        ->middleware('permission:edit-servico')
        ->name('admin.servico.edit');
    Route::put('/admin/update-servico/{servico}', [ServicoController::class, 'update'])
        ->name('admin.servico.update');
    Route::delete('/admindelete-servico/{servico}', [ServicoController::class, 'destroy'])
        ->middleware('permission:destroy-servico')
        ->name('admin.servico.delete');


    //AREA PORTIFOLIO
    Route::get('/admin/portifolio', [PortifolioController::class, 'index'])
        ->middleware('permission:index-portifolio')
        ->name('admin.portifolio.index');
    Route::get('/admin/show-portifolio/{portifolio}', [PortifolioController::class, 'show'])
        ->middleware('permission:show-portifolio')
        ->name('admin.portifolio.show');
    Route::get('/admin/create-portifolio', [PortifolioController::class, 'create'])
        ->middleware('permission:create-portifolio')
        ->name('admin.portifolio.create');
    Route::post('/admin/store-portifolio', [PortifolioController::class, 'store'])
        ->name('admin.portifolio.store');
    Route::get('/admin/edit-portifolio/{portifolio}', [PortifolioController::class, 'edit'])
        ->middleware('permission:edit-portifolio')
        ->name('admin.portifolio.edit');
    Route::put('/admin/update-portifolio/{portifolio}', [PortifolioController::class, 'update'])
        ->name('admin.portifolio.update');
    Route::delete('/admindelete-portifolio/{portifolio}', [PortifolioController::class, 'destroy'])
        ->middleware('permission:destroy-portifolio')
        ->name('admin.portifolio.delete');


    //AREA SOBRE NÓS
    Route::get('/admin/sobre', [SobreController::class, 'index'])
        ->middleware('permission:index-sobre')
        ->name('admin.sobre.index');
    Route::get('/admin/show-sobre/{sobre}', [SobreController::class, 'show'])
        ->middleware('permission:show-sobre')
        ->name('admin.sobre.show');
    Route::get('/admin/create-sobre', [SobreController::class, 'create'])
        ->middleware('permission:create-sobre')
        ->name('admin.sobre.create');
    Route::post('/admin/store-sobre', [SobreController::class, 'store'])
        ->name('admin.sobre.store');
    Route::get('/admin/edit-sobre/{sobre}', [SobreController::class, 'edit'])
        ->middleware('permission:edit-sobre')
        ->name('admin.sobre.edit');
    Route::put('/admin/update-sobre/{sobre}', [SobreController::class, 'update'])
        ->name('admin.sobre.update');
    Route::delete('/admindelete-sobre/{sobre}', [SobreController::class, 'destroy'])
        ->middleware('permission:destroy-sobre')
        ->name('admin.sobre.delete');


    //AREA EQUIPE
    Route::get('/admin/equipe', [EquipeController::class, 'index'])
        ->middleware('permission:index-equipe')
        ->name('admin.equipe.index');
    Route::get('/admin/show-equipe/{equipe}', [EquipeController::class, 'show'])
        ->middleware('permission:show-equipe')
        ->name('admin.equipe.show');
    Route::get('/admin/create-equipe', [EquipeController::class, 'create'])
        ->middleware('permission:create-equipe')
        ->name('admin.equipe.create');
    Route::post('/admin/store-equipe', [EquipeController::class, 'store'])
        ->name('admin.equipe.store');
    Route::get('/admin/edit-equipe/{equipe}', [EquipeController::class, 'edit'])
        ->middleware('permission:edit-equipe')
        ->name('admin.equipe.edit');
    Route::put('/admin/update-equipe/{equipe}', [EquipeController::class, 'update'])
        ->name('admin.equipe.update');
    Route::delete('/admindelete-equipe/{equipe}', [EquipeController::class, 'destroy'])
        ->middleware('permission:destroy-equipe')
        ->name('admin.equipe.delete');


    //AREA CONTATO
    Route::get('/admin/contato', [ContatoController::class, 'index'])
        ->middleware('permission:index-contato')
        ->name('admin.contato.index');
    Route::get('/admin/show-contato/{contato}', [ContatoController::class, 'show'])
        ->middleware('permission:show-contato')
        ->name('admin.contato.show');


    //AREA BLOG
    Route::get('/admin/blog', [BlogController::class, 'index'])
        ->middleware('permission:index-blog')
        ->name('admin.blog.index');
    Route::get('/admin/show-blog/{blog}', [BlogController::class, 'show'])
        ->middleware('permission:show-blog')
        ->name('admin.blog.show');
    Route::get('/admin/create-blog', [BlogController::class, 'create'])
        ->middleware('permission:create-blog')
        ->name('admin.blog.create');
    Route::post('/admin/store-blog', [BlogController::class, 'store'])
        ->name('admin.blog.store');
    Route::get('/admin/edit-blog/{blog}', [BlogController::class, 'edit'])
        ->middleware('permission:edit-blog')
        ->name('admin.blog.edit');
    Route::put('/admin/update-blog/{blog}', [BlogController::class, 'update'])
        ->name('admin.blog.update');
    Route::delete('/admindelete-blog/{blog}', [BlogController::class, 'destroy'])
        ->middleware('permission:destroy-blog')
        ->name('admin.blog.delete');



    //GRUPOS DE USUÁRIOS
    Route::get('/admin/role', [RoleController::class, 'index'])
        ->middleware('permission:index-role')
        ->name('admin.role.index');
    Route::get('/admin/show-role', [RoleController::class, 'show'])
        ->middleware('permission:show-role')
        ->name('admin.role.show');
    Route::get('/admin/create-role', [RoleController::class, 'create'])
        ->middleware('permission:create-role')
        ->name('admin.role.create');
    Route::post('/admin/store-role', [RoleController::class, 'store'])
        ->name('admin.role.store');
    Route::get('/admin/edit-role/{role}', [RoleController::class, 'edit'])
        ->middleware('permission:edit-role')
        ->name('admin.role.edit');
    Route::put('/admin/update-role/{role}', [RoleController::class, 'update'])
        ->name('admin.role.update');
    Route::delete('/admindelete-role/{role}', [RoleController::class, 'destroy'])
        ->middleware('permission:destroy-role')
        ->name('admin.role.delete');


    //PERMISSÕES DOS GRUPOS DE USUÁRIOS
    Route::get('/admin/role-permission/{role}', [RolePermissionController::class, 'index'])
        ->middleware('permission:index-role-permission')
        ->name('admin.role-permission.index');
    Route::get('/admin/update-role-permission/{role}/{permission}', [RolePermissionController::class, 'update'])
        ->middleware('permission:index-role-permission')
        ->name('admin.role-permission.update');
});


Route::get('/{slug}', [HomeController::class, 'blogshow'])->name('blogshow');
