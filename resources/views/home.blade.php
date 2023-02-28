<x-app-layout>
    <div class="px-5 mx-auto justify-between container">

        {{-- Banner --}}
        <div class="flex items-center justify-center">
            <div>
                <div class="mb-4">
                    <h2 class="text-3xl lg:text-5xl mt-3 lg:mt-0 lg:mb-3 font-black">Desbloqueie o seu próximo desafio!</h2>
                    <div class="flex justify-center lg:hidden">
                        <img class="w-10/12 md:w-9/12 -mt-5 lg:mt-0" src="{{ asset('images/banner.svg') }}" />
                    </div>
                    <p class="text-lg">Encontre sua vaga de emprego ideal em uma das plataformas mais completas do Brasil</p>
                </div>
                <div>
                    <form 
                        action="#" 
                        method="GET" 
                        class="flex items-center border-2 px-3 py-1 lg:py-2 rounded-md border-black w-full">
                        @csrf
                        <div class="w-full">
                            <label class="sr-only" for="home_search_input">Pesquise aqui a sua próxima oportunidade</label>
                            <input 
                                id="home_search_input" 
                                class="w-full outline-none"
                                placeholder="Insira a vaga que está a procura, sua cidade ou estado..." />
                        </div>
                        <div>
                            <button type="submit" class="ml-2 hover:opacity-50 delay-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 flex items-center mt-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                <p class="text-center font-black mt-5 lg:hidden">Ainda não possui uma conta? <a href="#" class="text-sky-500"> Cadastre-se </a></p>
            </div>
            <div class="hidden lg:flex justify-center">
                <img class="md:w-9/12" src="{{ asset('images/banner.svg') }}" />
            </div>
        </div>

        {{-- Latest opportunities --}}
        <div class="mt-5 mb-10 lg:mt-0">
            <div class="mb-6">
                <h2 class="font-black pt-8 xl:pb-1 text-2xl">Vagas recém-publicadas em todo o Brasil</h2>
            </div>

            <div class="grid 2xl:grid-cols-4 gap-5 2xl:gap-5 xl:gap-2">
                <x-opportunity-card />
                <x-opportunity-card />
                <x-opportunity-card />
                <x-opportunity-card />
                <x-opportunity-card />
            </div>

            <div class="mt-8 text-center">
                <a href="#" class="text-cyan-500 text-lg lg:text-base font-bold"> Visualizar mais vagas </a>
            </div>
        </div>
    </div>
</x-app-layout>
