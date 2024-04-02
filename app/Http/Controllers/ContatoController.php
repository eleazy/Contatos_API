<?php
// app/Http/Controllers/ContatoController.php
namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Empresa;
use Illuminate\Http\Request;


class ContatoController 
{
    //query and display methods
    public function index(Request $request)
    {
        $query = Contato::query();

        if ($request->filled('empresa')) {
            $query->whereHas('empresa', function ($q) use ($request) {
                $q->where('nome', $request->empresa);
            });
        }

        if ($request->filled('nome_sobrenome')) {
            $query->where(function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->nome_sobrenome . '%')
                ->orWhere('sobrenome', 'like', '%' . $request->nome_sobrenome . '%');
            });
        }

        if ($request->filled('telefone')) {
            $query->where('telefone', $request->telefone);
        }

        if ($request->filled('celular')) {
            $query->where('celular', $request->celular);
        }

        if ($request->filled('email')) {
            $query->where('email', $request->email);
        }

        $contacts = $query->get();

        // $contacts = Contato::all();
        return view('contatos', ['contacts' => $contacts, 'empresas' => Empresa::all()]);
    }    

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
            'data_nascimento' => 'required|date',
            'telefone' => 'required|string',
            'celular' => 'required|string',
            'email' => 'required|email',      
            'empresa' => 'required|integer'      
        ]);

        $contact = new Contato();
        $contact->nome = $request->nome;
        $contact->sobrenome = $request->sobrenome;
        $contact->data_nascimento = $request->data_nascimento;
        $contact->telefone = $request->telefone;
        $contact->celular = $request->celular;
        $contact->email = $request->email;
        $contact->empresa_id = $request->empresa;

        $contact->save();

        return redirect('/contatos')->with('success', 'Contato adicionado com sucesso.');
    }


    //edit and update methods
    public function edit($id)
    {
        $contact = Contato::findOrFail($id);
        return view('edit_contato', compact('contact'));
    }
    public function update(Request $request, $id)
    {
        $contact = Contato::findOrFail($id);        
        $contact->nome = $request->input('nome');
        $contact->sobrenome = $request->input('sobrenome');
        $contact->data_nascimento = $request->input('data_nascimento');
        $contact->telefone = $request->input('telefone');
        $contact->celular = $request->input('celular');
        $contact->email = $request->input('email');
        /* $contact->empresa = $request->input('empresa'); */
        
        $contact->save();

        return redirect('/contatos')->with('success', 'Contato atualizado com sucesso.');
    }

    //delete method
    public function delete($id)
    {
        $contact = Contato::findOrFail($id);
        $contact->delete();
        return redirect('/contatos')->with('success', 'Contato excluído com sucesso.');
    }
}
