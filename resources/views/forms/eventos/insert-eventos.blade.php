
<x-app-layout>
    
    <div class="flex w-full h-[800px]">
        <div class="bg-white border-[1px] border-solid border-gray-950 sm:rounded-lg m-auto h-[550px] w-[900px] p-6">
            <h1 class="text-center font-bold text-4xl mb-10">POSTAR EVENTO</h1>
            <form method="POST" action="{{ route('eventos.create') }}" enctype="multipart/form-data">
                @csrf

                <!-- Título -->
                <div class="mb-5">
                    <x-input-label for="titulo" :value="__('Título')" />
                    <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')" required autofocus autocomplete="titulo" maxlength="30"/>
                    <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                </div>

                <!-- Texto -->
                <div class="mb-5">
                    <x-input-label for="texto" :value="__('Texto')" />
                    <x-text-input id="texto" class="block mt-1 w-full" type="text" name="texto" :value="old('texto')" required autocomplete="texto" maxlength="255"/>
                    <x-input-error :messages="$errors->get('texto')" class="mt-2" />
                </div>

                <!-- Horário do evento -->
                <div class="mb-5">
                    <x-input-label for="hora_evento" :value="__('Horário do Evento')" />
                    <x-text-input id="hora_evento" name="hora_evento" type="datetime-local" class="mt-1 block w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('hora_evento')" />
                </div>

                <!-- Imagem -->
                <div class="mb-[50px]">
                    <x-input-label for="caminho_img" :value="__('Imagem')" />
                    <x-text-input id="caminho_img" name="caminho_img" type="file" class="mt-1 block w-full" />
                    <x-input-error class="mt-2 mb-[-28px]" :messages="$errors->get('caminho_img')" />
                </div>

                <x-primary-button class="ms-4">
                    {{ __('Postar') }}
                </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
