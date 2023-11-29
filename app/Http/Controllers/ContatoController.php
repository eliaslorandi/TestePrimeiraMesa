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

    public function create()
    {
        return view('contato_create');
        // $contato = Contato::create($request->all());
        // return redirect()->route('contatos.index')->with(['message' => 'Contato criado com sucesso!', 'alert' => 'success']);
    }

    public function store(Request $request) //traz todos os dados do formulário
{
    $created = $this->contato->create([
        'nome' => $request->input('nome'),
        'numero_celular' => $request->input('numero_celular'),
        'email' => $request->input('email'),
        'nota' => $request->input('nota'),
        'CEP' => $request->input('cep'),
        'Rua' => $request->input('rua'),
        'Número' => $request->input('numero'),
        'Complemento' => $request->input('complemento'),
        'Bairro' => $request->input('bairro'),
        'Cidade' => $request->input('cidade'),
        'Estado' => $request->input('estado'),
    ]);

    // verifica se o contato foi criado com sucesso antes de usá-lo
    if ($created) {
        return redirect()->route('contatos.index', ['contato' => $created->id])->with(['message' => 'success', 'alert' => 'success', 'Contato criado com sucesso!']);
    } else {
        return redirect()->route('contatos.index')->with(['message' => 'error', 'alert' => 'danger', 'Erro ao criar contato!']);
    }
}

    public function show(Contato $contato)
    {
        return view('contato_show', ['contato' => $contato]);
    }

    public function edit(Contato $contato)
    {
        return view('contato_edit', ['contato' => $contato]);
        return redirect()->route('contatos.index');
    }

    public function update(Request $request, $id)
    {
        //atualização dos dados do contato
        $updated = $this->contato->where('id', $id)->update($request->except(['_token', '_method']));
        if ($updated) {
            return redirect()->route('contatos.index')->with(['message', 'success', 'Contato atualizado com sucesso!', 'alert' => 'success']);
        }
        return redirect()->back()->with(['message', 'error', 'Erro ao atualizar contato!', 'alert' => 'danger']);
    }

    public function destroy($id)
    {
        $this->contato->where('id', $id)->delete();
        return redirect()->route('contatos.index')->with(['message', 'success', 'Contato excluído com sucesso!', 'alert' => 'success']);
    }
}
