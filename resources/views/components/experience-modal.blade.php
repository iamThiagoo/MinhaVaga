<div>
    <x-modal name="experince-modal" :show="true" focusable>
        <form :method="$method" :action="route($route)" class="bg-white p-6">
            @csrf
            
            <h2 class="text-2xl font-medium text-gray-900">
                {{ $title }}
            </h2>

            <p class="mt-2 text-gray-500 text-sm">Conte para nós as suas experiências, o seu período e suas funções. Vamos adorar sabê-las!</p>

            <div class="mt-4">

                {{-- Name --}}
                <div class="mt-4">
                    <x-input-label for="name" value="Nome do Cargo" />
                    <x-text-input id="name" name="name" type="text" class="w-full mt-1" required  />
                </div>

                {{-- Company --}}
                <div class="mt-4">
                    <x-input-label for="company" value="Nome da Empresa" />
                    <x-text-input id="company" name="company" type="text" class="w-full mt-1" required  />
                </div>

                {{-- Type of Job --}}
                <div class="mt-4">
                    <x-input-label for="type_job_id" value="Tipo de Emprego" />
                    <x-text-input id="type_job_id" name="type_job_id" type="text" class="w-full mt-1" required  />
                </div>

                <div class="flex w-full gap-5 mt-4">

                    {{-- Initial Date --}}
                    <div class="w-full">
                        <x-input-label for="initial_date" value="Data Inicial" />
                        <x-text-input id="initial_date" name="initial_date" type="date" class="w-full mt-1" required  />
                    </div>

                    {{-- Last Date --}}
                    <div class="w-full">
                        <x-input-label for="last_date" value="Data de Término" />
                        <x-text-input id="last_date" name="last_date" type="date" class="w-full mt-1" required  />
                    </div>

                </div>

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-6">
                <x-secondary-button class="bg-white text-red-500 border-2 border-red-500 hover:bg-red-500 hover:text-white" x-on:click="$dispatch('close')">
                    Fechar
                </x-secondary-button>

                <x-primary-button class="text-sm ml-3">
                    Salvar experiência
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</div>