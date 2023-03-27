<x-modal name="education-user-modal" x-show="true" focusable>
    <form method="POST" action="#" class="p-6 bg-white">
        @csrf
        <h2 class="text-2xl font-medium text-gray-900"> Adicionar experiência </h2>
        <p class="mt-2 text-sm text-gray-500">Conte para nós as suas experiências, o seu período e suas funções. Vamos adorar sabê-las!</p>

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
            <div class="mt-7">
                <select 
                    name="opportunity_job_id" id="opportunity_job_id"
                    class="w-full rounded-md shadow-sm xl:mt-0 focus:border-sky-600 focus:ring-sky-600" 
                    required >
                    <option value="">Tipo do Emprego</option>
                    @foreach (App\Models\OpportunityType::all()->sortBy("name") as $opportunity_type)
                        <option name="{{ $opportunity_type->name }}" value="{{ $opportunity_type->id }}">{{ $opportunity_type->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="flex justify-end mt-6">
            <x-secondary-button x-on:click="$dispatch('close')" class="text-red-500 bg-white border-2 border-red-500 hover:bg-red-500 hover:text-white">
                Fechar
            </x-secondary-button>

            <x-primary-button class="ml-3 text-sm">
                Salvar experiência
            </x-primary-button>
        </div>
    </form>
</x-modal>