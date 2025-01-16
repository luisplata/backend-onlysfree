<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\CategoriaPost;
use Illuminate\Database\Seeder;

class Categorias extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //Creamos la categoria Root
        $categoria = new Categoria();
        $categoria->nombre = "Productos";
        $categoria->descripcion = "Categoria para los productos";
        $categoria->padre = 1;
        $categoria->id = 1;
        $categoria->save();


        $categoria = new CategoriaPost();
        $categoria->nombre = "Post";
        $categoria->descripcion = "categorias para los post";
        $categoria->padre = 1;
        $categoria->id = 1;
        $categoria->save();
    }

}
