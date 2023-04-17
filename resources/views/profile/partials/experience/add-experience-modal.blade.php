<x-modal name="experience-user-modal" x-show="true" focusable>
    <form method="POST" action="{{ route('experience.store') }}" class="p-6 bg-white">
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

            <div class="flex flex-col gap-5 mt-5 lg:flex-row lg:w-full">
                {{-- Initial Date --}}
                <div class="w-full">
                    <x-input-label for="initial_date" value="Data Inicial" />
                    <x-text-input id="initial_date" name="initial_date" type="date" class="w-full mt-1" required  />
                </div>

                {{-- Last Date --}}
                <div class="w-full">
                    <x-input-label for="final_date" value="Data de Término" />
                    <x-text-input id="final_date" name="final_date" type="date" class="w-full mt-1"  />
                </div>
            </div>

            {{-- Current Work --}}
            <div class="flex items-center gap-2 mt-2 ml-2">
                <input id="current_work" name="current_work" type="checkbox" class="mt-1"  />
                <x-input-label for="current_work" class="mt-2" value="Trabalho nesse cargo atualmente" />
            </div>

            {{-- Details --}}
            <div class="my-6">
                <x-input-label for="details" class="mt-2" value="Funções/Detalhes do Cargo" />
                <textarea id="details" class="block w-full mt-2 rounded-md shadow-sm focus:border-sky-600 focus:ring-sky-600" name="details" rows="6" autofocus></textarea>
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <x-secondary-button x-on:click="$dispatch('close')" class="text-red-500 bg-white border-2 border-red-500 hover:bg-red-500 hover:text-white">
                Fechar
            </x-secondary-button>

            <x-primary-button class="ml-3 text-sm">
                Adicionar
            </x-primary-button>
        </div>
    </form>

    <script type="module">

        $('#current_work').change( function () {
            let finalDate = document.querySelector('#final_date');

            if ($(this).is(':checked')) {
                finalDate.setAttribute('disabled', true);
                finalDate.style.opacity = ".5";

            } else {;
                finalDate.removeAttribute('disabled');
                finalDate.style.opacity = "1";
            }
        });

    </script>
</x-modal>