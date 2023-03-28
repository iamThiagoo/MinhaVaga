@section('title', 'Criando seu perfil público')

<x-app-layout>
    <section class="container flex-col justify-center flex-1 w-full mx-auto my-10 lg:flex min-h-3/4">

        <div class="px-5 text-center lg:px-0">
            <h2 class="text-2xl font-black">Seja muito bem-vindo(a) <span class="text-sky-800"> {{ $firstname }},</span> vamos criar o seu perfil!</h2>
            <p class="mt-2 mb-4"> Nos conte as suas experiências, seus certificados e suas conquistas mais importantes no âmbito de trabalho </p>
        </div>

        <form class="flex flex-col justify-center gap-10 px-5 mt-3 lg:px-0 lg:gap-20 lg:flex-row" enctype="multipart/form-data">
            @csrf
            <div class="w-full my-3 lg:w-4/12">
                <div class="">
                    <div class="flex items-center justify-center img-profile">
                        <img class="cursor-pointer user-photo" style="background: rgb(228, 228, 228); object-fit: contain; width: 150px; height: 150px; border-radius: 50%">
                        <p class="absolute hidden text-center text-white cursor-pointer camera-img-icon">
                            <i class="fa-solid fa-camera-retro"></i><br>
                            Adicionar foto
                        </p>
                    </div>
                    <label for="user-photo-input" id="user-photo-label"></label>
                    <input type="file" class="hidden" id="user-photo-input" name="user-photo" accept="image/*">
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
                        <textarea id="bio" class="block w-full mt-1 rounded-md shadow-sm focus:border-sky-600 focus:ring-sky-600" name="bio" rows="6" :value="old('bio')" autofocus></textarea>
                        <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                    </div>

                </div>
            </div>
            <div class="w-full lg:w-5/12">

                {{-- Experiences --}}
                <div>
                    <button class="flex cursor-pointer justify-between w-full py-1.5 text-lg text-gray-600 border-b-2" x-data="" x-on:click.prevent="$dispatch('open-modal', 'experience-user-modal')">
                        <p>Adicionar Experiência</p>
                        <p class="text-xl"> + </p>
                    </button>

                    {{-- <div class="experience-card my-5 border-b-2 pb-5">
                        <div class="flex items-start gap-3 mb-4 lg:mb-2">
                            <div class="flex items-start">
                                <img src="{{ asset('images/svg/company.svg') }}" class="w-14" alt="Icone de empresa">
                            </div>
                            <div>
                                <h2 class="font-black text-xl mb-1">Developer Jr in <span class="text-sky-900"> Company </span> </h2>
                                <h3 class="text-base mb-2">Jan/2020 - Dez/2022</h3>
                            </div>
                        </div>
                        <div>
                            <p class="px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio saepe debitis neque vitae, aperiam quia voluptates doloribus necessitatibus consequatur in perferendis fugiat. Nam voluptas aliquid quibusdam magni quo illo harum.</p>
                            
                            <div class="flex justify-end mt-4 gap-2 pr-2">
                                <button class="bg-cyan-700 text-white gap-2 p-2 px-4 flex items-center rounded-lg lg:text-sm hover:opacity-95">
                                    Editar
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 lg:w-4 lg:h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>                                                                  
                                </button>
                            
                                <button class="bg-red-500 text-white gap-2 p-2 px-4 flex items-center rounded-lg lg:text-sm hover:opacity-95">
                                    Excluir
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 lg:w-4 lg:h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>                                  
                                </button>
                            </div>
                        </div>
                    </div> --}}
                </div>

                {{-- Education --}}
                <div class="mt-7">
                    <button class="flex cursor-pointer justify-between w-full py-1.5 text-lg text-gray-600 border-b-2" x-data="" x-on:click.prevent="$dispatch('open-modal', 'education-user-modal')">
                        <p>Adicionar Formação Acadêmica</p>
                        <p class="text-xl"> + </p>
                    </button>
                </div>

                {{-- Certificates --}}
                <div class="mt-7">
                    <div class="flex cursor-pointer justify-between w-full py-1.5 text-lg text-gray-600 border-b-2" x-data="" x-on:click.prevent="$dispatch('open-modal', 'certificate-user-modal')">
                        <p>Adicionar Licenças ou Certificados</p>
                        <p class="text-xl"> + </p>
                    </div>
                </div>

                {{-- Competences --}}
                <div class="mt-7">
                    <div class="flex cursor-pointer justify-between w-full py-1.5 text-lg text-gray-600 border-b-2" x-data="" x-on:click.prevent="$dispatch('open-modal', 'competence-user-modal')">
                        <p>Adicionar Competências</p>
                        <p class="text-xl"> + </p>
                    </div>
                </div>

                {{-- Idioms --}}
                <div class="mt-7">
                    <div class="flex cursor-pointer justify-between w-full py-1.5 text-lg text-gray-600 border-b-2" x-data="" x-on:click.prevent="$dispatch('open-modal', 'idiom-user-modal')">
                        <p>Adicionar Idiomas</p>
                        <p class="text-xl"> + </p>
                    </div>
                </div>

                <div class="flex flex-col items-center justify-end gap-10 mt-10 lg:mb-5 lg:flex-row">
                    <a href="#" class="w-full mr-2 text-sm text-right underline gray-600 hover:text-gray-900">
                        Não quero fazer isso agora!
                    </a>
                    <x-primary-button class="flex justify-center w-full lg:w-96 text-sm gap-2 py-3 hover:opacity-90">
                        Salvar perfil

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-5 h-5 ">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>                      
                    </x-primary-button>
                </div>
            </div>
        </form>

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
    @include('profile.partials.competence.add-competence-modal')

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

    </script>
</x-app-layout>