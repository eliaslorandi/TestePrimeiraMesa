<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Endereco;
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

    public function create(Request $request)
    {
        $contato = Contato::create($request->all());
        return redirect()->route('contatos.index')->with(['message' => 'Contato criado com sucesso!', 'alert' => 'success']);
    }

    public function store()
    {
    }

    public function show()
    {
    }

    public function edit(Contato $contato)
    {
        return view('contato_edit', ['contato' => $contato]);
    }

    public function update(Request $request, $id)
    {
        //atualização dos dados do contato
        $updated = $this->contato->where('id', $id)->update($request->except(['_token', '_method']));
        if ($updated) {
            return redirect()->back()->with(['message', 'success', 'Contato atualizado com sucesso!', 'alert' => 'success']);
        }
        return redirect()->back()->with(['message', 'error', 'Erro ao atualizar contato!', 'alert' => 'danger']);

    }

    public function destroy(Contato $contato)
    {
        $contato->delete();
        return redirect()->route('contatos')->with('message', 'success', 'Contato removido com sucesso!');
    }
}
