<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index() {
        //listado
        $datos = array(
            "admins" => Usuario::all(),
            "mensajes" => Mensaje::where("leido", 0)->get()
        );
        return view("admin.dashboard", $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create() {
        //
        return view("admin.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        try {
            DB::beginTransaction();
            //creamos al administrador
            $admin = new Usuario();
            $admin->nombre = $request->nombre;
            $admin->email = $request->email;
            $admin->telefono = $request->telefono;
            if ($request->pass1 != $request->pass2) {
                return redirect("admin/create?mensaje=Las contraseñas no coisiden&tipo=warning");
            }
            $admin->pass = sha1($request->pass1);
            if (!$admin->save()) {
                return redirect("admin/create?mensaje=Ocurrio un error al crear el admin&tipo=error");
            }
            DB::commit();
            return redirect("admin?mensaje=Se creo correctamente el administradort&tipo=seccess");
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect("admin?mensaje=Ocurrio un error al crear el admin, puede que el email ya esta registrado&tipo=error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show($id) {
        //buscamos al admin para mostrarlo
         $datos = array(
            "admin"=> Usuario::find($id)
        );
        return view("admin.view",$datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id) {
        //buscamos al admin para cargar sus datos
        $datos = array(
            "admin"=> Usuario::find($id)
        );
        return view("admin.edit",$datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id) {
        try{
            //actualizando el admin con la pass
            //buscamos al admin con la ID
            $admin = Usuario::find($id);
            if(!is_object($admin)){
                return redirect("admin?mensaje=no existe el admin");
            }
            $admin->nombre = $request->nombre;
            $admin->telefono=$request->telefono;
            $admin->email = $request->email;
            //validamos la pass
            if($request->pass1 != $request->pass2){
                return redirect("admin/$admin->id/edit?mensaje=contraseñas no coinsiden");
            }
            $admin->pass = sha1($request->pass2);
            if(!$admin->save()){
                return redirect("admin/$admin->id/edit?mensaje=No se guardo el admin");
            }
            return redirect("admin?mensaje=Se edito el admin&tipo=success");

        }catch(Exception $ex){
            return redirect("admin?mensaje=Ocurrio un error, puede que el email ya este registrado&tipo=error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        //buscamos al admin y lo eliminamos
        try{
            $admin = Usuario::find($id);
            if($admin->delete()){
                return redirect("admin?mensaje=se elimino con exito&tipo=success");
            }else{
                return redirect("admin?mensaje=no se elimino con exito&tipo=warining");
            }
        }catch(\Exception $ex){
            return redirect("admin?mensaje=no se elimino con exito&tipo=error");
        }
    }

}
