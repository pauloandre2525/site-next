<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    // Listar Permissões dos Grupos de Usuários
    public function index(Role $role)
    {

        //verificar se o papel é o Super Admin
        if($role->name == 'Super Admin'){

            //Redirecionar o usuário e enviar mensagem de erro
            return redirect()->route('admin.role.index')->with('error', 'Permissão do Super Admin não pode ser acessada!');
        }

        // Recuperar as Permissões do Papel
        $rolePermissions = DB::table('role_has_permissions')->where('role_id', $role->id)
        ->pluck('permission_id')
        ->all();

        //Recuperar permissões
        $permissions = Permission::get();


        // carregar a VIEW
       return view('admin.rolePermission.index', [
            'menu' => 'role',
            'rolePermissions' => $rolePermissions,
            'permissions' => $permissions,
            'role' => $role,
        ]);
    }

    //Editar a permissão de acesso
    public function update(Request $request, Role $role)
    {
        //Obter a permissão específica com base no ID fornecido em $request->permission
        $permission = Permission::find($request->permission);

        //Verificar se a permissão foi encontrda
        if(!$permission){
            return redirect()->route('admin.role-permission.index', ['role' => $role->id])->with('error', 'Permissão não encontrada.');
        }

        //Verificar se a permissão já está associada
        if($role->permissions->contains($permission)){

            //Remover a permissão do papel (bloquear)
            $role->revokePermissionTo($permission);


            //Redirecionar e enviar mensagem de sucesso
            return redirect()->route('admin.role-permission.index', ['role' => $role->id])->with('success', 'Permissão bloqueada com sucesso.');
        } else {

            //Adicionar a permissão do papel (liberar)
            $role->givePermissionTo($permission);

            //Redirecionar e enviar mensagem de sucesso
            return redirect()->route('admin.role-permission.index', ['role' => $role->id])->with('success', 'Permissão liberada com sucesso.');


        }
    }
}
