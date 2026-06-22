<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Atividades - {{ $curso->nome }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(Auth::user()->id == $curso->user_id)
            <a href="{{ route('atividades.formcreate', $curso->id) }}">
                <x-primary-button class="m-2 bg-gray-900">Postar Atividade</x-primary-button>
            </a>
        @endif
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">  
                @forelse($atividades as $atividade)
                    <x-atividade-card :atividade="$atividade" :curso="$curso"></x-atividade-card>
                @empty
                <div class="p-6 bg-white text-center shadow-2xl border-solid border-[1px] border-black text-gray-900 rounded-lg">
                    Ainda não há atividades postadas
                </div>
                @endforelse
            
        </div>
    </div>
</x-app-layout>
