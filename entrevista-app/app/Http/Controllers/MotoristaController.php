<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Motorista;

class MotoristaController extends Controller
{
    public function index()
    {
        $motoristas = Motorista::all();
        return view("motoristas.ver", compact("motoristas"));
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'data_nascimento' => 'required|date|maioridade',
            'cnh' => 'required|unique:motoristas',
        ]);

        $motorista = Motorista::create($request->all());
        return redirect('/motoristas')->with('success', 'Motorista cadastrado com sucesso');
    }

    public function show(string $id)
    {
        $motorista = null;

        if ($id !== null) {
            $motorista = Motorista::findOrFail($id);
        }

        return view('motoristas.editar', compact('motorista'));
    }

    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'nome' => 'required',
            'data_nascimento' => 'required|date|maioridade',
            'cnh' => 'required|unique:motoristas,cnh,' . $id,
        ]);

        
        $motorista = Motorista::findOrFail($id);

        
        $motorista->nome = $request->input('nome');
        $motorista->data_nascimento = $request->input('data_nascimento');
        $motorista->cnh = $request->input('cnh');
        
        
        $motorista->save();

        return redirect('/motoristas')->with('success', 'Motorista alterado com sucesso');
    }

        public function destroy(string $id)
    {
        try {
            $motorista = Motorista::findOrFail($id);
            $motorista->delete();
            return redirect('/motoristas')->with('success', 'Motorista deletado com sucesso');
        } catch (\Exception $e) {

        }
    }
}
