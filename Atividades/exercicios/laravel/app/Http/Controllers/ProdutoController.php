<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::orderBy('id')->get();
        return view('produtos.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (Produto::create($request->all())) {
            return redirect()->route('produtos.index')->with('sucess', 'Produto cadastrado!');
        } else {
            session()->flash('error-message', 'Falha ao cadastrar produto!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produtos
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produtos)
    {
        //
        return view('produtos.show', ['produto' => $produtos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produtos
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produtos)
    {
        //
        return view('produtos.edit', ['produto' => $produtos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produtos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produtos)
    {
        //
        $produtos->fill($request->all());
        if ($produtos->save()) {
            return redirect()->route('produtos.index')->with('success', 'Produto alterado!');
        } else {
            session()->flash('error-message', 'Falha ao alterar produto!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produtos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produtos)
    {
        //
        if ($produtos->delete()) {
            return redirect()->route('produtos.index')->with('success', 'Produto excluído!');
        } else {
            session()->flash('error-message', 'Falha ao excluir produto!');
            return back()->withInput();
        }
    }
}