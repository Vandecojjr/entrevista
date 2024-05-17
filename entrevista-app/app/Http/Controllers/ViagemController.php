<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viagens;
use App\Models\Veiculo;
use App\Models\Motorista;

class ViagemController extends Controller
{

    public function index(bool $cadastrar = false)
    {
        if (!$cadastrar) {
            $viagens = Viagens::all();
            return view("viagens.ver", compact("viagens"));
        } else {
            $viagens = Viagens::all();
            $veiculos = Veiculo::all();
            $motoristas = Motorista::all();
            return view("viagens.cadastrar", compact("viagens", "veiculos", "motoristas"));
        }

    }

    public function store(Request $request)
    {
        $request->validate([
            'id_veiculo' => 'required',
            'km_i_viagem' => 'required|integer',
            'km_f_viagem' => '',
            'id_motorista' => 'required',
            'id_motorista_2' => '',
        ]);

        $viagen = Viagens::create($request->all());
        return redirect('/viagens')->with('success', 'Viagem criado com sucesso');
    }

    public function show(string $id)
    {
        $viagem = null;
        if ($id !== null) {
            $viagem = Viagens::findOrFail($id);
            $veiculos = Veiculo::all();
            $motoristas = Motorista::all();
        }

            return view('viagens.editar', compact('viagem',"veiculos", "motoristas"));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_veiculo' => 'required',
            'km_i_viagem' => 'required|integer',
            'km_f_viagem' => '',
            'id_motorista' => 'required',
            'id_motorista_2' => '',
        ]);

        
        $viagem = Viagens::findOrFail($id);

        
        $viagem->id_veiculo = $request->input('id_veiculo');
        $viagem->km_i_viagem = $request->input('km_i_viagem');
        $viagem->km_f_viagem = $request->input('km_f_viagem');
        $viagem->id_motorista = $request->input('id_motorista');
        $viagem->id_motorista_2 = $request->input('id_motorista_2');
        
        $viagem->save();

        return redirect('/viagens')->with('success', 'Viagem editada com sucesso');
    }

    public function destroy(string $id)
    {
        try {
            $viagem = Viagens::findOrFail($id);
            $viagem->delete();
            return redirect('/viagens')->with('success', 'Viagem deletada com sucesso');
        } catch (\Exception $e) {

        }
    }
}
