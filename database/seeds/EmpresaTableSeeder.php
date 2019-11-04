<?php

use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresa = new Empresa();
        $empresa->nombre = 'Test';
        $empresa->nit = '123456';
        $empresa->save();
    }
}
