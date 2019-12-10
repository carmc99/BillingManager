<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosFacturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados_factura')->insert([
           'codigo' => 1,
           'nombre' => 'pago'
        ]);

        DB::table('estados_factura')->insert([
            'codigo' => 2,
            'nombre' => 'afavor'
        ]);

        DB::table('estados_factura')->insert([
            'codigo' => 3,
            'nombre' => 'pendiente'
        ]);
    }
}
