<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('style')
        <title>Repostería - @yield('titulo')</title>
        @vite('resources/css/app.css')
        {{-- @vite('resources/js/app.js') --}}

    </head>
    <body class="bg-gradient-to-r from-violet-400 to-pink-200">
        <header class="p-5 border-b bg-zinc-950 shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class=" text-3xl font-black text-white">
                Repostería
                </h1>

                @auth
                    <nav class="flex gap-2 items-center">
                        <a href="{{route('post.create')}}" class="flex items-center gap-2 bg-white border p-2 text-gray-600 
                                    rounded text-sm uppercase font-bold cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                            </svg>          
                            Ingresar Imagenes
                        </a>
                        <a class="font-bold uppercase text-white text-sm" href="{{route('post.index', auth()->user()->username)}}">
                            Bienvenido: <span>{{auth()->user()->username}}</span>
                        </a>

                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="font-bold uppercase text-white text-sm" href="{{route('logout')}}">
                                Cerrar Sesión
                            </button>
                        </form>
                       
                    </nav>
                @endauth
    
                @guest
                    <nav class="flex gap-2 items-center">
                        <a class="font-bold uppercase text-white text-sm" href="{{route('login')}}">
                            Login
                        </a>
                        <a class="font-bold uppercase text-white text-sm" href="{{route('register')}}">
                            Crear Cuenta
                        </a>
                    </nav>
                @endguest
            </div>
        </header>

        <div class="md:flex min-h-screen md:align-top">

            <aside class="md:w-2/5 lg:w-2/5 xl:w-1/5 bg-zinc-950 px-5 py-10 border-b">
                <h2 class="uppercase text-white tracking-wide text-2xl  font-bold mt-2">
                    @yield('asideTitulo')
                </h2>
                <div class="mt-8">
                    @yield('aside')
                </div>
                <div class="mt-8">
                    @yield('asideLinks')
                </div>
                <p class="uppercase text-white tracking-wide text-2xl  font-bold mt-2">
                    @yield('asideTexto')
                </p>
            </aside> <!--sidebar-->

            <main class="container mx-auto mt-10">
                <h2 class="font-black text-center text-3xl mb-10">
                    @yield('titulo')
                </h2>
                @yield('contenido')
    
                <!--<div class="h-14 bg-gradient-to-r from-violet-500 to-fuchsia-500"></div>-->
    
                <!--<div class="h-14 bg-gradient-to-r from-orange-400 to-amber-200"></div>-->
    
                <!-- <div class="bg-[url('/img/hero-pattern.svg')]">
                   imagen
                </div>-->
    
            </main>

        </div>

        <footer class="text-center p-5 text-gray-500 font-bold uppercase bg-zinc-950">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <a href="#" class="flex items-center mb-4 sm:mb-0">
                        <img src="{{asset('img/h-1.jpg')}}" class="h-8 mr-3" alt="Flowbite Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Amistad Dulce</span>
                    </a>
                    <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6 ">Instagram</a>
                        </li>
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6">WhatsApp</a>
                        </li>
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6 ">Facebook</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                  </svg>
                                  
                                Telefono
                            </a>
                        </li>
                    </ul>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{now()->year}} <a href="#" class="hover:underline">Amistad Dulce</a>. Todos los derechos reservados.</span>
            </div>
        </footer>
    </body>
</html>