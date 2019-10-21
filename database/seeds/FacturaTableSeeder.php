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
        $factura->user_id = 1;
        $factura->num_pago = '2342523';
        $factura->ruta_factura = 'test';
        $factura->descripcion = "Lorem";
        $factura->valor_total = '3.435.434';
        $factura->estado = 'Pagado';
        $factura->fecha_facturacion = Carbon::now();
        $factura->created_at = Carbon::now();
        $factura->updated_at = Carbon::now();
        $factura->save();

        $factura = new Factura();
        $factura->user_id = 2;
        $factura->num_pago = '345346';
        $factura->ruta_factura = 'test 2';
        $factura->descripcion = "Lorem";
        $factura->valor_total = '3.435.434';
        $factura->estado = 'Pendiente';
        $factura->fecha_facturacion = Carbon::now();
        $factura->created_at = Carbon::now();
        $factura->updated_at = Carbon::now();
        $factura->save();
    }
}
