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
                        action="#" 
                        method="GET" 
                        class="flex items-center w-full px-3 py-1 border-2 border-black rounded-md lg:py-2">
                        @csrf
                        <div class="w-full">
                            <label class="sr-only" for="home_search_input">Pesquise aqui a sua próxima oportunidade</label>
                            <input 
                                id="home_search_input" 
                                class="w-full outline-none"
                                placeholder="Insira a vaga que está a procura, sua cidade ou estado..." />
                        </div>
                        <div>
                            <button type="submit" class="ml-2 delay-100 hover:opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex items-center w-6 h-6 mt-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </button>
                        </div>
                    </form>
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
</x-app-layout>
