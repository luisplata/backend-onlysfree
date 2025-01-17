<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Exception;

class CategoriaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index() {
        //buscamos todos las categorias para listarlas

        $datos = array(
            "categorias" => Categoria::all()
        );
        return view("admin.categoria.dashboard", $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create() {
        //
        $datos = array(
            "categorias" => Categoria::all()
        );
        return view("admin.categoria.create", $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        //creamos la categoria
        try {
            //creamos al administrador
            $categoria = new Categoria();
            $categoria->nombre = $request->nombre;
            $categoria->descripcion = $request->descripcion;
            $categoria->padre = $request->padre;
            if (!$categoria->save()) {
                return redirect("/admin/categoria/create?mensaje=Ocurrio un error al crear la categoria&tipo=error");
            }
            return redirect("/admin/categoria?mensaje=Se creo correctamente la categoria&tipo=seccess");
        } catch (Exception $ex) {
            return redirect("/admin/categoria?mensaje=Ocurrio un error al crear la categoria&tipo=error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show($id) {
        //mostramos la categoria en especifico
        $datos = array(
            "categoria" => Categoria::find($id)
        );
        return view("admin.categoria.view", $datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id) {
        //mostramos el formulario apra actualizar
        $datos = array(
            "categoria" => Categoria::find($id),
            "categorias" => Categoria::all()
        );
        return view("admin.categoria.edit", $datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id) {
        try {
            //actualizamos la categotia
            //buscamos la categoria
            $categoria = Categoria::find($id);
            $categoria->nombre = $request->nombre;
            $categoria->descripcion = $request->descripcion;
            $categoria->padre = $request->padre;
            if ($categoria->save()) {
                return redirect("/admin/categoria?mensaje=Se actualizo la categoria&tipo=success");
            } else {
                return redirect("/admincategoria?mensaje=No se actualizo la categoria&tipo=warining");
            }
        } catch (Exception $ex) {
            return redirect("/admincategoria?mensaje=No se actualizo la categoria&tipo=error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        //se elimina la categoria
        //buscamos la categoria
        try {
            $categoria = Categoria::find($id);
            if ($categoria->delete()) {
                return redirect("/admin/categoria?mensaje=Se elimino con exito&tipo=success");
            } else {
                return redirect("/admin/categoria?mensaje=No se elimino con exito&tipo=warining");
            }
        } catch (Exception $ex) {
            return redirect("/admin/categoria?mensaje=Ocurrio un error&tipo=error");
        }
    }

}
