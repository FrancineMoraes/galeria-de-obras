<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\GaleriaRequest;

use App\Obra;
use App\Foto;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obras = Obra::with('fotoObra')
        ->where('status', 1)
        ->get();

        return view('admin.galeria.index', compact('obras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galeria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GaleriaRequest $request)
    {
        //cadastra obra
        $obra = new Obra();
        $obra->titulo = $request->titulo;
        $obra->descricao = $request->descricao;
        $incluir = $obra->save();

        if($incluir)
        {
            if($request->hasFile('caminho') 
                && 
                $request->file("caminho")->isValid())
                {
                    $path = $request->file('caminho')->store('obras');
                    
                    $imagem = new Foto();
                    $imagem->caminho = $path;
                    $imagem->obra_id = $obra->id;

                    $incluirImagem = $imagem->save();

                }
        }

        return redirect()
            ->route('admin.galeria.index')
            ->with('status', 'success')
            ->with('retornomensagem', 'Obra cadastrada com sucesso');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obra = Obra::with('fotoObra')->findOrFail($id);

        return view('admin.galeria.edit', compact('obra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GaleriaRequest $request, $id)
    {
        $obra = Obra::with('fotoObra')->findOrFail($id);
        $obra->titulo = $request->titulo;
        $obra->descricao = $request->descricao;
        $update = $obra->update();

        
        if($update)
        {
            $imagemobra = $obra->fotoObra;
            if ($request->hasFile('caminho')) 
            {
                Storage::delete('obras/'.$request->caminho);                

                $path = $request->file('caminho')->store('obras', 'public');

                $imagemobra->each(function ($imagemobra) use ($path) {
                    $imagemobra->caminho = $path;
                    $imagemobra->save();

                });

            }
            
        }

        return redirect()
            ->route('admin.galeria.index')
            ->with('status', 'success')
            ->with('retornomensagem', 'COnfigurações alteradas com sucesso');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obra = Obra::with('fotoObra')->findOrFail($id);
        $obra->status = 3;
        $obra->update();

        return redirect()
            ->route('manager.obra.index')
            ->with('status', 'success')
            ->with('retornomensagem', 'Obra excluída com sucesso');
    }
}
