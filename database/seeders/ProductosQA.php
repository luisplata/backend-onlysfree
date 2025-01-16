<?php

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductosQA extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 100; $i++) {
            $producto = new Producto();
            $producto->nombre = "Producto #" . $i;
            $producto->imagen = "/images/productos/1611518819.png";
            $producto->categoria = 1;
            $producto->estado = 1;
            $producto->NombreLink = "link";
            $producto->hotLink = "hotlink";
            $producto->publication_date = "2022-01-04 00:32:07";
            $producto->isVideo = 0;
            $producto->save();
        }
    }
}
