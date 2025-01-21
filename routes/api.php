<?php

use App\Http\Controllers\GraficaApiController;
use App\Http\Controllers\PPV;
use App\Models\Producto;
use App\Models\Stream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('grafica', [GraficaApiController::class, 'index']);// TazaDeConvercion
Route::get('TazaDeConvercion', [GraficaApiController::class, 'TazaDeConvercion']);
Route::get('VisitsVsClicks', [GraficaApiController::class, 'VisitasVsClicks']);
Route::get('registrarVisita/{id}', [PPV::class, 'RegisterVisit']);
Route::get("infiniteScroll",function(){
    $paginate = Producto::PostOfPacks();
    return view("ScrollInfinite",["packs"=>$paginate]);
});
Route::get("infiniteScrollStream",function(){
    $paginate = Stream::GetFirstStreams();
    return view("ScrollInfiniteStream",["packs"=>$paginate]);
});

Route::get("search",function(Request $request){
    $search = $request->input("search");
    $paginate = Producto::Search($search);
    return response()->json($paginate);
});
