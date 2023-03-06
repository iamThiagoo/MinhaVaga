<footer class="bg-gray-800">
    <div class="container p-5 mx-auto">
        <div class="flex flex-col items-center justify-between py-3 sm:px-5 lg:px-0 sm:flex-row sm:py-0">
            <x-logo class="mr-8 text-gray-300 " />

            <ul class="flex items-center justify-center gap-3 my-3">
                
                {{-- Youtube --}}
                <li>
                    <a href="https://www.youtube.com" class="">
                        <i class="text-2xl text-gray-300 hover:opacity-90 fa-brands fa-youtube"></i>
                    </a>
                </li>

                {{-- LinkedIn --}}
                <li>
                    <a href="https://www.linkedin.com">
                        <i class="text-2xl text-gray-300 hover:opacity-90 fa-brands fa-linkedin"></i>
                    </a>
                </li>

                {{-- Twitter --}}
                <li>
                    <a href="https://www.twitter.com">
                        <i class="text-2xl text-gray-300 hover:opacity-90 fa-brands fa-twitter"></i>
                    </a>
                </li>

                {{-- Instagram --}}
                <li>
                    <a href="https://www.instagram.com">
                        <i class="text-2xl text-gray-300 hover:opacity-90 fa-brands fa-instagram"></i>
                    </a>
                </li>

                {{-- Facebook --}}
                <li>
                    <a href="https://www.facebook.com">
                        <i class="text-2xl text-gray-300 hover:opacity-90 fa-brands fa-facebook"></i>
                    </a>
                </li>
            </ul>
        </div>

        <ul class="grid grid-cols-2 gap-2 p-0 mt-3 text-sm text-center text-gray-300 lg:flex lg:justify-around lg:items-center">
            <li> <a href="#" class="hover:opacity-95">Termos de Uso</a> </li>
            <li> <a href="#" class="hover:opacity-95">Privacidade e Poltíca</a> </li>
            <li> <a href="#" class="hover:opacity-95">Política de Cookies</a> </li>
            <li> <a href="#" class="hover:opacity-95">Portal</a> </li>
            <li> <a href="#" class="hover:opacity-95">Ajuda</a> </li>
            <li> <a href="#" class="hover:opacity-95">Quem somos</a> </li>
            <li> <a href="#" class="hover:opacity-95">Fale conosco</a> </li>
        </ul>
        <p class="pb-4 mt-10 text-sm text-center text-gray-300 lg:text-base">
            &copy; {{ date('Y') }} - MinhaVaga.com | Todos os direitos reservados.
        </p>
    </div>
</footer>