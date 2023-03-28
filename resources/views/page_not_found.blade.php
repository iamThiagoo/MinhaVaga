@section('title', 'Página não encontrada')

<x-app-layout>
    <section class="container flex-col justify-center px-10 py-20 items-center flex-1 w-full mx-auto my-10 lg:flex min-h-3/4">

        <div class="flex justify-center">
            <img src="{{ asset('images/svg/404.svg') }}" class="w-60 lg:w-80" alt="404 Error - Image" />
        </div>

        <div class="text-center">
            <h2 class="font-black mt-10 mb-8 text-2xl lg:mt-14"> Página não encontrada! </h2>
            <div>
                <x-primary-button class="flex justify-center items-center w-full lg:w-96 text-sm gap-2 py-3 hover:opacity-90" onclick="window.location='{{ route('home') }}'">
                    Voltar para Home
                </x-primary-button>
            </div>
        </div>

    </section>
</x-app-layout>