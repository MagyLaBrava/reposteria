@extends('layouts.app')

@section('titulo')
    Crea una nueva Publicación
@endsection

@push('style')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('asideTitulo')
    Amistad Dulce
@endsection

@section('aside')
    <a href="{{route('post.index', auth()->user()->username)}}" class="flex items-center mb-4 sm:mb-0">
        <img src="{{asset('img/usuario.svg')}}" class="h-8 mr-3" alt="Imagen Usuario" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white text-white">Magy</span>
    </a>
@endsection

@section('asideLinks')
    <a 
        href="#" 
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
    @vite('resources/js/app.js')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{route('photos.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{route('posts.store')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Título
                    </label>
                    <input
                        id="titulo"
                        name="titulo"
                        type="text"
                        placeholder="Título de la Publicación"
                        class="border p-3 w-full rounded-lg @error('titulo') border-pink-500 @enderror"
                        value="{{old('titulo')}}"
                    />
                    @error('titulo')
                        <p class="bg-gradient-to-r from-purple-500 to-pink-500 text-white my-2 rounded-lg text-sm
                        p-2 text-center">{{str_replace('name', 'titulo', $message)}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea
                        id="descripcion"
                        name="descripcion"
                        placeholder="Descripción de la Publicación"
                        class="border p-3 w-full rounded-lg @error('descripcion') border-pink-500 @enderror"
                    >{{old('descripcion')}}</textarea>
                    @error('descripcion')
                        <p class="bg-gradient-to-r from-purple-500 to-pink-500 text-white my-2 rounded-lg text-sm
                        p-2 text-center">{{str_replace('name', 'descripcion', $message)}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input
                        name="imagen"
                        type="hidden"
                        value="{{old('imagen')}}"
                    />
                    @error('imagen')
                        <p class=" bg-gradient-to-r from-purple-500 to-pink-500 text-white my-2 rounded-lg text-sm
                        p-2 text-center">{{str_replace('name', 'imagen', $message)}}</p>
                    @enderror
                </div>

                <input
                    type="submit"
                    value="Publicar"
                    class="bg-violet-600 hover:bg-violet-700 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection