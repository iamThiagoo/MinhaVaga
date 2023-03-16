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
                        <p class="cursor-pointer absolute text-center text-white camera-img-icon hidden">
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
                    <button class="flex cursor-pointer justify-between w-full py-1.5 text-lg text-gray-600 border-b-2" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                        <p>Adicionar Experiência</p>
                        <p class="text-xl"> + </p>
                    </button>
                </div>

                {{-- Education --}}
                <div class="mt-7">
                    <button class="flex cursor-pointer justify-between w-full py-1.5 text-lg text-gray-600 border-b-2">
                        <p>Adicionar Formação Acadêmica</p>
                        <p class="text-xl"> + </p>
                    </button>
                </div>

                {{-- Certificates --}}
                <div class="mt-7">
                    <div class="flex cursor-pointer justify-between w-full py-1.5 text-lg text-gray-600 border-b-2">
                        <p>Adicionar Licenças ou Certificados</p>
                        <p class="text-xl"> + </p>
                    </div>
                </div>

                {{-- Competences --}}
                <div class="mt-7">
                    <div class="flex cursor-pointer justify-between w-full py-1.5 text-lg text-gray-600 border-b-2">
                        <p>Adicionar Competências</p>
                        <p class="text-xl"> + </p>
                    </div>
                </div>

                {{-- Idioms --}}
                <div class="mt-7">
                    <div class="flex cursor-pointer justify-between w-full py-1.5 text-lg text-gray-600 border-b-2">
                        <p>Adicionar Idiomas</p>
                        <p class="text-xl"> + </p>
                    </div>
                </div>


                <div class="flex flex-col items-center justify-end gap-10 mt-10 lg:mb-5 lg:flex-row">
                    <a href="#" class="w-full mr-2 text-sm text-right underline gray-600 hover:text-gray-900">
                        Não quero fazer isso agora!
                    </a>
                    <x-primary-button class="flex justify-center w-full gap-2 py-3">
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

    <x-experience-modal method="post" route="experience.store" />

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