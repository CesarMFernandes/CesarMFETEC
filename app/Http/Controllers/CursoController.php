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
        //Para alunos, pega cursos em que eles estão matriculados
        if($request->user()->cargo == "aluno"){
            $cursosusers = Cursosuser::where('user_id', $request->user()->id)->latest()->get();
            $x = 0;
            $cursoid = [];
            foreach($cursosusers as $cursosuser){
                $cursoid[$x] = $cursosuser->curso_id;
                $x = $x + 1;
            }        
            $cursos = Curso::wherein('id', $cursoid)->latest()->get();   
        }
        //Para professores e coordenadores, pegam cursos que eles ensinam
        else{
            $cursosusers = 0;
            $cursos = Curso::where('user_id', $request->user()->id)->latest()->get();
            $x = 0;
            $cursoid = [];
            foreach($cursos as $curso){
                $cursoid[$x] = $curso->id;
                $x = $x + 1;
            }   
        }

        //Pega as atividades dos cursos selecionados, para mostrar quantas atividades têm para entrega em cada curso
        $atividades = Atividade::wherein('curso_id', $cursoid)->where('hora_entrega', '>' , now())->latest()->get();

        //Retorna os dados para a view
        return view('cursos', compact('cursos', 'cursosusers', 'atividades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Carrega o formulário de insert
        return view('forms.cursos.insert-cursos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Autorização (eu tentei fazer pelas routes, mas começou a dar erro mesmo com a mesma lógica do CRUD dos eventos, que não dava erro, então eu só desisti e coloquei aqui)
        Gate::authorize('create', Curso::class);
            //Validação
            $validated = $request->validate([
                'nome' => 'required|string|max:20',
                'cor' => 'required',
            ],
        );
        
        // Usa o usuário autenticado
        auth()->user()->cursos()->create($validated);

        //Retorna à view
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
        //Carrega o formulário de update
        return view('forms.cursos.update-cursos', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        //Autorização
        Gate::authorize('create', Curso::class);
        //Validação
            $validated = $request->validate([
                'nome' => 'required|string|max:20',
                'cor' => 'required',
            ],
        );

        //Atualiza dados
        $curso->update($validated);

        return redirect('/Cursos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        //Autorização
        Gate::authorize('delete', $curso);

        //Deleta instancia
        $curso->delete();

        return redirect()->route('cursos')->with('Sucesso', 'Curso deletado com sucesso!');
    }
}
