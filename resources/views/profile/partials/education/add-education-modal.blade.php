<x-modal name="education-user-modal" x-show="true" focusable>
    <form method="POST" action="{{ route('education.store') }}" class="p-6 bg-white">
        @csrf
        <h2 class="text-2xl font-medium text-gray-900"> Adicionar Formação Acadêmica </h2>
        <p class="mt-2 text-sm text-gray-500">Adicione a sua formação de ensino...</p>

        <div class="mt-4">

            {{-- Name --}}
            <div class="mt-4">
                <x-input-label for="name" value="Nome do Curso" />
                <x-text-input id="name" name="name" type="text" class="w-full mt-1" required  />
            </div>

            {{-- Institution --}}
            <div class="mt-7">
                <select
                    name="institution_id" id="institution_id"
                    class="w-full rounded-md shadow-sm xl:mt-0 focus:border-sky-600 focus:ring-sky-600"
                    required >
                    <option value=""> Nome da Instituição </option>
                    @foreach (App\Models\Institution::all()->sortBy("name") as $institution)
                        <option name="{{ $institution->name }}" value="{{ $institution->id }}">{{ $institution->name }}</option>
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

            {{-- Score (Optional) --}}
            <div class="mt-4">
                <x-input-label for="score" value="Nota Final (Opcional)" />
                <x-text-input id="score" name="score" type="text" class="w-full mt-1" />
            </div>

            {{-- Description --}}
            <div class="my-6">
                <x-input-label for="details" class="mt-2" value="Descrição/Detalhes do Curso" />
                <textarea id="description" class="block w-full mt-2 rounded-md shadow-sm focus:border-sky-600 focus:ring-sky-600" name="details" rows="6" autofocus></textarea>
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
</x-modal>