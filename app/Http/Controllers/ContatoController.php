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
    }

    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'nome' => 'required',
            'numero_celular' => 'required',
            // Adicione outras regras de validação conforme necessário
        ]);

        // Criação do Contato
        $contato = $this->contato->create([
            'nome' => $request->input('nome'),
            'numero_celular' => $request->input('numero_celular'),
            'email' => $request->input('email'),
            'nota' => $request->input('nota'),
        ]);

        // Criação do Endereco associado ao Contato
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

        // Verificação se tanto o Contato quanto o Endereco foram criados com sucesso
        if ($contato && $endereco) {
            return redirect()->route('contatos.index', ['contato' => $contato->id])
                ->with('success', 'Contato criado com sucesso!');
        } else {
            // Trate o caso em que algo deu errado
            return redirect()->route('contatos.index')
                ->with('error', 'Ocorreu um erro ao criar o Contato. Tente novamente.');
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
        // Atualização dos dados do contato
        $contato = $this->contato->find($id);
        $contato->update($request->except(['_token', '_method']));


        $contato->endereco->update([
            'cep' => $request->input('cep'),
            'rua' => $request->input('rua'),
            'numero' => $request->input('numero'),
            'complemento' => $request->input('complemento'),
            'bairro' => $request->input('bairro'),
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado'),
        ]);

        return redirect()->route('contatos.index')->with('success', 'Contato atualizado com sucesso!');
    }

    public function destroy($id)
    {
        // Encontrar o contato
        $contato = $this->contato->find($id);

        // Verificar se o contato tem um endereço associado e excluí-lo
        if ($contato->endereco) {
            $contato->endereco->delete();
        }

        $contato->delete();

        return redirect()->route('contatos.index');
    }
}
