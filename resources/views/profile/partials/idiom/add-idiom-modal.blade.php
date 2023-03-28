<x-modal name="idiom-user-modal" x-show="true" focusable>
    <form method="POST" action="#" class="p-6 bg-white">
        @csrf
        <h2 class="text-2xl font-medium text-gray-900"> Adicionar idioma </h2>

        <div class="mt-4">

            {{-- Idiom --}}
            <div class="mt-7">
                <select name="idiom_id" id="idiom_id" class="w-full rounded-md shadow-sm xl:mt-0 focus:border-sky-600 focus:ring-sky-600" required>
                    <option value="">Selecione o idioma</option>
                    @foreach (App\Models\Idiom::orderBy('name')->get() as $idiom)
                        <option name="{{ $idiom->name }}" value="{{ $idiom->id }}">{{ $idiom->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Fluency --}}
            <div class="mt-7">
                <select name="fluency" id="fluency" class="w-full rounded-md shadow-sm xl:mt-0 focus:border-sky-600 focus:ring-sky-600"  required>
                    <option value="">Indique sua fluência</option>
                    <option name="B" value="B"> Nível Básico </option>
                    <option name="I" value="I"> Nível Intermediário </option>
                    <option name="A" value="A"> Nível Avançado </option>
                    <option name="F" value="F"> Nível Fluente </option>
                </select>
            </div>

        </div>

        <div class="flex justify-end mt-6">
            <x-secondary-button x-on:click="$dispatch('close')" class="text-red-500 bg-white border-2 border-red-500 hover:bg-red-500 hover:text-white">
                Fechar
            </x-secondary-button>

            <x-primary-button class="ml-3 text-sm">
                Salvar idioma
            </x-primary-button>
        </div>
    </form>
</x-modal>