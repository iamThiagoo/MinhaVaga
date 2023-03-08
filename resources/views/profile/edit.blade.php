@section('title', 'Criando seu perfil público')

<x-app-layout>
    <section class="container flex-col justify-center flex-1 w-full mx-auto my-10 lg:flex min-h-3/4">

        <div class="text-center">
            <h2 class="text-2xl font-black">Seja muito bem-vindo(a) <span class="text-sky-800"> {{ $firstname }},</span> vamos criar o seu perfil!</h2>
            <p class="mt-2 mb-4"> Nos conte as suas experiências, seus certificados e suas conquistas mais importantes no âmbito de trabalho </p>
        </div>

        <form class="flex justify-center gap-20 mt-3" method="POST" action="#" enctype="multipart/form-data">
            @csrf
            <div class="w-4/12 my-3">
                <div class="flex justify-center">
                    <img class="user-photo" src="{{ asset('/images/user.png') }}" width="150px">
                    <p class="hidden text-center text-white camera-img-icon">
                        <i class="fa-solid fa-camera-retro"></i><br>
                        Adicionar foto
                    </p>
                    <label for="user-photo-input" id="user-photo-label"></label>
                    <input type="file" class="hidden" id="user-photo-input" name="user-photo" accept="image/*" onchange="loadFile(event)">
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
                        <textarea id="bio" class="block w-full mt-1 rounded-md shadow-sm focus:border-sky-600 focus:ring-sky-600" name="bio" rows="6" :value="old('bio')" required autofocus></textarea>
                        <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                    </div>

                </div>
            </div>
            <div class="w-5/12">

                {{-- Experiences --}}
                <div>
                    <button class="flex cursor-pointer justify-between w-full py-1.5 text-lg text-gray-600 border-b-2" data-bs-toggle="modal" data-bs-target="#experienceModal">
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
</x-app-layout>