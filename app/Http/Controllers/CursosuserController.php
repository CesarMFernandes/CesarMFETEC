<?php

namespace App\Http\Controllers;

use App\Models\Cursosuser;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

class CursosuserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Cursosuser::where('user_id', $request->user()->id)->where('curso_id', $request->curso)->count() != 0){
            Gate::authorize('create', Cursosuser::class);
        }

        $validated = [
            'user_id' => $request->user()->id, 
            'curso_id' => $request->curso
        ];

        $cursosuser = Cursosuser::create($validated);
        return redirect(route('profile.edit'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Cursosuser $cursosuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cursosuser $cursosuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cursosuser $cursosuser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Curso $curso)
    {
        $user = $request->user()->id;
        
        Cursosuser::where('user_id', $user)->where('curso_id', $curso->id)->delete();

        return redirect()->route('cursos')->with('Sucesso', 'Curso deletado com sucesso!');
    }
}
