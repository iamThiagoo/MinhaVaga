<nav>
    {{-- Tablet and Desktop Screen --}}
    <div class="container justify-between flex-1 hidden pt-1 mx-auto md:flex">
        <x-logo />
    
        <div class="flex -mt-1">
            <ul class="flex items-center flex-1 gap-12">
                <li>
                    <a href="{{ route('home') }}" name="home" class="text-lg font-black text-gray-900 transition duration-200 ease-in md:text-base lg:text-lg hover:opacity-90 hover:border-b-4 hover:border-sky-700 hover:pb-1">Início</a>
                </li>
                <li>
                    <a href="#" name="vagas" class="text-lg font-black text-gray-900 transition duration-200 ease-in md:text-base lg:text-lg hover:opacity-90 hover:border-b-4 hover:border-sky-700 hover:pb-1">Vagas</a>
                </li>
                <li>
                    <a href="#" name="anunciar" class="text-lg font-black text-gray-900 transition duration-200 ease-in md:text-base hover:opacity-90 hover:border-b-4 hover:border-sky-700 hover:pb-1">Anunciar</a>
                </li>

                @auth
                    <li>
                        <a href="{{ route('feed') }}" name="feed" class="text-lg font-black text-gray-900 transition duration-200 ease-in md:text-base hover:opacity-90 hover:border-b-4 hover:border-sky-700 hover:pb-1">Meu Feed</a>
                    </li>
                @endauth
            </ul>
        </div>
    
        <div class="flex -mt-1">
            <ul class="flex items-center flex-1 gap-7">

                @guest
                    <li>
                        <a href="{{ route('login') }}" class="text-lg font-black text-gray-900 transition duration-200 ease-in md:text-base lg:text-lg hover:opacity-90 hover:border-b-4 hover:border-sky-700 hover:pb-1">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="px-4 py-2 text-lg font-bold text-white transition duration-200 ease-in bg-gray-900 rounded-md md:text-base lg:text-lg hover:opacity-90 hover:bg-sky-700">Cadastre-se</a>
                    </li>
                @endguest

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 text-xl font-black leading-4 text-gray-800 transition duration-150 ease-in-out bg-white border border-transparent rounded-md lg:text-base hover:text-gray-700 focus:outline-none">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">

                            {{-- Profile --}}
                            <x-dropdown-link href="#" class="flex items-center justify-between my-1">
                                <div class="flex items-center gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Perfil
                                </div>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>                                
                            </x-dropdown-link>

                            {{-- Applications  --}}
                            <x-dropdown-link href="#" class="flex items-center justify-between my-1">
                                <div class="flex items-center gap-1.5">  
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                    </svg>                                                                                              
                                    Candidaturas
                                </div>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </x-dropdown-link>

                            {{-- Notifications --}}
                            <x-dropdown-link href="#" class="flex items-center justify-between my-1">
                                <div class="flex items-center gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                                    </svg>                                      
                                    Notificações
                                </div>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>                                  
                            </x-dropdown-link>

                            {{-- Logout --}}
                            <x-dropdown-link href="#" class="my-1 text-red-400"> 
                                <form method="POST" action="" class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                    </svg>                                      
                                    
                                    Sair
                                </form>
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </ul>
        </div>
    </div>
</nav>

{{-- Mobile screen --}}
<div class="flex items-center justify-between flex-1 p-2 md:hidden">
    <x-logo />

    <div>
        <button class="relative -mt-2 text-sky-900 right-5" id="menuButton">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="h-9 w-9">
                <path strokeLinecap="round" strokeLinejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
            </svg>              
        </button>
    </div>

    <nav class="fixed top-0 right-0 z-20 hidden w-4/5 h-screen bg-white border border-white" id="menuMobile">

        @guest
            <div class="flex flex-col flex-1 gap-4 py-5 bg-cyan-700">
                <a href="{{ route('register') }}" class="text-white bg-cyan-900 mx-auto border border-white py-2.5 w-11/12 rounded-sm text-center hover:opacity-95"> Cadastre-se gratuitamente </a>
                <a href="{{ route('login') }}" class="text-white mx-auto border border-white py-2.5 w-11/12 rounded-sm text-center hover:opacity-95"> Entrar </a>
            </div>
        @endguest
        
        <div class="p-5">
            <div>
                @guest
                    <p class="text-lg font-black">MinhaVaga.com</p>
                @endguest

                @auth
                    <div class="flex items-center gap-3 pt-3 mb-4">
                        <img src="{{ Auth::user()->photo ? asset('images/user_photos/' . Auth::user()->photo) : asset('images/user.png') }}" width="50px" height="50px" />
                        <div class="flex flex-col">
                            <p class="text-lg font-black"> <span class="text-sky-700"> {{ Auth::user()->name }} </span></p>
                            <a href="#"> <span class="text-sm text-gray-500"> Ver meu perfil </span></a>
                        </div>
                    </div>
                @endauth
            </div>
            <ul class="flex flex-col">

                @guest
                    <li class="py-1 my-3 border-b border-black">
                        <a href="#" class="text-base text-sky-700"> Início </a>
                    </li>
                    <li class="py-1 my-3 border-b border-black">
                        <a href="#" class="text-base text-sky-700"> Vagas </a>
                    </li>
                    <li class="py-1 my-3 border-b border-black">
                        <a href="#" class="text-base text-sky-700"> Anunciar </a>
                    </li>
                @endguest

                @auth

                    {{-- Profile - Mobile --}}
                    <li class="py-2 my-1 border-b border-black ">
                        <a href="#" class="flex items-center justify-between text-base text-sky-700"> 
                            <div class="flex items-center gap-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Perfil
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    </li>

                    {{-- Jobs/Opportunities - Mobile --}}
                    <li class="py-2 my-1 border-b border-black">
                        <a href="#" class="flex items-center justify-between text-base text-sky-700">
                            
                            <div class="flex items-center gap-1.5">  
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                </svg>                                                                                              
                                Vagas
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    </li>

                    {{-- Applications - Mobile --}}
                    <li class="py-2 my-1 border-b border-black">
                        <a href="#" class="flex items-center justify-between text-base text-sky-700">
                            <div class="flex items-center gap-1.5">  
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                </svg>                                                                                              
                                Candidaturas
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    </li>

                    {{-- Announce - Mobile --}}
                    <li class="py-2 my-1 border-b border-black">
                        <a href="#" class="flex items-center justify-between text-base text-sky-700">
                            <div class="flex items-center gap-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                </svg>                                
                                Anunciar
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    </li>

                    {{-- Notifications - Mobile --}}
                    <li class="py-2 my-1 border-b border-black">
                        <a href="#" class="flex items-center justify-between text-base text-sky-700">
                            <div class="flex items-center gap-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                                </svg>                                                                
                                Notificações
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    </li>

                    {{-- Logout - Mobile --}}
                    <li class="py-1 my-5">
                        <form method="POST" action="" class="flex items-center justify-end gap-1 pr-3 text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>                                      
                            
                            Sair
                        </form>
                    </li>
                    
                @endauth
            </ul>
        </div>
    </nav>

    <div class="fixed top-0 left-0 z-10 hidden w-full h-screen bg-gray-900 opacity-95 overlay"></div>
</div>

<script type="module">
    $("#menuButton").on('click', function(e) {
        $('#menuMobile').removeClass('hidden');
        $('.overlay').removeClass('hidden');
    });

    $(".overlay").on('click', function(e) {
        if($('#menuMobile').hasClass('hidden') == false){
            $('#menuMobile').addClass('hidden');
            $('.overlay').addClass('hidden');
        }
    });
</script>
