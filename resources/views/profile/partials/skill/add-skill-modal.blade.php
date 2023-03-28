<x-modal name="skill-user-modal" x-show="true" focusable>
    <form method="POST" action="#" class="p-6 bg-white">
        @csrf
        <h2 class="text-2xl font-medium text-gray-900"> Adicionar Competência </h2>

        <div class="mt-4">

            {{-- Skill --}}
            <div class="mt-7">
                <select name="skill_id" id="skill_id" class="w-full rounded-md shadow-sm xl:mt-0 focus:border-sky-600 focus:ring-sky-600" required>
                    <option value="">Selecione o idioma</option>
                    @foreach (App\Models\Skill::orderBy('name')->get() as $skill)
                        <option name="{{ $skill->name }}" value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="flex justify-end mt-6">
            <x-secondary-button x-on:click="$dispatch('close')" class="text-red-500 bg-white border-2 border-red-500 hover:bg-red-500 hover:text-white">
                Fechar
            </x-secondary-button>

            <x-primary-button class="ml-3 text-sm">
                Salvar Competência
            </x-primary-button>
        </div>
    </form>
</x-modal>