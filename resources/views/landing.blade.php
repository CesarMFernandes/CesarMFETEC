<x-app-layout>
    <div class="text-center mt-4">
        <h1 class="text-4xl font-bold mb-2">Bem vindo ao site da Etec Zona Leste</h1>
        <h2 class="text-2xl text-center m-9">Esse site serve como um calendário de eventos e atividades. Armazene, atualize e delete eventos, cursos e atividades, e escolha quais cursos você quer acompanhar com a conta de aluno.</h1>
        <div class="flex w-[80vw] mx-auto">
            <div class="w-[20vw] m-auto"><video src="{{ asset('assets/videos/coordenador.mp4') }}" controls class=" shadow-2xl border-solid border-2 border-black sm:rounded-lg hover:border-yellow-500 hover:-translate-y-1 transition duration-300 ease-in-out"></video>
                <p>Coordenador</p>
            </div>
            <div class="w-[20vw] m-auto"><video src="{{ asset('assets/videos/professor.mp4') }}" controls class="shadow-2xl border-solid border-2 border-black sm:rounded-lg hover:border-yellow-500 hover:-translate-y-1 transition duration-300 ease-in-out"></video>
                <p>Professor</p>
            </div>
            <div class="w-[20vw] m-auto"><video src="{{ asset('assets/videos/aluno.mp4') }}" controls class="shadow-2xl border-solid border-2 border-black sm:rounded-lg hover:border-yellow-500 hover:-translate-y-1 transition duration-300 ease-in-out"></video>
                <p>Aluno</p>
            </div>
        </div>
        <a href="{{ route('dashboard') }}">
            <x-primary-button class="mt-[100px] mb-2">
                {{ __('Começar agora') }}
            </x-primary-button>
        </a>
    </div>
</x-app-layout>