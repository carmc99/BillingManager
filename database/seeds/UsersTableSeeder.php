<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = \Illuminate\Support\Facades\Hash::make('secret123');
        $user->direccion = 'Calle 69';
        $user->identificacion = '1007235644';
        $user->telefono_fijo = '3010324556';
        $user->telefono_movil = '304725354';
        $user->save();
    }
}
