<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //dd('hola desde editar Perfil');
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil']
        ]);

        if($request->imagen)
        {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            $imagenServidor = Image::make($imagen); // Facades
            $imagenServidor->fit(1000, 1000);

            $imagenPath = public_path('perfiles'). "/" . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        // Guardar Cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();
        
        //Redireccionar
        return redirect()->route('post.index', $usuario->username);
    }

    // EDITAR CORREO Y PASSWORD
    public function passwordUpdate(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|unique:users|email|max:20',
            'password' => 'required|confirmed|min:6',
        ]);

        $usuario = User::find(auth()->user()->id);
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        //*$usuario->password = Hash::make($request->input('password'));
        $usuario->save();

        //Redireccionar
        return redirect()->route('post.index', $usuario->username);
    }
}
