<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\GraficaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PPV;
use App\Http\Controllers\ProductoClientCntroller;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\StreamController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class,"index"]);

Route::get("content/{id}", [ProductoClientCntroller::class,"show"]);

Route::get("redirect/{url}", [ProductoClientCntroller::class,"Redirect"]);
Route::get("redirection/{url}", [ProductoClientCntroller::class,"RedirectName"]);

Route::get("PPV", [PPV::class,"index"]);

Route::get("PPV/{id}", [PPV::class,"show"]);

Route::get("search/{work}", [PPV::class,"search"]);

Route::get("/login", function () {
    return view("login");
});
Route::get("/logout", function () {
    session()->flush();
    return redirect("/login");
});
Route::post("/login", [LoginController::class,"login"]);

Route::middleware('logeado')->group(function () {
    //para el admin
    Route::prefix('admin')->group(function () {

        Route::get("producto/upload", [ProductoController::class,"Upload"]);
        Route::post("producto/uploadFile", [ProductoController::class,"UploadFile"])->name('admin.producto.uploadFile');
        Route::get("stream/upload", [StreamController::class,"Upload"]);
        Route::post("stream/uploadFile", [StreamController::class,"UploadFile"])->name('admin.stream.uploadFile');
        Route::resource("categoria", CategoriaController::class);
        Route::resource("producto", ProductoController::class);
        Route::resource("stream", StreamController::class);
        Route::resource("graficas", GraficaController::class);
    });
    Route::resource("admin", "AdminController");
});

require __DIR__.'/auth.php';
