<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $role = Role::create(['guard_name' => 'admin', 'name' => 'manager', 'description' => 'Acesso completo ao sistema']);
        $client = Role::create(['guard_name' => 'web', 'name' => 'client', 'description' => 'Acesso a parte do sistema']);

        $permissions = collect([
            ['name' => 'listar posts', 'guard_name' => 'admin', 'description' => 'Permite listar todos os posts'],
            ['name' => 'criar post', 'guard_name' => 'admin', 'description' => 'Permite criar post'],
            ['name' => 'visulizar post', 'guard_name' => 'admin', 'description' => 'Permite visualizar post'],
            ['name' => 'editar post', 'guard_name' => 'admin', 'description' => 'Permite editar posts'],
            ['name' => 'deletar post', 'guard_name' => 'admin', 'description' => 'Permite excluir posts'],

            ['name' => 'publicar post', 'guard_name' => 'admin', 'description' => 'Permite publicar posts'],
            ['name' => 'despublicar post', 'guard_name' => 'admin', 'description' => 'Permite despublicar posts'],

            ['name' => 'listar usuários', 'guard_name' => 'admin', 'description' => 'Permite listar todos os usuários'],
            ['name' => 'visulizar usuário', 'guard_name' => 'admin', 'description' => 'Permite visualizar usuário'],
            ['name' => 'editar usuário', 'guard_name' => 'admin', 'description' => 'Permite editar usuários'],
            ['name' => 'deletar usuário', 'guard_name' => 'admin', 'description' => 'Permite excluir usuários'],

            ['name' => 'listar perfis', 'guard_name' => 'admin', 'description' => 'Permite listar todos os perfis'],
            ['name' => 'visulizar perfil', 'guard_name' => 'admin', 'description' => 'Permite visualizar perfil'],
            ['name' => 'editar perfil', 'guard_name' => 'admin', 'description' => 'Permite editar perfis'],
            ['name' => 'deletar perfil', 'guard_name' => 'admin', 'description' => 'Permite excluir perfis'],

            ['name' => 'listar administradores', 'guard_name' => 'admin', 'description' => 'Permite listar todos os administradores'],
            ['name' => 'visulizar administrador', 'guard_name' => 'admin', 'description' => 'Permite visualizar administrador'],
            ['name' => 'editar administrador', 'guard_name' => 'admin', 'description' => 'Permite editar administradores'],
            ['name' => 'deletar administrador', 'guard_name' => 'admin', 'description' => 'Permite excluir administradores'],
        ]);


        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }

        $role->givePermissionTo(Permission::all());
    }
}
