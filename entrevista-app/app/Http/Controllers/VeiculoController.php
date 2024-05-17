<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;

class VeiculoController extends Controller
{

    public function index()
    {
        $veiculos = Veiculo::all();
        return view("/veiculos.ver", compact("veiculos"));
    }

    public function store(Request $request)
    {

        $request->validate([
            'modelo' => 'required',
            'ano' => 'required|integer',
            'data_aquisicao' => 'required|date',
            'kms_rodados' => 'required|integer',
            'renavam' => 'required|integer|unique:veiculos',
        ]);

        $veiculo = Veiculo::create($request->all());
        return redirect('/veiculos')->with('success', 'Veículo criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $veiculo = null;

        if ($id !== null) {
            $veiculo = Veiculo::findOrFail($id);
        }

        return view('veiculos.editar', compact('veiculo'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'modelo' => 'required',
            'ano' => 'required|integer',
            'data_aquisicao' => 'required|date',
            'kms_rodados' => 'required|integer',
            'renavam' => 'required|integer|unique:veiculos,renavam,' . $id,
        ]);

        
        $veiculo = Veiculo::findOrFail($id);

        
        $veiculo->modelo = $request->input('modelo');
        $veiculo->ano = $request->input('ano');
        $veiculo->data_aquisicao = $request->input('data_aquisicao');
        $veiculo->kms_rodados = $request->input('kms_rodados');
        $veiculo->renavam = $request->input('renavam');
        
        
        $veiculo->save();

        return redirect('/veiculos')->with('success', 'Veiculo editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $veiculo = Veiculo::findOrFail($id);
            $veiculo->delete();
            return redirect('/veiculos')->with('success', 'Veículo deletado com sucesso');
        } catch (\Exception $e) {

        }
    }

}
