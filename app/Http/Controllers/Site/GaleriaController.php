<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Contato;
use App\Obra;
use App\Config;

class GaleriaController extends Controller
{
    public function index()
    {
        $obras = Obra::with('fotoObra')
        ->where('status', 1)
        ->get();

        $config = Config::get();

        return view('galeria.index', compact('obras', 'config'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:190',
            'email' => 'required|email',
            'texto' => 'required|max:190',
        ]);

        $contato = Contato::create($request->all());

        return redirect()
        ->route('site.galeria.index');
    }
}
