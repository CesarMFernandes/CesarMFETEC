<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Eventos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!--Botão de postar evento. Aparece apenas para coordenadores-->
        @if(Auth::user()->cargo == "coordenador")
            <a href="Eventos/Create">
                <x-primary-button class="m-2 bg-gray-900">Postar Evento</x-primary-button>
            </a>
        @endif

        <!--Mostra os eventos postados-->
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 ">
            @forelse ($eventos as $evento)
                <x-evento-card :evento="$evento"></x-evento-card>
            @empty
                <!--Aparece caso não tenha eventos-->
                <div class="p-6 bg-white text-center shadow-2xl border-solid border-[1px] border-black text-gray-900 rounded-lg">
                    Ainda não há eventos postados
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
