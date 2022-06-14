<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstadoRequest;
use App\Http\Requests\UpdateEstadoRequest;
use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado::orderBy('id')->get();
        return view('estados.index', ['estados' => $estados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreEstadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstadoRequest $request)
    {
        if (Estado::create($request->all())) {
            return redirect()->route('estados.index')->with('success', 'Estado cadastrado com sucesso!');
        } else {
            session()->flash('error-message', 'Erro ao cadastrar estado!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show(Estado $estado)
    {
        return view('estados.show', ['estado' => $estado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado $estado)
    {
        return view('estados.edit', ['estado' => $estado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateEstadoRequest  $request
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstadoRequest $request, Estado $estado)
    {
        $estado->fill($request->all());
        if ($estado->save()) {
            return redirect()->route('estados.index')->with('success', 'Estado atualizado!');
        } else {
            session()->flash('error-message', 'Falha ao atualizar estado!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
        if ($estado->delete()) {
            return redirect()->route('estados.index')->with('success', 'Estado excluído!');
        } else {
            session()->flash('error-message', 'Falha ao excluir estado!');
            return back()->withInput();
        }
    }
}