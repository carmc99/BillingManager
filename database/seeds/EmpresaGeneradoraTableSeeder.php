<?php

use Illuminate\Database\Seeder;
use App\Models\EmpresaGeneradora;

class EmpresaGeneradoraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresaGen = new EmpresaGeneradora();
        $empresaGen->nit = '1234567';
        $empresaGen->nombre = 'Solutech System';
        $empresaGen->save();

        $empresaGen = new EmpresaGeneradora();
        $empresaGen->nit = '98765432';
        $empresaGen->nombre = 'QuinComputo';
        $empresaGen->save();

    }
}
