<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::with('user')->orderBy('hora_evento', 'asc')->get();
        return view('dashboard', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.eventos.insert-eventos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Evento::class);
        $validated = $request->validate([
        'titulo' => 'required|string|max:30',
        'texto' => 'required|string|max:255',
        'caminho_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'hora_evento' => 'required|date|after:now',
        ],
        ['hora_evento.after' => 'O campo data e hora deve ser uma data posterior a agora.'],
        );

        if ($request->hasFile('caminho_img')) {
            $nomeImagem = time() . '.' . $request->file('caminho_img')->getClientOriginalExtension();
            $request->file('caminho_img')->move(public_path('assets/images_evento'), $nomeImagem);
            $validated['caminho_img'] = $nomeImagem; 
        }
        
        // Use the authenticated user
        auth()->user()->eventos()->create($validated);

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        return view('forms.eventos.update-eventos', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        Gate::authorize('update', $evento);
        $validated = $request->validate([
            'titulo' => 'required|string|max:30',
            'texto' => 'required|string|max:255',
            'caminho_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hora_evento' => 'required|date|after:now',
            ],
            ['hora_evento.after' => 'O campo data e hora deve ser uma data posterior a agora.'],
        );

        if ($request->hasFile('caminho_img')) {
            $nomeImagem = time() . '.' . $request->file('caminho_img')->getClientOriginalExtension();
            $request->file('caminho_img')->move(public_path('assets/images_evento'), $nomeImagem);
            $validated['caminho_img'] = $nomeImagem; 
        }

        $evento->update($validated);

        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        Gate::authorize('delete', $evento);
        $evento->delete();

        return redirect()->route('dashboard')->with('Sucesso', 'Evento deletado com sucesso!');
    }
}
