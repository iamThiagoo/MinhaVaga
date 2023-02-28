<footer class="bg-gray-800">
    <div class="container mx-auto p-5">
        <div class="py-3 flex flex-col justify-between items-center lg:flex-row">
            <x-logo class="text-gray-300" />

            <ul class="flex justify-center items-center gap-3 my-3">
                <li><a href="#"><img class="h-10 w-10 lg:h-8 lg:w-8" src="{{ asset('images/icons/youtube.svg') }}" /></a></li>
                <li><a href="#"><img class="h-10 w-10 lg:h-8 lg:w-8" src="{{ asset('images/icons/linkedin.svg') }}" /></a></li>
                <li><a href="#"><img class="h-10 w-10 lg:h-8 lg:w-8" src="{{ asset('images/icons/twitter.svg') }}" /></a></li>
                <li><a href="#"><img class="h-10 w-10 lg:h-8 lg:w-8" src="{{ asset('images/icons/instagram.svg') }}" /></a></li>
                <li><a href="#"><img class="h-10 w-10 lg:h-8 lg:w-8" src="{{ asset('images/icons/facebook.svg') }}" /></a></li>
            </ul>
        </div>

        <ul class="p-0 grid grid-cols-2 text-center gap-2 mt-3 lg:flex lg:justify-around lg:items-center text-gray-300">
            <li> <a href="#" class="hover:opacity-95">Termos de Uso</a> </li>
            <li> <a href="#" class="hover:opacity-95">Privacidade e Poltíca</a> </li>
            <li> <a href="#" class="hover:opacity-95">Política de Cookies</a> </li>
            <li> <a href="#" class="hover:opacity-95">Portal</a> </li>
            <li> <a href="#" class="hover:opacity-95">Ajuda</a> </li>
            <li> <a href="#" class="hover:opacity-95">Quem somos</a> </li>
            <li> <a href="#" class="hover:opacity-95">Fale conosco</a> </li>
        </ul>
        <p class="text-gray-300 text-center text-base mt-10 pb-6 lg:mt-12">
            &copy; {{ date('Y') }} - MinhaVaga.com | Todos os direitos reservados.
        </p>
    </div>
</footer>