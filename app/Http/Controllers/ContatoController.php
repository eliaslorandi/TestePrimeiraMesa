<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public readonly Contato $contato;

    public function __construct()
    {
        $this->contato = new Contato();
    }

    public function index()
    {
        $contatos = $this->contato->all();
        return view('contatos', ['contatos' => $contatos]);
    }

    public function create()
    {
        return view('contatos.create');
    }

    public function store(Request $request)
    {
        $contato = Contato::create($request->all());
        return redirect()->route('contatos.index')->with('success', 'Contato criado com sucesso!');
    }

    public function show(Contato $contato)
    {
        return view('contatos.show', compact('contato'));
    }

    public function edit(Contato $contato)
    {
        return view('contatos.edit', compact('contato'));
    }

    public function update(Request $request, Contato $contato)
    {
        $contato->update($request->all());
        return redirect()->route('contatos.index')->with('success', 'Contato atualizado com sucesso!');
    }

    public function destroy(Contato $contato)
    {
        $contato->delete();
        return redirect()->route('contatos.index')->with('success', 'Contato removido com sucesso!');
    }
}
