<?php

namespace App\Http\Controllers;

use App\Models\Coleta;
use App\Models\Item;
use App\Models\Entidade;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ColetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $coletas = Coleta::all();
            return view('coletas.index', ['coletas' => $coletas]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $items = Item::orderBy('id')->get();
            $entidades = Entidade::orderBy('id')->get();
            return view('coletas.create', ['items' => $items, 'entidades' => $entidades]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Coleta::create($request->all());
        return redirect()->route('coletas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coleta  $coleta
     * @return \Illuminate\Http\Response
     */
    public function show(Coleta $coleta)
    {
        $items = Item::orderBy('id')->get();
        $entidades = Entidade::orderBy('id')->get();
        return view('coletas.show', ['coleta' => $coleta, 'items' => $items, 'entidades' => $entidades]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coleta  $coleta
     * @return \Illuminate\Http\Response
     */
    public function edit(Coleta $coleta)
    {
        if (Auth::check()) {
            $items = Item::orderBy('id')->get();
            $entidades = Entidade::orderBy('id')->get();
            return view('coletas.edit', ['coleta' => $coleta, 'items' => $items, 'entidades' => $entidades]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coleta  $coleta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coleta $coleta)
    {
        $coleta->fill($request->all());
        $coleta->save();
        return redirect()->route('coletas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coleta  $coleta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coleta $coleta)
    {
        if (Auth::check()) {
            $coleta->delete();
            return redirect()->route('coletas.index');
        }
    }

    public function relatorioEntidades()
    {
        $array_coletado_entidades = array();
        $quantidade_coletado_entidades = 0;

        $entidades = Entidade::orderBy('id')->get();

        for ($i = 0; $i < $entidades->count(); $i++) {
            $coletas = Coleta::where('entidade_id', $entidades[$i]->id)->get();
            for ($j = 0; $j < $coletas->count(); $j++) {
                $quantidade_coletado_entidades += $coletas[$j]->quantidade;
            }
            array_push($array_coletado_entidades, $quantidade_coletado_entidades);
            $quantidade_coletado_entidades = 0;
        }

        $total_entidades = 0;

        foreach ($array_coletado_entidades as $quantidadeTotalEntidades) {
            $total_entidades += $quantidadeTotalEntidades;
        }

        return view('coletas.relatorio_entidades', ['entidades' => $entidades, 'array_coletado_entidades' => $array_coletado_entidades, 'total_entidades' => $total_entidades]);
    }

    public function relatorioItems() {
        $array_coletado_items = array();
        $quantidade_coletado_items = 0;

        $items = Item::orderBy('id')->get();

        for ($i = 0; $i < $items->count(); $i++) {
            $coletas = Coleta::where('item_id', $items[$i]->id)->get();
            for ($j = 0; $j < $coletas->count(); $j++) {
                $quantidade_coletado_items += $coletas[$j]->quantidade;
            }
            array_push($array_coletado_items, $quantidade_coletado_items);
            $quantidade_coletado_items = 0;
        }

        $total_items = 0;

        foreach ($array_coletado_items as $quantidadeTotalItems) {
            $total_items += $quantidadeTotalItems;
        }

        return view('coletas.relatorio_items', ['items' => $items, 'array_coletado_items' => $array_coletado_items, 'total_items' => $total_items]);
    }
}
