<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller {

    public function Upload(){
        return view("admin.producto.upload");
    }

    public function UploadFile(Request $request){
        $file = $request->file('logo');
        $reader = Reader::createFromFileObject($file->openFile());
        // Create a customer from each row in the CSV file
        foreach ($reader as $index => $row) {
            $producto = new Producto();
            $producto->nombre = $row[0];
            $producto->imagen = $row[1];
            $producto->nombreLink = $row[2];
            $producto->hotLink = $row[3];
            $producto->publication_date = $row[4];
            $producto->categorias_id = 1;
            $producto->isVideo = $row[5];
            $producto->url_video = $row[6];
            $producto->tags = $row[7];
            $producto->save();
        }
        return redirect('admin/producto');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index() {
        //
        $products = Producto::orderBy('publication_date', 'desc')->get();
        foreach ($products as $prod){
            $prod->Visitas();
            $prod->LogVisitas();
        }
        $datos = array(
            "productos" => $products
        );
        return view("admin.producto.dashboard", $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create() {
        //mostramos el formulario para crear el producto
        $datos = array(
            "categorias" => Categoria::all()
        );
        return view("admin.producto.create", $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        //creamos el producto
        //recivimos el archivo
        try {

            $producto = new Producto();
            $producto->nombre = $request->nombre;
            $producto->imagen = $request->url;
            $producto->categorias_id = $request->categoria_id;
            $producto->nombreLink = $request->nombreLink;
            $producto->hotLink = $request->hotLink;
            $producto->publication_date = $request->publication_date;
            $producto->isVideo = $request->isVideo;
            $producto->url_video = $request->url_video;
            $producto->tags = $request->tags;

            if ($producto->save()) {
                return redirect("admin/producto?1");
            } else {
                return redirect("admin/producto?2");
            }
        } catch (Exception $ex) {
            return redirect("admin/producto?3");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show($id) {
        //mostrasmo el producto en especifico
        $datos = array("producto" => Producto::find($id));
        return view("admin.producto.view", $datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id) {
        //
        $producto = Producto::find($id);
        $producto->checkedSi = $producto->isVideo == "1"? "checked" : "";
        $producto->checkedNo = $producto->isVideo == "0"? "checked" : "";
        $datos = array(
            "producto" => $producto,
            "categorias" => Categoria::all()
        );
        return view("admin.producto.edit", $datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id) {
        //actualizamos el articulo
        //buscamos el producto
        try {
            $producto = Producto::find($id);
            $producto->nombre = $request->nombre;
            $producto->imagen = $request->imagen;
            $producto->categorias_id = $request->categoria_id;
            $producto->nombreLink = $request->nombreLink;
            $producto->hotLink = $request->hotLink;
            $producto->publication_date = $request->publication_date;
            $producto->isVideo = $request->isVideo;
            $producto->url_video = $request->url_video;
            $producto->tags = $request->tags;

            if ($producto->save()) {
                return redirect("admin/producto?mensaje=Se modifico el producto con exito&tipo=success");
            } else {
                return redirect("admin/producto?mensaje=No se modifico el producto con exito&tipo=warning");
            }
        } catch (Exception $ex) {
            return redirect("admin/producto?mensaje=Error&tipo=error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        //eliminamos el producto y los mandamos a la verga! :v
        try {
            $producto = Producto::find($id);
            Storage::delete([public_path().$producto->imagen]);
            if ($producto->delete()) {
                //eliminamos el archivo
                return redirect("admin/producto?mensaje=Se guardo el producto&tipo=success");
            } else {
                return redirect("admin/producto?mensaje=No se guardo el producto&tipo=warining");
            }
        } catch (Exception $ex) {
            return redirect("admin/producto?mensaje=Error&tipo=error");
        }
    }

}
