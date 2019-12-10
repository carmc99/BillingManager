<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EstadosFacturaTableSeeder::class);
        $this->call(EmpresaTableSeeder::class);
        $this->call(EmpresaGeneradoraTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call( FacturaTableSeeder::class);
    }
}
