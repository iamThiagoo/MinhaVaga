@section('title', 'Página não encontrada')

<x-app-layout>
    <section class="container flex-col justify-center px-10 items-center flex-1 w-full mx-auto my-10 lg:flex min-h-3/4">

        <div class="flex justify-center">
            <img src="{{ asset('images/404.png') }}" class="w-52 h-52" alt="404 Error - Image" />
        </div>

        <div class="text-center">
            <h2 class="font-black mt-4 mb-10 text-2xl"> Página não encontrada! </h2>
            <div>
                <x-primary-button class="flex justify-center items-center w-full lg:w-96 text-sm gap-2 py-3 hover:opacity-90">
                    Voltar para Home

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </x-primary-button>
            </div>
        </div>

    </section>
</x-app-layout>