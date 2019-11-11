<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'ver_facturas']);
        Permission::create(['name' => 'crear_facturas']);
        Permission::create(['name' => 'editar_facturas']);
        Permission::create(['name' => 'eliminar_facturas']);
        Permission::create(['name' => 'ver_usuarios']);
        Permission::create(['name' => 'crear_usuarios']);
        Permission::create(['name' => 'editar_usuarios']);
        Permission::create(['name' => 'eliminar_usuarios']);
        Permission::create(['name' => 'ver_recibos']);
        Permission::create(['name' => 'crear_recibos']);
        Permission::create(['name' => 'editar_recibos']);
        Permission::create(['name' => 'eliminar_recibos']);
        Permission::create(['name' => 'ver_empresas']);
        Permission::create(['name' => 'crear_empresas']);
        Permission::create(['name' => 'editar_empresas']);
        Permission::create(['name' => 'eliminar_empresas']);

        $roleAdmin = Role::create(['name' => 'Administrador']);
        $roleAdmin->givePermissionTo('ver_facturas');
        $roleAdmin->givePermissionTo('crear_facturas');
        $roleAdmin->givePermissionTo('editar_facturas');
        $roleAdmin->givePermissionTo('eliminar_facturas');
        $roleAdmin->givePermissionTo('ver_usuarios');
        $roleAdmin->givePermissionTo('crear_usuarios');
        $roleAdmin->givePermissionTo('editar_usuarios');
        $roleAdmin->givePermissionTo('eliminar_usuarios');
        $roleAdmin->givePermissionTo('ver_recibos');
        $roleAdmin->givePermissionTo('crear_recibos');
        $roleAdmin->givePermissionTo('editar_recibos');
        $roleAdmin->givePermissionTo('eliminar_recibos');
        $roleAdmin->givePermissionTo('ver_empresas');
        $roleAdmin->givePermissionTo('crear_empresas');
        $roleAdmin->givePermissionTo('editar_empresas');
        $roleAdmin->givePermissionTo('eliminar_empresas');

        $roleEstandar = Role::create(['name' => 'Estandar']);
        $roleEstandar->givePermissionTo('ver_facturas');
        $roleEstandar->givePermissionTo('ver_recibos');

        $user = User::create([
            'name' => 'admin',
            'identificacion' => '123456',
            'empresa_nit' => '123456',
            'email' => 'admin@sigeef.com',
            'password' => bcrypt('Jaump123*')
        ]);
        $user->assignRole('Administrador');
    }
}
