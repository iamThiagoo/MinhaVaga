@section('title', 'Home')

<x-app-layout>
    <section class="container justify-between px-5 mx-auto">

        {{-- Banner --}}
        <div class="flex items-center justify-center">
            <div>
                <div class="mb-4">
                    <h2 class="mt-3 text-3xl font-black lg:text-5xl lg:mt-0 lg:mb-3">Desbloqueie o seu próximo desafio!</h2>
                    <div class="flex justify-center lg:hidden">
                        <img class="w-10/12 -mt-5 md:w-9/12 lg:mt-0" src="{{ asset('images/svg/banner.svg') }}" />
                    </div>
                    <p class="text-lg">Encontre sua vaga de emprego ideal em uma das plataformas mais completas do Brasil</p>
                </div>
                <div>
                    <form 
                        action="{{ route('search.global') }}" 
                        method="GET" 
                        class="flex items-center w-full px-3 py-1 border-2 border-black rounded-md lg:py-2 search-form">
                        @csrf
                        <div class="w-full">
                            <label class="sr-only" for="search-home">Pesquise aqui a sua próxima oportunidade</label>
                            <input 
                                id="search-home" 
                                class="w-full outline-none"
                                placeholder="Insira a vaga que está a procura, sua cidade ou estado..." autocomplete="off" />
                        </div>
                        <div>
                            <button type="submit" class="ml-2 delay-100 hover:opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex items-center w-6 h-6 mt-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                    <div class="search-list hidden"></div>
                </div>
                <p class="mt-5 font-black text-center lg:hidden">Ainda não possui uma conta? <a href="#" class="text-sky-500"> Cadastre-se </a></p>
            </div>
            <div class="justify-center hidden lg:flex">
                <img class="md:w-9/12" src="{{ asset('images/svg/banner.svg') }}" />
            </div>
        </div>

        {{-- Latest opportunities --}}
        <div class="mt-5 mb-10 lg:mt-0">
            <div class="mb-6">
                <h2 class="pt-8 text-2xl font-black xl:pb-1">Vagas recém-publicadas em todo o Brasil</h2>
            </div>

            <div class="grid gap-5 2xl:grid-cols-4 2xl:gap-5 xl:gap-2">
                <x-opportunity-card />
                <x-opportunity-card />
                <x-opportunity-card />
                <x-opportunity-card />
                <x-opportunity-card />
            </div>

            <div class="mt-8 text-center">
                <a href="#" class="text-lg font-bold text-cyan-500 lg:text-base"> Visualizar mais vagas </a>
            </div>
        </div>
    </section>

    <script type="text/javascript">

        var nav = document.querySelector('a[name=home]');
        nav.classList.add('border-b-4');
        nav.classList.add('border-sky-700');
        nav.classList.add('pb-1');

        document.querySelector('#search-home').addEventListener('keyup', (event) => {
            if (event.target.value.length >= 2) {
                requestGlobalSearch(event.target.value);
                document.querySelector(".search-form").classList.remove('rounded');
                document.querySelector('.search-list').classList.remove('hidden');
            } else {
                document.querySelector(".search-form").classList.add('rounded');
                document.querySelector('.search-list').classList.add('hidden');
            }
        });

        async function requestGlobalSearch (value)
        {
            $.ajax({
                type: 'GET',
                url:  '{{ route("search.global") }}',
                data: {
                    q: value
                },
                dataType: 'json',
                success: function(results){
                    var result = document.createElement('ul');
                    result.classList.add('px-3', 'py-1', 'rounded-b', 'bg-gray-100', 'border-x-2', 'border-b-2', 'border-black', '-mt-2');
                    var count = 0;

                    for(i = 0; i < results.length; i++) {
                        if (results[i].length > 0) {
                            results[i].forEach( function (item) {
                                if (count <  6){
                                    console.log(results[i]);
                                    result.appendChild( createItemSearch(item) );
                                    ++count;
                                }
                            });
                        }
                    }

                    if (result.childNodes.length === 0) {
                        result.innerHTML = `<p class='text-center py-3'> Nenhum resultado encontrado! </p>`;
                    }

                    document.querySelector('.search-list').innerHTML = "";
                    document.querySelector('.search-list').appendChild(result);
                }
            });
        }

        function createItemSearch (value)
        {
            var item = document.createElement('li');
            item.classList.add("px-3", "pt-3", "pb-2");

            var link = document.createElement('a');
            link.classList.add("flex", "items-center", "w-full",  "gap-3", "hover:opacity-80", 'cursor-pointer');

            link.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg> ${value.name}`;

            item.appendChild(link);
            return item;
        }

    </script>
</x-app-layout>
