<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Stream;

class IndexController extends Controller
{
    private function GetTags(){
        $post = Producto::all();
        $streams = Stream::all();

        $result = [];
        foreach ($post as $p){
            $tags = explode("-", $p->tags);
            foreach ($tags as $tag){
                $result[] = $tag;
            }
        }
        foreach ($streams as $p){
            $tags = explode("-", $p->tags);
            foreach ($tags as $tag){
                $result[] = $tag;
            }
        }
        return array_unique($result);
    }
    public function index()
    {
        //necesitamos listar:
        /*
        banner de 6 packs
        hot de 3 packs
        popular de 3 packs
        packs de 9 _listado_
        */
        return view('welcome',[
            "banners"=>Producto::PostOfBanner(),
            "hot"=>Producto::PostOfHot(),
            "popular"=>Producto::PostOfPopular(),
            "packs"=>Producto::PostOfPacks(),
            "other"=>$this->GetTags()
        ]);
    }
}
