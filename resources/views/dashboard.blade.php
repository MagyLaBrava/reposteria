@extends('layouts.app')

@section('titulo')
    Perfil: {{$user->username}}
@endsection

@section('asideTitulo')
    Amistad Dulce
@endsection

@section('aside')
    <a href="{{route('post.index', auth()->user()->username)}}" class="flex items-center mb-4 sm:mb-0">
        <img src="{{asset('img/usuario.svg')}}" class="h-8 mr-3" alt="Imagen Usuario" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white text-white">{{$user->username}}</span>
    </a>
@endsection

@section('asideLinks')
    <a 
        href="{{route('register')}}" 
        class="px-3 py-1 text-white hover:bg-violet-200 mt-2 hover:text-rose-400 bg-violet-300 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
          </svg>
          
        Nuevo Empleado
    </a>

    <a  
        href="#" 
        class="px-3 py-1 text-white hover:bg-violet-300 hover:text-rose-400 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
          </svg>
          
        Lista de Empleados
    </a>

    <a  
        href="#" 
        class="px-3 py-1 text-white hover:bg-violet-300 hover:text-rose-400 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
          </svg>
          
        Ventas
    </a>

    <a  
        href="#" 
        class="px-3 py-1 text-white hover:bg-violet-300 hover:text-rose-400 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
          </svg>
          
        Reportes
    </a>
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{$user->imagen ? asset('perfiles').'/'.$user->imagen : asset('img/usuario.svg')}}" alt="imagen usuario">
            </div>

            @auth
                    <div class="flex gap-2">
                        <p class="text-gray-700 text-2xl">{{$user->username}}</p>
                        @if ($user->id === auth()->user()->id)
                            <a href="{{route( 'perfil.index')}}" class="text-gray-500 hover:text-gray-800 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                  </svg>
                            </a>
                        @endif
                    </div>
                @endauth
        </div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach($post as $key => $posts) 
            <div class="grid gap-4">
                <div class="h-auto max-w-full rounded-lg">
                    <img src="{{asset('uploads'.'/'.$post[$key]->imagen)}}" alt="imagenes del usuario">
                </div>    
            </div>
        @endforeach
    </div>

@endsection