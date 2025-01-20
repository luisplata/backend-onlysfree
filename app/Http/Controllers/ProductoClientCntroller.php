<?php

namespace App\Http\Controllers;

use App\Models\LogVisit;
use App\Models\Producto;
use App\Models\Stream;
use App\Models\VisitPost;
use Exception;

class ProductoClientCntroller extends Controller
{
    private function GetTags()
    {
        $post = Producto::all();
        $streams = Stream::all();

        $result = [];
        foreach ($post as $p) {
            $tags = explode("-", $p->tags);
            foreach ($tags as $tag) {
                $result[] = $tag;
            }
        }
        foreach ($streams as $p) {
            $tags = explode("-", $p->tags);
            foreach ($tags as $tag) {
                $result[] = $tag;
            }
        }
        return array_unique($result);
    }

    public function show($id)
    {
        //desconvertir
        $id = str_replace("-", " ", $id);
        $product = Producto::where("nombre", $id)->first();
        try {
            $visita = $product->Visitas;
            if ($visita == null) {
                $visita = new VisitPost();
                $visita->producto_id = $product->id;
                $visita->save();
            }
        } catch (Exception $e) {
            $visita = new VisitPost();
            $visita->producto_id = $product->id;
            $visita->save();
        }
        $visita->AddVisita();

        $log = new LogVisit();
        $log->producto_id = $product->id;
        $log->save();

        return view('client.client', [
            "banners" => Producto::PostOfBanner(),
            "hot" => Producto::PostOfHot(),
            "popular" => Producto::PostOfPopular(),
            "packs" => Producto::PostOfPacks(),
            "post" => $product,
            "tags" => explode("-", $product->tags),
            "other" => $this->GetTags()
        ]);
    }

    public function Redirect($url)
    {
        $producto = Producto::where("id", $url)->first();
        try {
            $visita = $producto->Visitas;
            if ($visita == null) {
                $visita = new VisitPost();
                $visita->producto_id = $producto->id;
                $visita->save();
            }
        } catch (Exception $e) {
            $visita = new VisitPost();
            $visita->producto_id = $producto->id;
            $visita->save();
        }
        $visita->AddHotLink();
        return redirect($producto->hotLink);
    }

    public function RedirectName($name)
    {
        $producto = Producto::where("nombre", $name)->first();
        try {
            $visita = $producto->Visitas;
            if ($visita == null) {
                $visita = new VisitPost();
                $visita->producto_id = $producto->id;
                $visita->save();
            }
        } catch (\Exception $e) {
            $visita = new VisitPost();
            $visita->producto_id = $producto->id;
            $visita->save();
        }
        $visita->AddHotLink();
        return redirect($producto->hotLink);
    }
}
