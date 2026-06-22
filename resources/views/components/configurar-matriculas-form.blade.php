<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Matrículas') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Faça matrículas de cursos.") }}
        </p>
    </header>

    <form method="post" action="{{ route('matricula.create') }}" class="mt-6 space-y-6">
        @csrf

       <div class="mt-4 mb-20">
            <x-input-label for="curso" :value="__('Curso')" />

            <x-select-input id="curso" name="curso" class="mt-1 block w-full" required>
                <option value="" disabled selected>Selecione um curso</option>
                @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nome }} - {{ $curso->user->name }}</option>
                @endforeach
            </x-select-input>

            <x-input-error :messages="$errors->get('curso')" class="mt-2 mb-[-28px]" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
        </div>
    </form>
</section>
