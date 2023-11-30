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
        $contato = $this->contato->create([
            'nome' => $request->input('nome'),
            'numero_celular' => $request->input('numero_celular'),
            'email' => $request->input('email'),
            'nota' => $request->input('nota'),
        ]);
        $contato->save();
        $endereco = Endereco::create([
            'contato_id' => $contato->id,
            'cep' => $request->input('cep'),
            'rua' => $request->input('rua'),
            'numero' => $request->input('numero'),
            'complemento' => $request->input('complemento'),
            'bairro' => $request->input('bairro'),
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado'),
        ]);

        $endereco->save();

        // verifica se o contato foi criado com sucesso antes de usá-lo
        if ($contato) {
            return redirect()->route('contatos.index', ['contato' => $contato->id]);
        } else {
            return redirect()->route('contatos.index');
        }
    }

    public function show(Contato $contato)
{
    // Carrega o endereço associado ao contato
    $endereco = Endereco::where('contato_id', $contato->id)->first();
    return view('contato_show', ['contato' => $contato, 'endereco' => $endereco]);
}


    public function edit(Contato $contato)
    {
        return view('contato_edit', ['contato' => $contato]);
        return redirect()->route('contatos.index');
    }

    public function update(Request $request, $id)
    {
        //atualização dos dados do contato
        $contato = $this->contato->where('id', $id)->update($request->except(['_token', '_method']));
        $contato->endereco->update($request->only(['cep', 'rua', 'numero', 'complemento', 'bairro', 'cidade', 'estado']));

        return redirect()->route('contatos.index')->with('success', 'Contato atualizado com sucesso!');
        if ($contato) {
            return redirect()->route('contatos.index');
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->contato->where('id', $id)->delete();
        return redirect()->route('contatos.index');
    }
}
