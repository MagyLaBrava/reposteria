@extends('layouts.app')

@section('titulo')
    Regístro de Empleados
@endsection

@section('asideTitulo')
    Administra tus Datos
@endsection

@section('aside')
    <a 
        href="#" 
        class="px-3 py-1 text-white block hover:bg-violet-200 mt-2 hover:text-rose-400 bg-violet-300">
        Nuevo Empleado
    </a>

    <a  
        href="#" 
        class="px-3 py-1 text-white block hover:bg-violet-300 hover:text-rose-400 ">
        Empleados
    </a>
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/pd-6.jpg')}}" alt="imagen registrar usuarios">
        </div>

        <div class="md:w-6/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('register')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Tu Nombre"
                        class="border p-3 w-full rounded-lg @error('name')border-pink-500 @enderror"
                        value="{{old('name')}}"
                    />
                    @error('name')
                        <p class="bg-gradient-to-r from-purple-500 to-pink-500  text-white my-2 rounded-lg text-sm
                        p-2 text-center">{{str_replace('name', 'nombre', $message)}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Nombre de tu Usuario"
                        class="border p-3 w-full rounded-lg @error('name')border-pink-500 @enderror"
                        value="{{old('username')}}"
                    />
                    @error('username')
                        <p class="bg-gradient-to-r from-purple-500 to-pink-500  text-white my-2 rounded-lg text-sm
                        p-2 text-center">{{str_replace('username', 'nombre de usuario', $message)}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Tu Email"
                        class="border p-3 w-full rounded-lg @error('name')border-pink-500 @enderror"
                        value="{{old('email')}}"
                    />
                    @error('email')
                        <p class="bg-gradient-to-r from-purple-500 to-pink-500  text-white my-2 rounded-lg text-sm
                        p-2 text-center">{{str_replace('email', 'email', $message)}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Escribe tu Password"
                        class="border p-3 w-full rounded-lg @error('name') border-pink-500 @enderror"
                    />
                    @error('password')
                        <p class="bg-gradient-to-r from-purple-500 to-pink-500  text-white my-2 rounded-lg text-sm
                        p-2 text-center">{{str_replace('password', 'contraseña', $message)}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Confirme su Password
                    </label>
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Repite tu Password"
                        class="border p-3 w-full rounded-lg @error('name') border-pink-500 @enderror"
                    />
                </div>

                <input
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-violet-600 hover:bg-violet-700 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection