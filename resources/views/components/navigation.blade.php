<nav>
    {{-- Tablet and Desktop Screen --}}
    <div class="hidden md:flex flex-1 mx-auto pt-1 justify-between container">
        <x-logo />
    
        <div class="flex -mt-1">
            <ul class="flex flex-1 gap-12 items-center">
                <li>
                    <a href="#" class="md:text-base lg:text-lg text-lg text-gray-900 font-black transition ease-in duration-200 hover:opacity-90 hover:border-b-4 hover:border-sky-700 hover:pb-1">Início</a>
                </li>
                <li>
                    <a href="#" class="md:text-base lg:text-lg text-lg text-gray-900 font-black transition ease-in duration-200 hover:opacity-90 hover:border-b-4 hover:border-sky-700 hover:pb-1">Vagas</a>
                </li>
                <li>
                    <a href="#" class="md:text-base lg:text-lg text-gray-900 font-black transition ease-in duration-200 hover:opacity-90 hover:border-b-4 hover:border-sky-700 hover:pb-1">Anunciar</a>
                </li>
            </ul>
        </div>
    
        <div class="flex -mt-1">
            <ul class="flex flex-1 gap-7 items-center">
                <li>
                    <a href="{{ route('login') }}" class="md:text-base lg:text-lg text-lg text-gray-900 font-black transition ease-in duration-200 hover:opacity-90 hover:border-b-4 hover:border-sky-700 hover:pb-1">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="md:text-base lg:text-lg text-lg bg-gray-900 text-white py-2 px-4 rounded-md font-bold transition ease-in duration-200 hover:opacity-90 hover:bg-sky-700">Cadastre-se</a>
                </li>
            </ul>
        </div>
    </div>

    {{-- Mobile screen --}}
    <div class="md:hidden p-2 flex flex-1 justify-between items-center">
        <x-logo />

        <div>
            <button class="text-sky-900 -mt-2 relative right-5" id="menuButton">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="h-9 w-9">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                </svg>              
            </button>
        </div>

        <nav class="hidden h-screen w-4/5 fixed top-0 right-0 z-20 bg-white border border-white" id="menuMobile">
            <div class="flex flex-1 flex-col py-5 bg-cyan-700 gap-4">
                <a href="{{ route('register') }}" class="text-white bg-cyan-900 mx-auto border border-white py-2.5 w-11/12 rounded-sm text-center hover:opacity-95"> Cadastre-se gratuitamente </a>
                <a href="{{ route('login') }}" class="text-white mx-auto border border-white py-2.5 w-11/12 rounded-sm text-center hover:opacity-95"> Entrar </a>
            </div>
            <div class="p-5">
                <div>
                    <p class="text-lg font-black">MinhaVaga.com</p>
                </div>
                <ul class="flex flex-col">
                    <li class="my-3 py-1 border-b border-black">
                        <a href="#" class="text-sky-700 text-base"> Início </a>
                    </li>
                    <li class="my-3 py-1 border-b border-black">
                        <a href="#" class="text-sky-700 text-base"> Vagas </a>
                    </li>
                    <li class="my-3 py-1 border-b border-black">
                        <a href="#" class="text-sky-700 text-base"> Anunciar </a>
                    </li>
                </ul>
        </nav>

        <div class="hidden w-full h-screen fixed top-0 left-0 z-10 bg-gray-900 opacity-95 overlay"></div>
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
