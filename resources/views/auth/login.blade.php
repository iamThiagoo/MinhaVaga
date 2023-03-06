<x-app-layout>

    {{-- Desktop screen --}}
    <div class="container justify-center flex-1 hidden gap-20 mx-auto lg:flex h-3/4">
        <div class="flex flex-col justify-center w-4/12">
            <div class="mb-4">
                <h2 class="mt-3 text-3xl font-black lg:text-5xl lg:mt-0 lg:mb-3">Acesse sua conta!</h2>
                <p class="text-lg">Aproveite sua vida profissional ao máximo</p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="mt-2">
                @csrf
    
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input  id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
    
                    <x-text-input id="password" class="block w-full mt-1"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
    
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <a ref="#" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900">
                        Esqueceu a senha?
                    </a>
    
                    <x-primary-button class="flex items-center gap-2 py-3 ml-8 text-sm bg-cyan-800 hover:bg-gray-600">
                        Entrar
                        
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>                          
                    </x-primary-button>
                </div>
            </form>
        </div>

        <img src="{{ asset('images/svg/login.svg') }}" class="w-2/6 p-3" />
    </div>

    {{-- Mobile screen --}}
    <div class="container flex justify-center flex-1 px-7 lg:hidden h-min-3/6 md:flex">
        <div class="flex flex-col justify-center mt-20 mb-32">
            <div class="mb-4">
                <h2 class="mt-3 text-3xl font-black lg:text-5xl lg:mt-0 lg:mb-3">Acesse sua conta!</h2>
                <p class="text-lg">Aproveite sua vida profissional ao máximo</p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="mt-2">
                @csrf
    
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input  id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
    
                    <x-text-input id="password" class="block w-full mt-1"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
    
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-6 mb-4">
                    <a ref="#" class="text-sm text-gray-600 rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-800">
                        Esqueceu a senha?
                    </a>
                </div>

                <x-primary-button class="w-full py-3 text-sm text-center bg-cyan-800 hover:bg-gray-600">
                    Entrar
                </x-primary-button>
                
            </form>
        </div>
    </div>
</x-app-layout>
