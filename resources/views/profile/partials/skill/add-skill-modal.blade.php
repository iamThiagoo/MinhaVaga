<x-modal name="skill-user-modal" x-show="true" focusable>
    <form method="POST" action="{{ route('skills.store') }}" class="p-6 bg-white" id="skills-form">
        @csrf
        <h2 class="text-2xl font-medium text-gray-900"> Adicionar Competência </h2>
        <p class="mt-2 text-sm text-gray-500">Selecione as competências que você possui...</p>

        <div class="mt-4">
            <div class="flex gap-3 flex-wrap">

                <input type="hidden" id="skills-input" name="skills" value="" required>

                @php 
                    $user_skills = App\Models\UserSkill::where('user_id', '=', Auth::user()->id)->pluck('skill_id')->toArray(); // Get array of skills already added by the user
                    $available_skills = App\Models\Skill::whereNotIn('id', $user_skills)->orderBy('name')->get(); // Get skills not added by the user
                @endphp

                @foreach ($available_skills as $skill)
                    <div class="bg-gray-500 cursor-pointer text-white text-sm rounded select-none flex p-2 gap-1 skill hover:opacity-90">
                        <span style="margin-top: 1.5px" name="{{ $skill->id }}"> {{ $skill->name }} </span>
                    </div>
                @endforeach

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

    <script type="text/javascript">

        let skills = [];

        let elements = document.querySelectorAll('.skill');

        elements.forEach( (element) => {
            element.addEventListener('click', () => {
                
                let skillId = element.firstElementChild.getAttribute("name");

                let removeIcon = document.createElement('div');
                removeIcon.insertAdjacentHTML('beforeend', '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="margin-top: 0.5px" class=" w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>');

                if(!skills.includes(skillId)) {
                    skills.push(skillId);

                    element.classList.remove('bg-gray-500');
                    element.classList.add('bg-cyan-600');
                    element.appendChild(removeIcon);

                } else {;
                    if (skills.includes(skillId)){
                        
                        let index = skills.indexOf(skillId);
                        skills.splice(index, 1);

                        element.classList.remove('bg-cyan-600');
                        element.classList.add('bg-gray-500');
                        element.children[1].remove();
                    }
                }

                document.querySelector('#skills-input').value = JSON.stringify(skills);
            });
        });

        document.querySelector('#skills-form').addEventListener('submit', (event) => {
            event.preventDefault();
            
            if (document.querySelector('#skills-input').value != '' && document.querySelector('#skills-input').value != null)
                document.querySelector('#skills-form').submit();
        });

    </script>
</x-modal>