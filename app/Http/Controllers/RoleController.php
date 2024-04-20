<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // Listar os Grupos de Usuários
    public function index()
    {
        //recuperar registros do banco de dados
        $roles = Role::orderBy('name')->paginate(40);

        //carregar a VIEW
        return view('admin.role.index', [
            'menu' => 'role', 
            'roles' => $roles,
        ]);
    }

    public function show()
    {
        return view('admin.role.show');
    }

    public function create()
    {
        return view('admin.role.create', ['menu' => 'role']);
    }

    public function store()
    {

    }

    public function edit()
    {
        return view('admin.role.edit', ['menu' => 'role']);
    }

    public function update()
    {

    }

    public function destroy()
    {
        
    }
}
