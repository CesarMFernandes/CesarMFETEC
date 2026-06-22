<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Curso;
use App\Models\Atividade;
use App\Models\Cursosuser;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cursosusers = Cursosuser::where('user_id', $request->user()->id)->latest()->get();
        $cursos = Curso::with('user')->latest()->get();   
        return view('cursos', compact('cursos', 'cursosusers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.cursos.insert-cursos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Curso::class);
            $validated = $request->validate([
                'nome' => 'required|string|max:20',
                'cor' => 'required',
            ],
        );
        
        // Use the authenticated user
        auth()->user()->cursos()->create($validated);

        return redirect('/Cursos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        return view('forms.cursos.update-cursos', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        Gate::authorize('create', Curso::class);
            $validated = $request->validate([
                'nome' => 'required|string|max:20',
                'cor' => 'required',
            ],
        );

        $curso->update($validated);

        return redirect('/Cursos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        Gate::authorize('delete', $curso);
        $curso->delete();

        return redirect()->route('cursos')->with('Sucesso', 'Curso deletado com sucesso!');
    }
}
