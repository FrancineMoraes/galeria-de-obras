<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Contato;


class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = Contato::all()->where('status', 1);

        return view('admin.formulario.index', compact('contatos'));
    }

    
    public function destroy($id)
    {
        $contato = Contato::findOrFail($id);

        $contato->status = 3;
        $contato->save();

        return redirect()
        ->route('admin.formulario.index')
        ->with('status', 'success')
        ->with('retornomensagem', 'Produto excluído com sucesso');
;
    }
}
