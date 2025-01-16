<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class GraficaApiController extends Controller
{
    public function index()
    {
        $sql = Producto::GetGrafics();
        $datee = DB::select($sql);
        return response()->json($datee);
    }

    public function TazaDeConvercion(){
        $sql = Producto::TazaDeConvercion();
        $datee = DB::select($sql);
        $consult = [];
        foreach($datee as $row){
            $producto = Producto::find($row->producto_id);
            $producto->visitas = $row->visita;
            $producto->clicks = $row->idoAlPack;
            $producto->porcentaje_efectividad = $row->porcentaje_efectividad;
            array_push($consult, $producto);
        }
        return response()->json($consult);
    }

    public function VisitasVsClicks(){
        $sql = Producto::VisitasPorClicks();
        $datee = DB::select($sql);
        $consult = [];
        foreach($datee as $row){
            $producto = Producto::find($row->producto_id);
            $producto->visitas = $row->visita;
            $producto->clicks = $row->idoAlPack;
            array_push($consult, $producto);
        }
        return response()->json($consult);
    }

}
