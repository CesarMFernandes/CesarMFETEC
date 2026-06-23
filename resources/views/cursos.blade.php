<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>

    <div class="py-12 w-auto overflow-x-auto">
        <!--Botão de criar cursos. Aparece apenas para professores e coordenadores-->
        @if(Auth::user()->cargo != "aluno")
            <a href="Cursos/Create">
                <x-primary-button class="m-2 bg-gray-900">Criar Curso</x-primary-button>
            </a>
        @endif
        <!--Mostra os cursos-->
        <div class="mx-auto sm:px-6 lg:px-8 flex w-auto">  
                @forelse($cursos as $curso)
                    <x-curso-card :curso="$curso" :atividades="$atividades"></x-curso-card>
                @empty
                    <!--Aparece caso não tenha cursos-->
                    <div class="p-6 bg-white text-center shadow-2xl border-solid border-[1px] border-black text-gray-900 rounded-lg">
                        @if(Auth::user()->cargo == "aluno")
                            Você ainda não está matriculado a um curso. Matricule-se na aba de conta
                        @else
                            Você ainda não criou um curso. Crie um agora!
                        @endif
                    </div>
                @endforelse
        </div>
    </div>
</x-app-layout>
