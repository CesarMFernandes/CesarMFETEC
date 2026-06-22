
<x-app-layout>
    
    <div class="flex w-full h-[800px]">
        <div class="bg-white border-[1px] border-solid border-gray-950 sm:rounded-lg m-auto h-[400px] w-[900px] p-6">
            <h1 class="text-center font-bold text-4xl mb-10">POSTAR ATIVIDADE</h1>
            <form method="POST" action="{{ route('atividades.create', $curso->id) }}">
                @csrf

                <!-- Texto -->
                <div class="mb-5">
                    <x-input-label for="texto" :value="__('Texto')" />
                    <x-text-input id="texto" class="block mt-1 w-full" type="text" name="texto" :value="old('texto')" required autofocus autocomplete="texto" maxlength="50"/>
                    <x-input-error :messages="$errors->get('texto')" class="mt-2" />
                </div>

                <!-- Data de entrega -->
                <div class="mb-5">
                    <x-input-label for="hora_entrega" :value="__('Horário da Entrega')" />
                    <x-text-input id="hora_entrega" name="hora_entrega" type="datetime-local" class="mt-1 block w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('hora_entrega')" />
                </div>

                <x-primary-button class="ms-4">
                    {{ __('Postar') }}
                </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
