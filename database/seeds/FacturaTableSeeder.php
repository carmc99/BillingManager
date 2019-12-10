<?php

use Illuminate\Database\Seeder;
use App\Models\Factura;
use Faker\Provider\Text;
use Carbon\Carbon;

class FacturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factura = new Factura();
        #$factura->user_id = 1;
        $factura->empresa_nit = '123456';
        $factura->num_factura = '2342523';
        $factura->ruta_factura = 'test';
        $factura->empresa_generadora_nit = '1234567';
        $factura->descripcion = "Lorem";
        $factura->valor_total = 3486435;
        $factura->valor_adeudado = 1234;
        $factura->estado_id = 1;
        $factura->fecha_facturacion = Carbon::now();
        $factura->created_at = Carbon::now();
        $factura->updated_at = Carbon::now();
        $factura->save();

    }
}
