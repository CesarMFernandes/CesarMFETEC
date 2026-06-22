@props(['curso'])

<!-- Por algum motivo eu tive que manualmente colocar a cor e atualizar a página pro efeito de borda funcionar -->
<div class="bg-gray-50 overflow-hidden overflow-x-auto shadow-2xl border-solid border-[2px] border-black sm:rounded-lg min-h-[600px] min-w-[400px] max-w-[400px] mr-5 hover:border-{{ $curso->cor }}-800 hover:-translate-y-1 transition duration-300 ease-in-out">
    <div class="h-[40%] bg-{{ $curso->cor }}-900 sm:rounded-lg">
        <img src="{{ asset('assets/images_curso/' . $curso->cor  . '.jpg') }}" class="h-full w-full opacity-50">
    </div>
    <div class="h-[60%] p-2 text-center">
        <p class="text-xl font-black">{{ $curso->nome }}</p> <!-- Mostra o nome do curso -->
        <p class="text-l mb-10">{{ $curso->user->name }}</p> <!-- Mostra o nome do professor do curso -->

        <!-- Entra na página de atividades do curso -->
        <a href="{{ route('atividades', $curso->id) }}">
            <x-primary-button class="mt-4 bg-{{ $curso->cor }}-800 hover:bg-{{ $curso->cor }}-700">
                {{ __('Acessar Curso') }}
            </x-primary-button>
        </a><br>

        @if (Auth::user()->cargo == "aluno")
            <!-- Desmatricular -->
            <form action="{{ route('matricula.destroy', $curso->id) }}" method="POST" onsubmit="return confirm('Tem certeza que quer deletar esse curso?');">
                @csrf
                @method('DELETE')
                        
                <x-primary-button class="bg-red-900 hover:bg-red-800 mt-2">
                    {{ __('Desmatricular') }}
                </x-primary-button>
            </form>
        @endif

        @if(Auth::user()->id == $curso->user_id)
            <!-- Atualizar curso -->
            <a href="{{ route('cursos.edit', $curso->id) }}">
                <x-primary-button class="mt-4 mb-2">
                    {{ __('Atualizar Curso') }}
                </x-primary-button>
            </a>

            <!-- Deletar curso -->
            <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" onsubmit="return confirm('Tem certeza que quer deletar esse curso?');">
                @csrf
                @method('DELETE')
                        
                <x-primary-button class="bg-red-900 hover:bg-red-800">
                    {{ __('Deletar Curso') }}
                </x-primary-button>
            </form>
        @endif
        
        <!-- Carrega as cores customizadas -->
        @if(1 == 0)
            <div class="
            bg-purple-800 bg-purple-900  
            bg-blue-800 bg-blue-900 
            bg-green-800 bg-green-900 
            bg-yellow-800 bg-yellow-900 
            bg-orange-800 bg-orange-900 
            bg-red-800 bg-red-900 
            
            hover:bg-purple-700 hover:border-purple-800
            hover:bg-blue-700 hover:border-blue-800
            hover:bg-green-700 hover:border-green-800
            hover:bg-yellow-700 hover:border-yellow-800
            hover:bg-orange-700 hover:border-orange-800
            hover:bg-red-700 hover:border-red-800
            "></div>
        @endif
    </div>
</div>