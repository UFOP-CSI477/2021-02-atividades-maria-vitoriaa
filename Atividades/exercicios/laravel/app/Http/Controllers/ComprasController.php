<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComprasRequest;
use App\Http\Requests\UpdateComprasRequest;
use App\Models\Pessoa;
use App\Models\Compras;
use App\Models\Produto;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compras::all();
        return view('compras.index', ['compras' => $compras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pessoa = Pessoa::orderBy('name')->get();
        $produtos = Produto::orderBy('name')->get();
        return view('compras.create', ['pessoa' => $pessoa, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreComprasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComprasRequest $request)
    {
        if (Compras::create($request->all())) {
            return redirect()->route('compras.index')->with('success', 'Compra cadastrada com sucesso!');
        } else {
            session()->flash('error-message', 'Falha ao cadastrar compra!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function show(Compras $compra)
    {
        return view('compras.show', ['compra' => $compra]);
    }

    public function pessoaShow()
    {
        $pessoa = Compras::orderBy('person_id')->get();
        return view('compras.pessoa', ['pessoa' => $pessoa]);
    }

    public function produtosShow()
    {
        $produtos = Compras::orderBy('product_id')->get();
        return view('compras.produtos', ['produtos' => $produtos]);
    }

    public function dateShow()
    {
        $compras = Compras::orderBy('created_at')->get();
        return view('compras.date', ['compras' => $compras]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function edit(Compras $compra)
    {
        $pessoa = Pessoa::orderBy('name')->get();
        $produtos = Produto::orderBy('name')->get();
        return view('compras.edit', ['compra' => $compra, 'pessoa' => $pessoa, 'produtos' => $produtos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComprasRequest  $request
     * @param  \App\Models\Compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComprasRequest $request, Compras $purchase)
    {
        $purchase->fill($request->all());
        if ($purchase->save()) {
            return redirect()->route('compras.index')->with('success', 'Compra atualizada!');
        } else {
            session()->flash('error-message', 'Falha ao atualizar compra!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compras $purchase)
    {
        if ($purchase->delete()) {
            return redirect()->route('compras.index')->with('success', 'Compra excluída!');
        } else {
            session()->flash('error-message', 'Falha ao excluir compra!');
            return back()->withInput();
        }
    }
}