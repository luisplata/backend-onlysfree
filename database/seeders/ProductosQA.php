<?php
namespace Database\Seeders;

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
            $producto->nombre = "Producto_" . $i;
            $producto->imagen = "https://peryloth.com/profile.png";
            $producto->categorias_id = 1;
            $producto->estado = 1;
            $producto->NombreLink = "link";
            $producto->hotLink = "https://peryloth.com";
            $producto->publication_date = "2022-01-04 00:32:07";
            $producto->isVideo = 0;
            $producto->save();
        }
    }
}
