<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller {

    //
    public function login(Request $request) {
        /* Pasos de autenticación
         * se busca por el correo el usuario
         * se calcula si la contraseña es igual
         * se le manda al dash board
         */
        Log::info('Acceso a la página principal', ['user_id' => auth()->id()]);
        $user = Usuario::where("email", $request->email)->first();
        //Validamos que encontro algo
        //validamos la contraseña
        if (!is_object($user) || sha1($request->pass) != $user->pass) {
            return redirect("/login?mensaje=Usuario o Contraseña, no validos");
        }
        //metemos datos en la session en este caso le user ID
        Session::put('admin', $user);
        return redirect("/admin?hola=mas");
    }

}
