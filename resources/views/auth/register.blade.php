@section('title', 'Registre-se')

<x-app-layout>
    <section class="container flex justify-center flex-1 w-full gap-20 pb-5 mx-auto px-7 lg:p-0 lg:my-10 min-h-3/4">
        <div class="flex flex-col justify-center lg:w-4/12">
            <div class="mb-4">
                <h2 class="mt-3 text-3xl font-black xl:text-4xl lg:text-3xl lg:mt-0 lg:mb-3">Inscreva-se agora mesmo no <span class="text-sky-800"> MinhaVaga </span></h2>
                <p class="mt-2 text-base lg:text-lg">Ao se cadastrar você poderá se candidatar as vagas de forma prática e rápida.</p>
            </div>
            <form method="POST" action="{{ route('register') }}" class="mt-2">
                @csrf
        
                <!-- Name -->
                <div>
                    <x-input-label for="name" value="Nome Completo" />
                    <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Birthday -->
                <div class="mt-4">
                    <x-input-label for="birthday" value="Data de Nascimento" />
                    <x-text-input id="birthday" class="block w-full mt-1" type="date" name="birthday" :value="old('birthday')" required autofocus />
                    <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                </div>
        
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- CPF -->
                <div class="mt-4">
                    <x-input-label for="cpf" value="CPF" />
                    <x-text-input id="cpf" class="block w-full mt-1 cpf-input" type="text" name="cpf" :value="old('cpf')" placeholder="999.999.999-99" required />
                    <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
                </div>
        
                <!-- Phone -->
                <div class="mt-4">
                    <x-input-label for="phone" value="Telefone" />
                    <x-text-input id="phone" class="block w-full mt-1 phone-input" type="text" name="phone" :value="old('phone')" placeholder="(99) 99999-9999" required />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div class="flex flex-col flex-1 max-w-full mt-0 xl:gap-3 xl:mt-5 xl:flex-row">
                    {{-- State --}}
                    <select 
                        name="state_id" id="state" :value="old('state_id')"
                        class="mt-5 rounded-md shadow-sm xl:mt-0 xl:w-3/6 focus:border-sky-600 focus:ring-sky-600" 
                        required >
                        <option value="">Selecione o seu estado</option>
                        @foreach (App\Models\State::all()->sortBy("name") as $state)
                            <option name="{{ $state->name }}" value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
        
                    {{-- City --}}
                    <select 
                        name="city_id" id="city" :value="old('city_id')"
                        class="mt-5 rounded-md shadow-sm xl:mt-0 xl:w-3/6 focus:border-sky-600 focus:ring-sky-600" 
                        disabled required >
                        <option value="">Selecione a sua cidade</option>
                    </select>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" value="Defina uma senha..." />
        
                    <x-text-input id="password" class="block w-full mt-1"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" value="Repita sua senha" />
        
                    <x-text-input id="password_confirmation" class="block w-full mt-1"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
        
                <div class="flex flex-col items-center justify-end mt-7 lg:my-5 lg:flex-row">
                    <p class="w-full mr-2 text-sm text-right underline gray-600 hover:text-gray-900">
                        Já possui conta no MinhaVaga?
                    </p>
                    
                    <x-primary-button class="flex items-center justify-center w-full gap-2 py-3 my-6 text-sm lg:w-auto lg:my-0 lg:ml-8 bg-cyan-800 hover:bg-gray-600">
                        Continuar
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>                  
                    </x-primary-button>
                </div>
            </form>
        </div>

        <img src="{{ asset('images/svg/register.svg') }}" class="hidden w-5/12 p-4 lg:block" />
    </section>

    <script type="module">
        $(document).ready(function () {
            // Takes the id from the state field and returns the cities assigned to it
            $('#state').change(function (event) {
                let cityInput  = $('#city');
                let stateId    = $('#state').val();
                $(cityInput).prop("disabled", false);
                
                $.ajax({
                    type: 'GET',
                    url:  '{{ url("/cities/' + stateId + '") }}',
                    data: {
                        state_id: stateId
                    },
                    dataType: 'json',
                    success: function(data){
                        $(data).each(function(index, value) {
                            cityInput.append('<option name="' + value.name + '" value="'+ value.id +'"">' + value.name + '</option>')
                        });
                    }
                });
            });
        });

    </script>
</x-app-layout>