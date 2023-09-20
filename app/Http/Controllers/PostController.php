<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(User $user)
    {
        // dd($user->username);
        $post = Post::all('imagen');
        return view('dashboard', [
            'user' => $user,
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        // Validación
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->route('principal', auth()->user()->username);
    }
}
