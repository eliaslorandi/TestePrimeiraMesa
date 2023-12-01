<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Endereco;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

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
        $request->validate([
            'nome' => 'required',
            'numero_celular' => 'required',
        ]);

        // Inicializa variáveis do endereço
        $enderecoViaCEP = null;

        // Verifica se o CEP foi fornecido e é válido
        if ($request->filled('cep') && is_numeric($request->cep)) {
            // Chama a API ViaCEP para obter informações do endereço
            $enderecoViaCEP = $this->getEnderecoViaCEP($request->input('cep'));

            // Se a API ViaCEP retornar erro ou não encontrar o CEP, define $enderecoViaCEP como null
            if (isset($enderecoViaCEP['erro']) || empty($enderecoViaCEP['cep'])) {
                $enderecoViaCEP = null;
            }
        }

        // Criação do Contato
        $contato = $this->contato->create([
            'nome' => $request->input('nome'),
            'numero_celular' => $request->input('numero_celular'),
            'email' => $request->input('email'),
            'nota' => $request->input('nota'),
        ]);

        // Criação do Endereco associado ao Contato com os dados do ViaCEP
        if ($enderecoViaCEP) {
            Endereco::create([
                'contato_id' => $contato->id,
                'cep' => $enderecoViaCEP['cep'],
                'rua' => $enderecoViaCEP['logradouro'] ?? '',
                'numero' => $request->input('numero') ?? '',
                'complemento' => $request->input('complemento') ?? '',
                'bairro' => $enderecoViaCEP['bairro'] ?? '',
                'cidade' => $enderecoViaCEP['localidade'] ?? '',
                'estado' => $enderecoViaCEP['uf'] ?? '',
            ]);
        } else {
            // Se não houver informações do ViaCEP, salva os campos do endereço como string vazia
            Endereco::create([
                'contato_id' => $contato->id,
                'cep' => $request->input('cep') ?? '',
                'rua' => $request->input('rua') ?? '',
                'numero' => $request->input('numero') ?? '',
                'complemento' => $request->input('complemento') ?? '',
                'bairro' => $request->input('bairro') ?? '',
                'cidade' => $request->input('cidade') ?? '',
                'estado' => $request->input('estado') ?? '',
            ]);
        }

        return redirect()->route('contatos.index', ['contato' => $contato->id]);
    }

    public function show(Contato $contato)
    {
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

    private function getEnderecoViaCEP($cep)
    {
        $client = new Client();
        $response = $client->get("https://viacep.com.br/ws/{$cep}/json/");
        $endereco = json_decode($response->getBody(), true);

        return $endereco;
    }

    public function searchByName(Request $request)
    {
        // Transforma o nome da busca para minúsculas
        $nome = strtolower($request->input('nome'));

        // Realiza a busca no banco de dados também com o nome em minúsculas
        $contatos = $this->contato->whereRaw('LOWER(nome) LIKE ?', ["%{$nome}%"])->get();

        // Retorna a view com os resultados da busca
        return view('contatos', ['contatos' => $contatos]);
    }
}
