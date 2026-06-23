
<x-app-layout>
    
    <div class="flex w-full h-[800px]">
        <div class="bg-white border-[1px] border-solid border-gray-950 sm:rounded-lg m-auto h-[400px] w-[900px] p-6">
            <h1 class="text-center font-bold text-4xl mb-10">CRIAR CURSO</h1>
            <form method="POST" action="{{ route('cursos.create') }}">
                @csrf

                <!-- Nome -->
                <div class="mb-5">
                    <x-input-label for="nome" :value="__('Nome do Curso')" />
                    <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="nome" maxlength="20"/>
                    <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                </div>

                <!-- Cor representante do curso -->
                <div class="mt-4 mb-20">
                    <x-input-label for="cor" :value="__('Cor')" />

                    <x-select-input id="cor" name="cor" class="mt-1 block w-full" required>
                        <option value="blue" selected>Azul</option>
                        <option value="purple">Roxo</option>
                        <option value="green">Verde</option>
                        <option value="yellow">Amarelo</option>
                        <option value="orange">Laranja</option>
                        <option value="red">Vermelho</option>
                    </x-select-input>

                    <x-input-error :messages="$errors->get('cor')" class="mt-2 mb-[-28px]" />
                </div>

                <x-primary-button class="ms-4">
                    {{ __('Criar') }}
                </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
