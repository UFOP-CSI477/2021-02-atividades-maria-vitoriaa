<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Http\Requests\StoreCidadeRequest;
use App\Http\Requests\UpdateCidadeRequest;
use App\Models\Estado;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = Cidade::orderBy('id')->get();
        return view('cidades.index', ['cidades' => $cidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::orderBy('name')->get();
        return view('cidades.create', ['estados' => $estados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCidadeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCidadeRequest $request)
    {
        if (Cidade::create($request->all())) {
            return redirect()->route('cidades.index')->with('success', 'Cidade cadastrada!');
        } else {
            session()->flash('error-message', 'Falha ao cadastrar cidade!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function show(Cidade $cidade)
    {
        return view('cidades.show', ['cidade' => $cidade]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Cidade $cidade)
    {
        $estados = Estado::orderBy('name')->get();
        return view('cidades.edit', ['estados' => $estados, 'cidade' => $cidade]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCidadeRequest  $request
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCidadeRequest $request, Cidade $cidade)
    {
        $cidade->fill($request->all());
        if ($cidade->save()) {
            return redirect()->route('cidades.index')->with('success', 'Cidade atualizada!');
        } else {
            session()->flash('error-message', 'Falha ao atualizar cidade!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cidade $cidade)
    {
        if ($cidade->delete()) {
            return redirect()->route('cidades.index')->with('success', 'Cidade excluída!');
        } else {
            session()->flash('error-message', 'Falha ao excluir cidade!');
            return back()->withInput();
        }
    }
}