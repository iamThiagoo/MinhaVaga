@section('title', 'Meu Feed')

<x-app-layout>

    <main class="container flex flex-col gap-6 py-3 mx-auto lg:py-8 flex-co lg:flex-row lg:justify-between">

        <section class="w-full px-5 lg:w-8/12">
            <h2 class="flex items-center gap-2 mt-1 mb-5 text-2xl font-black"> 
                <span style="margin-top: 5px"> Hey, {{ App\Helper\Helper::greetings()}}! </span>
                <img src="https://media.giphy.com/media/hvRJCLFzcasrR4ia7z/giphy.gif" width="35px">
            </h2>

            <div class="w-full">
                <div class="flex flex-col justify-center gap-2 rounded-sm">
                    <label for="search-feed" id="label-search-feed" class="flex items-center w-full gap-3 p-2 px-4 border border-gray-400 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        <input id="search-feed" class="w-full p-0 border-0" type="text" name="search" placeholder="Pesquise por vagas, pessoas, publicações..." required autofocus />
                    </label>
                    <div class="search-list hidden"></div>
                </div>
            </div>

            <div class="flex gap-5 mt-5">
                <a href="#" class="flex gap-2 hover:opacity-80"> 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                    </svg>
                    Anunciar Vaga
                </a>
                <a href="#" class="flex gap-2 pl-3 border-l border-gray-400 hover:opacity-80">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                    Escrever artigo
                </a>
            </div>

            <div class="my-10">
                <div class="flex items-center justify-between mt-1 mb-5">
                    <h2 class="text-lg font-black lg:text-2xl"> 
                        Oportunidades que podem ser do seu interesse...
                    </h2>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:text-sky-800 lg:w-7 lg:h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>                          
                    </button>
                </div>

                <div class="grid gap-5 lg:grid-cols-2 lg:gap-5 xl:gap-2 2xl:grid-cols-3 2xl:gap-3">
                    <x-opportunity-card />
                    <x-opportunity-card />
                    <x-opportunity-card />
                    <x-opportunity-card />
                    <x-opportunity-card />
                </div>
            </div>

            <div class="my-10">
                <div class="flex items-center justify-between mt-1 mb-5">
                    <h2 class="text-lg font-black lg:text-2xl">
                        Artigos que podem ser do seu interesse...
                    </h2>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:text-sky-800 lg:w-7 lg:h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>                          
                    </button>
                </div>

                <div class="grid gap-5 lg:grid-cols-2 lg:gap-5 xl:gap-2 2xl:grid-cols-3 2xl:gap-3">
                    <x-opportunity-card />
                    <x-opportunity-card />
                    <x-opportunity-card />
                    <x-opportunity-card />
                    <x-opportunity-card />
                </div>
            </div>
        </section>

        <article class="hidden w-full lg:flex lg:w-4/12 xl:3/12">
            <div class="px-5 pt-5">
                <div class="flex items-center gap-3 mb-3 cursor-pointer hover:opacity-90">
                    <img src="{{ Auth::user()->photo ? asset('images/user_photos/' . Auth::user()->photo) : asset('images/user.png') }}" width="60px" height="60px" />
                    <div class="flex flex-col justify-center">
                        <p class="text-lg font-black"> <span class="text-sky-700"> {{ Auth::user()->name }}</span></p>
                        <a href="#" class="text-sm text-gray-500">Ver meu perfil</a>
                    </div>
                </div>
    
                <div class="pt-3 pb-3 border-t border-gray-300">
                    <h2 class="mb-3 text-base font-black">Meu relatório </h2>
    
                    <div class="flex flex-col gap-1">
                        <a href="#" class="text-sm hover:opacity-90">Meus Anúncios: <span class="text-sky-500"> 3 </span> </a>
                        <a href="#" class="text-sm hover:opacity-90">Minhas Candidaturas: <span class="text-sky-500"> 5 </span> </a>
                        <p class="text-sm">Visitas no meu perfil nos últimos 30 dias: <span class="text-sky-500"> 60 </span> </p>
                    </div>
                </div>
            </div>
        </article>
    </main>

    <x-messages-list></x-messages-list>

    <script type="text/javascript">

        var nav = document.querySelector('a[name=feed]');
        nav.classList.add('border-b-4');
        nav.classList.add('border-sky-700');
        nav.classList.add('pb-1');

        document.querySelector('#search-feed').addEventListener('keyup', (event) => {
            if (event.target.value.length >= 2) {
                requestGlobalSearch(event.target.value);
                document.querySelector("#label-search-feed").classList.remove('rounded');
                document.querySelector('.search-list').classList.remove('hidden');
            } else {
                document.querySelector("#label-search-feed").classList.add('rounded');
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
                    result.classList.add('px-3', 'py-1', 'rounded-b', 'bg-gray-100', 'border-x', 'border-b', 'border-gray-400', '-mt-2');
                    var count = 0;

                    for(i = 0; i < results.length; i++) {
                        if (results[i].length > 0) {
                            results[i].forEach( function (item) {
                                if (count <  6){
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