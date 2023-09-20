@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
<div class="flex gap-5 justify-center">
    <div class="ml-10 w-1/3 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-20">
        <form class="mt-10 md:mt-0" action="{{route('perfil.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                    Username
                </label>
                <input
                    id="username"
                    name="username"
                    type="text"
                    placeholder="Tu Nuevo Username"
                    class="border p-3 w-full rounded-lg @error('username')border-red-500 @enderror"
                    value="{{auth()->user()->username}}"
                />
                @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm
                    p-2 text-center">{{str_replace('username', 'USERNAME', $message)}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                    Imagen Perfil
                </label>
                <input
                    id="imagen"
                    name="imagen"
                    type="file"
                    class="border p-3 w-full rounded-lg"
                    value=""
                    accept=".jpg, .jpeg, .png, .gif"
                />
            </div>

            <input
                type="submit"
                value="Guardar Cambios"
                class="bg-purple-600 hover:bg-purple-700 transition-colors cursor-pointer
                uppercase font-bold w-full p-3 text-white rounded-lg"
            />
        </form>
    </div>

    <div class="mr-10 w-1/3 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-2 mt-5">
        <form class="" method="POST" action="{{ route('password.update') }}">
            @csrf

            <div>
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Nuevo correo electrónico</label>
                <input class="border p-3 w-full rounded-lg mb-2" id="email" type="email" name="email" value="{{ Auth::user()->email }}" required>
            </div>
        
            <div>
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Nueva contraseña</label>
                <input class="border p-3 w-full rounded-lg mb-2" id="password" type="password" name="password" required>
            </div>
        
            <div>
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Confirmar contraseña</label>
                <input class="border p-3 w-full rounded-lg mb-2" id="password_confirmation" type="password" name="password_confirmation" required>
            </div>
        
            <button type="submit" value="Guardar Cambios" class=" bg-pink-600 hover:bg-pink-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                Actualizar cambios
            </button>
        </form>
    </div>
</div>
@endsection