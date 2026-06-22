@props(['atividade', 'curso'])

<div class="bg-white overflow-hidden overflow-x-auto shadow-2xl border-solid border-2 border-black sm:rounded-lg mb-2 min-h-[150px] md:flex hover:border-yellow-500 hover:-translate-y-1 transition duration-300 ease-in-out">
    <p class="text-[15pt] text-justify w-4/5 m-auto pl-2">{{ $atividade->texto }}</p>
    <div class="min-w-[9%] m-auto p-2">
        <p class="mr-1">Entrega {{ $atividade->hora_entrega->diffForHumans() }}</p>
        <p class="mr-1">Criado {{ $atividade->created_at->diffForHumans() }}</p>
        @if($atividade->created_at != $atividade->updated_at)
            <p class="mr-1">Última atualização {{ $atividade->updated_at->diffForHumans() }}</p>
        @endif
    </div>
    <div class="min-w-[9%] m-auto">
        @if (Auth::user()->id == $curso->user_id)
                <a href="{{ route('atividades.edit', [$curso->id ,$atividade->id]) }}">
                <x-primary-button class="w-[190px] m-2">
                    {{ __('Atualizar Atividade') }}
                </x-primary-button>
            </a>
            <form action="{{ route('atividades.destroy', [$curso->id, $atividade->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que quer deletar essa atividade?');">
                @csrf
                @method('DELETE')
                        
                <x-primary-button class="bg-red-900 hover:bg-red-800 w-[190px] m-2">
                    {{ __('Deletar Atividade') }}
                </x-primary-button>
            </form>
        @endif
    </div>   
</div>