<?php

namespace App\Http\Controllers;

use App\Models\Entidade;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class EntidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $entidades = Entidade::orderBy('nome')->get();
            return view('entidades.index', ['entidades' => $entidades]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entidade  $entidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entidade $entidade)
    {
        if (Auth::check()) {
            $entidade->delete();
            return redirect()->route('entidades.index');
        }
    }
}
