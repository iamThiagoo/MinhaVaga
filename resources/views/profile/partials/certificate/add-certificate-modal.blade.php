<x-modal name="certificate-user-modal" x-show="true" focusable>
    <form method="POST" action="#" class="p-6 bg-white">
        @csrf
        <h2 class="text-2xl font-medium text-gray-900"> Adicionar experiência </h2>
        <div class="mt-4">

            {{-- Name --}}
            <div class="mt-4">
                <x-input-label for="name" value="Nome do Certificado/Licença" />
                <x-text-input id="name" name="name" type="text" class="w-full mt-1" required  />
            </div>

            {{-- Institution --}}
            <div class="mt-7">
                <select
                    name="opportunity_job_id" id="opportunity_job_id"
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
                    <x-input-label for="initial_date" value="Data da Certificação" />
                    <x-text-input id="initial_date" name="initial_date" type="date" class="w-full mt-1" required  />
                </div>

                {{-- Last Date/Expire Date --}}
                <div class="w-full">
                    <x-input-label for="final_date" value="Data de Expiração" />
                    <x-text-input id="final_date" name="final_date" type="date" class="w-full mt-1"  />
                </div>
            </div>

            {{-- Certificate not expired --}}
            <div class="flex items-center gap-2 mt-2 ml-2">
                <input id="certificate-not-expired" name="certificate-not-expired" type="checkbox" class="mt-1"  />
                <x-input-label for="certificate-not-expired" class="mt-2" value="Certificado/Licença não possui data de expiração" />
            </div>

            {{-- Certificate Code --}}
            <div class="mt-4">
                <x-input-label for="code_certificate" value="Código do Certificado" />
                <x-text-input id="code_certificate" name="code_certificate" type="text" class="w-full mt-1" required  />
            </div>

            {{-- Certificate URL --}}
            <div class="mt-4">
                <x-input-label for="url_certificate" value="URL do Certificado" />
                <x-text-input id="url_certificate" name="url_certificate" type="url" class="w-full mt-1" required  />
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <x-secondary-button x-on:click="$dispatch('close')" class="text-red-500 bg-white border-2 border-red-500 hover:bg-red-500 hover:text-white">
                Fechar
            </x-secondary-button>

            <x-primary-button class="ml-3 text-sm">
                Salvar Certificado/Licença
            </x-primary-button>
        </div>
    </form>
</x-modal>