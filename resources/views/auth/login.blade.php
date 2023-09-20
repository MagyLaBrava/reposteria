@extends('layouts.app')

@section('titulo')
    Inicia Sesión en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/pp-1.png')}}" alt="imagen iniciar usuarios">
        </div>

        <div class="md:w-6/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{route('login')}}" novalidate>
                @csrf
                
                @if(session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{session('mensaje')}}
                    </p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Tu Email"
                        class="border p-3 w-full rounded-lg @error('name')border-red-500 @enderror"
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
                        class="border p-3 w-full rounded-lg @error('name')border-red-500 @enderror"
                    />
                    @error('password')
                        <p class="bg-gradient-to-r from-purple-500 to-pink-500  text-white my-2 rounded-lg text-sm
                        p-2 text-center">{{str_replace('password', 'contraseña', $message)}}</p>
                    @enderror
                </div>

                <input
                    type="submit"
                    value="Iniciar Sesión"
                    class="bg-violet-600 hover:bg-violet-700 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection