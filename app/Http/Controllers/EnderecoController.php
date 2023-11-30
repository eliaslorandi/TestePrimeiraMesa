<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public readonly Endereco $endereco;

    public function __construct()
    {
        $this->endereco = new Endereco();
    }

    public function create()
    {
        return view('contato_create');
        // $contato = Contato::create($request->all());
        // return redirect()->route('contatos.index')->with(['message' => 'Contato criado com sucesso!', 'alert' => 'success']);
    }

    public function store(Endereco $endereco) //traz todos os dados do formulário
    {
        $contato = $this->endereco->create([
            'CEP' => $endereco->input('cep'),
            'Rua' => $endereco->input('rua'),
            'Número' => $endereco->input('numero'),
            'Complemento' => $endereco->input('complemento'),
            'Bairro' => $endereco->input('bairro'),
            'Cidade' => $endereco->input('cidade'),
            'Estado' => $endereco->input('estado'),
        ]);
        $endereco->save();

        // verifica se o contato foi criado com sucesso antes de usá-lo
    }

    public function show()
    {
       
    }

    public function edit(Endereco $endereco)
    {
        return view('endereco_edit', ['endereco' => $endereco]);
        return redirect()->route('contatos.index');
    }

    public function update(Request $request, $id)
    {
        //atualização dos dados do contato
        $contato = $this->contato->where('id', $id)->update($request->except(['_token', '_method']));
        if ($contato) {
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
