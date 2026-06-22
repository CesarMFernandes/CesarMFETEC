<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>

    <div class="py-12 w-auto overflow-x-auto">
        @if(Auth::user()->cargo == "professor")
            <a href="Cursos/Create">
                <x-primary-button class="m-2 bg-gray-900">Criar Curso</x-primary-button>
            </a>
        @endif
        <div class="mx-auto sm:px-6 lg:px-8 flex w-auto">  
            @if(Auth::user()->cargo == 'aluno')
                @forelse($cursosusers as $cursosuser)
                    @foreach($cursos as $curso)
                        @if(Auth::user()->id == $cursosuser->user_id && $curso->id == $cursosuser->curso_id)
                            <x-curso-card :curso="$curso"></x-curso-card>
                        @endif
                    @endforeach
                @empty
                    <div class="p-6 bg-white text-center shadow-2xl border-solid border-[1px] border-black text-gray-900 rounded-lg">
                        Você ainda não está matriculado a um curso. Matricule-se na aba de conta
                    </div>
                @endforelse
            @endif
            
            @if (Auth::user()->cargo == 'professor')
                @foreach($cursos as $curso)
                    @if (Auth::user()->id == $curso->user_id)
                        <x-curso-card :curso="$curso"></x-curso-card>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
