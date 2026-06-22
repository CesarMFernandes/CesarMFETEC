@props(['evento'])

<div class="bg-white overflow-hidden overflow-x-auto shadow-2xl border-solid border-2 border-black sm:rounded-lg mb-2 h-auto flex hover:border-yellow-500 hover:-translate-y-1 transition duration-300 ease-in-out">
    <div class="w-1/2 p-[30px]">
        @if($evento->caminho_img)
            <img src="{{ asset('assets/images_evento/'.$evento->caminho_img) }}" class="sm:rounded-lg max-h-[540px] w-full">
        @else
            <img src="{{ asset('assets/images/imagem-default-evento.jpg') }}" class="sm:rounded-lg max-h-[540px] w-full">
        @endif
    </div>
    <div class="p-6 text-gray-900 w-1/2">
        <h1 class="text-4xl font-black text-center">{{ $evento->titulo }}</h1>
        <hr class="mb-20">
        <p class="text-[20pt] text-justify mb-3">{{ $evento->texto }}</p>
        <div class="text-right">
            <p class="mr-1">-{{ $evento->user->name }}</p>
            <p class="mr-1">Acontecerá {{ $evento->hora_evento->diffForHumans() }}</p>
            <p class="mr-1">Criado {{ $evento->created_at->diffForHumans() }}</p>
            @if($evento->created_at != $evento->updated_at)
                <p class="mr-1 text-right">Última atualização {{ $evento->updated_at->diffForHumans() }}</p>
            @endif
            @if (Auth::user()->id == $evento->user_id)
                <a href="{{ route('eventos.edit', $evento->id) }}">
                    <x-primary-button class="ms-4 mt-4 mb-2 w-[175px]">
                        {{ __('Atualizar Evento') }}
                    </x-primary-button>
                </a>
                <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" onsubmit="return confirm('Tem certeza que quer deletar esse evento?');">
                    @csrf
                    @method('DELETE')
                    
                    <x-primary-button class="ms-4 bg-red-900 hover:bg-red-800 w-[175px]">
                        {{ __('Deletar Evento') }}
                    </x-primary-button>
                </form>
            @endif
        </div>
    </div>
</div>