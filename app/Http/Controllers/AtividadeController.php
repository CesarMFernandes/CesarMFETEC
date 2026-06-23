<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Curso $curso)
    {
        //Pega todas as atividades desse curso
        $atividades = Atividade::where('curso_id', $curso->id)->orderBy('hora_entrega', 'asc')->get();
        return view('atividades', compact('curso'), compact('atividades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Curso $curso)
    {
        //Carrega form de insert
        return view('forms.atividades.insert-atividades', compact('curso'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Curso $curso)
    {
        Gate::authorize('create', $curso);
        $validated = $request->validate([
        'texto' => 'required|string|max:50',
        'hora_entrega' => 'required|date|after:now',
        ],
        ['hora_entrega.after' => 'O campo data e hora deve ser uma data posterior a agora.'],
        );

        //Pega o id do curso que deve inserir
        $validated['curso_id'] = $curso->id;
        
        //Usa o usuário autenticado
        $atividade = Atividade::create($validated);

        return redirect(route('atividades', $curso));
    }

    /**
     * Display the specified resource.
     */
    public function show(Atividade $atividade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso, Atividade $atividade)
    {
        //Carrega form de update
        return view('forms.atividades.update-atividades', compact('curso', 'atividade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso, Atividade $atividade)
    {
        Gate::authorize('create', $curso, $atividade);
        $validated = $request->validate([
        'texto' => 'required|string|max:50',
        'hora_entrega' => 'required|date|after:now',
        ],
        ['hora_entrega.after' => 'O campo data e hora deve ser uma data posterior a agora.'],
        );

        $atividade->update($validated);
        return redirect(route('atividades', $curso));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso, Atividade $atividade)
    {
        Gate::authorize('delete', $curso, $atividade);
        $atividade->delete();
        return redirect()->route('atividades', $curso)->with('Sucesso', 'Atividade deletada com sucesso!');
    }
}
