<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Config;

class ConfigController extends Controller
{

    public function index()
    {
        $config = Config::get();

        return view('admin.config.index', compact('config'));
    }


    public function edit($id)
    {
        $config = Config::findOrFail($id);

        return view('admin.config.edit', compact('config'));
    }

    public function update(Request $request, $id)
    {
        $config = Config::findOrFail($id);

        $config->titulo = $request->titulo;
        $config->sub = $request->sub;
        $config->biografia = $request->biografia;

        $config->update();

        return redirect()
        ->route('admin.config.index')
        ->with('status', 'success')
        ->with('retornomensagem', 'Configurações alteradas com sucesso');
    }
}
