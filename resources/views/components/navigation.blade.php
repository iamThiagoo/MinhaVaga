<nav>
    {{-- Tablet and Desktop Screen --}}
    <div class="container justify-between flex-1 hidden pt-1 mx-auto md:flex">
        <x-logo />
    
        <div class="flex -mt-1">
            <ul class="flex items-center flex-1 gap-12">
                <li>
                    <a href="#" class="text-lg font-black text-gray-900 transition duration-200 ease-in md:text-base lg:text-lg hover:opacity-90 hover:border-b-4 hover:border-sky-700 hover:pb-1">Início</a>
                </li>
                <li>
                    <a href="#" class="text-lg font-black text-gray-900 transition duration-200 ease-in md:text-base lg:text-lg hover:opacity-90 hover:border-b-4 hover:border-sky-700 hover:pb-1">Vagas</a>
                </li>
                <li>
                    <a href="#" class="font-black text-gray-900 transition duration-200 ease-in md:text-base lg:text-lg hover:opacity-90 hover:border-b-4 hover:border-sky-700 hover:pb-1">Anunciar</a>
                </li>
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
                @endauth
            </ul>
        </div>
    </div>

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
            <div class="flex flex-col flex-1 gap-4 py-5 bg-cyan-700">
                <a href="{{ route('register') }}" class="text-white bg-cyan-900 mx-auto border border-white py-2.5 w-11/12 rounded-sm text-center hover:opacity-95"> Cadastre-se gratuitamente </a>
                <a href="{{ route('login') }}" class="text-white mx-auto border border-white py-2.5 w-11/12 rounded-sm text-center hover:opacity-95"> Entrar </a>
            </div>
            <div class="p-5">
                <div>
                    <p class="text-lg font-black">MinhaVaga.com</p>
                </div>
                <ul class="flex flex-col">
                    <li class="py-1 my-3 border-b border-black">
                        <a href="#" class="text-base text-sky-700"> Início </a>
                    </li>
                    <li class="py-1 my-3 border-b border-black">
                        <a href="#" class="text-base text-sky-700"> Vagas </a>
                    </li>
                    <li class="py-1 my-3 border-b border-black">
                        <a href="#" class="text-base text-sky-700"> Anunciar </a>
                    </li>
                </ul>
        </nav>

        <div class="fixed top-0 left-0 z-10 hidden w-full h-screen bg-gray-900 opacity-95 overlay"></div>
    </div>
</nav>

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
