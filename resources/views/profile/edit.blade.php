@section('title', 'Criando seu perfil público')

<x-app-layout>
    <section class="container flex-col justify-center flex-1 w-full mx-auto my-10 lg:flex min-h-3/4">

        <div class="px-5 text-center lg:px-0">
            <h2 class="text-2xl font-black">Seja muito bem-vindo(a) <span class="text-sky-800"> {{ $firstname }},</span> vamos criar o seu perfil!</h2>
            <p class="mt-2 mb-4"> Nos conte as suas experiências, seus certificados e suas conquistas mais importantes no âmbito de trabalho </p>
        </div>

        <div class="flex flex-col justify-center gap-10 px-5 mt-3 lg:px-0 lg:gap-20 lg:flex-row">
            <form class="w-full my-3 lg:w-4/12" id="saveProfileForm" method="POST" action="{{ route('user.update.with.redirect', ['user' => Auth::user()->id, 'redirect' => 'feed']) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div>
                    <div class="flex items-center justify-center img-profile">
                        <img class="cursor-pointer user-photo" style="background: rgb(228, 228, 228); object-fit: contain; width: 150px; height: 150px; border-radius: 50%">
                        <p class="absolute hidden text-center text-white cursor-pointer camera-img-icon">
                            <i class="fa-solid fa-camera-retro"></i><br>
                            Adicionar foto
                        </p>
                    </div>
                    <label for="user-photo-input" id="user-photo-label"></label>
                    <input type="file" class="hidden" id="user-photo-input" name="user_photo" accept="image/*">
                </div>
                <div class="flex flex-col mt-3">
                    {{-- Name --}}
                    <div class="mt-4">
                        <x-input-label for="name" value="Nome Visível" />
                        <x-text-input  id="name" class="block w-full mt-1" type="text" name="name" :value="$user->name" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- Bio --}}
                    <div class="mt-4">
                        <x-input-label for="bio" value="Adicione uma bio para o seu perfil..." />
                        <textarea id="bio" class="block w-full mt-1 rounded-md shadow-sm focus:border-sky-600 focus:ring-sky-600" name="bio" rows="6" autofocus>{{ $user->bio }}</textarea>
                        <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                    </div>
                </div>
            </form>
            <div class="w-full lg:w-5/12">

                {{-- Experiences --}}
                <div>
                    <button class="flex cursor-pointer justify-between w-full py-1.5 text-lg text-gray-600 border-b-2 hover:opacity-80" x-data="" x-on:click.prevent="$dispatch('open-modal', 'experience-user-modal')">
                        <p class="font-black">Adicionar Experiência</p>
                        <p class="text-xl font-black"> + </p>
                    </button>

                    @php $experiences = App\Models\UserExperience::where('user_id', '=', Auth::user()->id)->get(); @endphp

                    @if (!empty($experiences))
                        @foreach($experiences as $experience)
                        <div class="experience-card my-5 pb-5">
                            <div class="flex items-start gap-3 mb-4 lg:mb-2">
                                    <div class="flex items-start">
                                        <img src="{{ asset('images/svg/company.svg') }}" class="w-12 lg:w-14" alt="Icone de empresa">
                                    </div>
                                    <div>
                                        <h2 class="font-black text-base lg:text-xl mb-1">{{ $experience->name }} em <span class="text-sky-900"> {{ $experience->company }} </span> </h2>
                                        <h3 class="text-sm lg:text-base mb-2">
                                            {{ date('M/Y', strtotime($experience->initial_date)) }} - {{ $experience->current_work ? "Presente" : date('M/Y', strtotime($experience->final_date)) }} ({{ App\Helper\Helper::diffYearsAndMonths($experience->initial_date, $experience->final_date) }})
                                        </h3>
                                    </div>
                                </div>
                                <div>
                                    <p class="px-2 text-sm lg:text-base"> {!! nl2br($experience->details) !!} </p>
                                    
                                    <div class="flex justify-end mt-4 gap-2 pr-2">
                                        <form method="POST" action="{{ route('experience.destroy', $experience->id) }}">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="bg-red-500 text-white gap-2 p-2 px-4 flex items-center rounded-lg text-sm hover:opacity-95">
                                                Excluir
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 lg:w-4 lg:h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>                                  
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

                {{-- Education --}}
                <div class="mt-7">
                    <button class="flex cursor-pointer justify-between w-full py-1.5 text-lg text-gray-600 border-b-2 hover:opacity-80" x-data="" x-on:click.prevent="$dispatch('open-modal', 'education-user-modal')">
                        <p class="font-black">Adicionar Formação Acadêmica</p>
                        <p class="text-xl font-black"> + </p>
                    </button>

                    @php $educations = App\Models\UserEducation::where('user_id', '=', Auth::user()->id)->get(); @endphp

                    @if (!empty($educations))
                        @foreach($educations as $education)
                        <div class="experience-card my-5 pb-5">
                            <div class="flex items-start gap-3 mb-4 lg:mb-2">
                                    <div class="flex items-start">
                                        <img src="{{ asset('images/svg/college.svg') }}" class="w-14" alt="Icone de empresa">
                                    </div>
                                    <div>
                                        <h2 class="font-black text-base lg:text-xl mb-1">{{ $education->name }} </h2>
                                        <p class="text-sm mb-2"> {{ $education->institution->name }} </p>
                                        <h3 class="text-sm lg:text-base mb-2">
                                            {{ date('M/Y', strtotime($education->initial_date)) }} - {{ $education->current_work ? "Presente" : date('M/Y', strtotime($education->final_date)) }} ({{ App\Helper\Helper::diffYearsAndMonths($education->initial_date, $education->final_date) }})
                                        </h3>
                                    </div>
                                </div>
                                <div>
                                    <p class="px-2 text-sm lg:text-base"> {!! nl2br($education->details) !!} </p>
                                    
                                    <div class="flex justify-end gap-2 pr-2">
                                        <form method="POST" action="{{ route('education.destroy', $education->id) }}">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="bg-red-500 text-white gap-2 p-2 px-4 flex items-center rounded-lg text-sm hover:opacity-95">
                                                Excluir
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>                                  
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

                {{-- Certificates --}}
                <div class="mt-7">
                    <div class="flex cursor-pointer justify-between w-full py-1.5 text-lg text-gray-600 border-b-2 hover:opacity-80" x-data="" x-on:click.prevent="$dispatch('open-modal', 'certificate-user-modal')">
                        <p class="font-black">Adicionar Licenças ou Certificados</p>
                        <p class="text-xl font-black"> + </p>
                    </div>

                    @php $certificates = App\Models\UserCertificate::where('user_id', '=', Auth::user()->id)->get(); @endphp

                    @if (!empty($certificates))
                        @foreach($certificates as $certificate)
                        <div class="experience-card my-5 pb-5">
                            <div class="flex items-start gap-3 mb-4 lg:mb-2">
                                    <div class="flex items-start">
                                        <img src="{{ asset('images/svg/certificate.svg') }}" class="w-14" alt="Icone de empresa">
                                    </div>
                                    <div>
                                        <h2 class="font-black text-base lg:text-xl mb-1">{{ $certificate->name }} </h2>
                                        <p class="text-sm mb-2"> {{ $certificate->institution->name }} </p>
                                        <h3 class="text-sm lg:text-base mb-2">
                                            {{ date('M/Y', strtotime($certificate->initial_date)) }} - {{ $certificate->no_expired ? "Sem data de expiração" : date('M/Y', strtotime($certificate->final_date)) }}
                                        </h3>

                                        @if (!empty($certificate->code_certificate))
                                            <h3 class="text-sm lg:text-base mb-2">
                                                Código da Licença/Certificado: <span class="font-black"> {{ $certificate->code_certificate }} </span>
                                            </h3>
                                        @endif

                                        @if (!empty($certificate->url_certificate))
                                            <h3 class="text-sm lg:text-base mb-2">
                                                URL da Licença/Certificado: <a href="{{ $certificate->url_certificate }}" target="_blank" class="text-sky-600 hover:opacity-90"> {{ $certificate->url_certificate }} </a>
                                            </h3>
                                        @endif

                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-end gap-2 pr-2">
                                        <form method="POST" action="{{ route('certificate.destroy', $certificate->id) }}">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="bg-red-500 text-white gap-2 p-2 px-4 flex items-center rounded-lg text-sm hover:opacity-95">
                                                Excluir
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>                                  
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                {{-- Competences --}}
                <div class="mt-7">
                    <div class="flex cursor-pointer justify-between w-full py-1.5 text-lg text-gray-600 border-b-2 hover:opacity-80" x-data="" x-on:click.prevent="$dispatch('open-modal', 'skill-user-modal')">
                        <p class="font-black">Adicionar Competências</p>
                        <p class="text-xl font-black"> + </p>
                    </div>

                    @php $skills = App\Models\UserSkill::where('user_id', '=', Auth::user()->id)->get(); @endphp

                    @if (!empty($skills) && count($skills) > 0)
                        <div class="flex mt-6 gap-3 flex-wrap">
                            @foreach ($skills as $skill)
                                <form method="POST" action="{{ route('skills.destroy', $skill->id) }}" class="bg-cyan-600 cursor-pointer text-white text-sm rounded select-none flex p-2 gap-1 hover:opacity-90">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <span style="margin-top: 1.5px" name="{{ $skill->id }}" class="text-sm lg:text-sm"> {{ $skill->skill->name }} </span>

                                    <button type="submit" class="m-0 p-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="margin-top: 0.5px" class=" w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                </form>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Idioms --}}
                <div class="mt-7">
                    <div class="flex cursor-pointer justify-between w-full py-1.5 text-lg text-gray-600 border-b-2 hover:opacity-80" x-data="" x-on:click.prevent="$dispatch('open-modal', 'idiom-user-modal')">
                        <p class="font-black">Adicionar Idiomas</p>
                        <p class="text-xl font-black"> + </p>
                    </div>

                    @php $user_idioms = App\Models\UserIdiom::where('user_id', '=', Auth::user()->id)->get(); @endphp

                    @foreach ($user_idioms as $user_idiom)
                        <div class="flex justify-between p-4 px-1 border-b-2">
                            <div>
                                <h2 class="font-black text-base lg:text-lg"> {{ $user_idiom->idiom->name }} </h2>
                                <p class="text-sm lg:text-base">Fluência: {{ App\Helper\Helper::fluencyTerm($user_idiom->fluency) }} </p>
                            </div>
                            <div class="flex justify-end lg:mt-4 gap-2 pr-2">
                                <form method="POST" action="{{ route('idiom.destroy', $user_idiom->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="bg-red-500 text-white gap-2 p-2 px-4 flex items-center rounded-lg text-sm hover:opacity-95">
                                        Excluir
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>                                  
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="flex flex-col items-center justify-end gap-10 mt-10 lg:mb-5 lg:flex-row">
                    <a href="{{ route('feed') }}" class="w-full mr-2 text-sm text-right underline gray-600 hover:text-gray-900">
                        Não quero fazer isso agora!
                    </a>
                    <x-primary-button class="flex justify-center w-full lg:w-96 text-sm gap-2 py-3 hover:opacity-90" id="saveProfile">
                        Salvar perfil

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-5 h-5 ">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>                      
                    </x-primary-button>
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            <p class="w-5/6 text-base text-center mt-14">Se você possui alguma dúvida/feedback nos envie através do email <a href="#" class="text-sky-500 hover:opacity-90">contato@minhavaga.com.br</a>, vamos adorar recebê-la.</p>
        </div>
    </section>

    {{-- Create Experience Form --}}
    @include('profile.partials.experience.add-experience-modal')

    {{-- Create Education Form --}}
    @include('profile.partials.education.add-education-modal')

    {{-- Create Certificate Form --}}
    @include('profile.partials.certificate.add-certificate-modal')

    {{-- Create Competence Form --}}
    @include('profile.partials.skill.add-skill-modal')

    {{-- Create Idiom Form --}}
    @include('profile.partials.idiom.add-idiom-modal')

    <script type="module">

        $( document ).ready( function() {

            $('.user-photo, .camera-img-icon').hover( function () {
                $('.camera-img-icon').removeClass('hidden');
                $('.user-photo').css('filter', 'brightness(0.3)');
            });
            
            $('.user-photo, .camera-img-icon').on('mouseleave', function () {
                $('.camera-img-icon').addClass('hidden');
                $('.user-photo').css('filter', '');
            });
            
            $('.user-photo, .camera-img-icon').click(function (event) {
                $('#user-photo-label').click();
            });
            
            if($(window).width() <= 768) {
                $('.camera-img-icon').removeClass('hidden');
                $('.user-photo').css('filter', 'brightness(0.3)');
            }
        });

        if (sessionStorage.getItem('user-photo')){
            let output = document.querySelector('.user-photo');
            output.src = sessionStorage.getItem('user-photo');
        } else {
            let output = document.querySelector('.user-photo');
            output.src = "{{ asset('/images/user.png') }}";
        }

        function loadFile(event) {
            sessionStorage.removeItem('user-photo'); // clean sesson
            let reader = new FileReader();
            
            reader.onload = function(){
                let output = document.querySelector('.user-photo');
                output.src = reader.result;

                sessionStorage.setItem('user-photo', reader.result);
            };
            
            reader.readAsDataURL(event.target.files[0]);
            
            if($(window).width() <= 768) {
                $('.camera-img-icon').addClass('hidden');
                $('.user-photo').css('filter', '');
            }
        }

        $('#user-photo-input').change(function (event) {
            loadFile(event);
        });


        $('#saveProfile').click( function (event) {
            event.preventDefault();

            $('#saveProfileForm').submit();
        });

    </script>
</x-app-layout>