<?php

namespace App\Http\Controllers;

use App\Models\Artigos;
use App\Models\Categorias;
use Illuminate\Http\Request;

class ArtigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //listando
        $artigos = Artigos::orderby('id', 'ASC')->get();
        return view('artigo.index',['artigos'=>$artigos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categorias::orderBy('Nome', 'ASC')->pluck('Nome','id');
        return view('artigo.create',['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'titulo.min'  => 'O campo :attribute é obrigatorio!',
            'texto.min'   => 'O :attribute precisa ter no mínimo :min.',
        ];

        $validated = $request->validate([
            'titulo' => 'required|min:5',
            'texto' => 'required|min:5',
            'categoria_id' => 'required'
        ], $messages);

        $artigo = new Artigos;
        $artigo->titulo  = $request->titulo;
        $artigo->texto  = $request->texto;
        $artigo->categoria_id  = $request->categoria_id;
        $artigo->save();

        return redirect('/artigo')->with('status', 'artigo criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Artigos  $artigo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artigos = Artigos::findOrFail($id);
        return view('artigo.show', ['artigos' => $artigos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artigos  $artigo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    
    {
        $categorias = Categorias::orderBy('Nome', 'ASC')->pluck('Nome','id');
        $artigo = Artigos::findOrFail($id);
        return view('artigo.edit', ['artigos' => $artigo,'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artigos  $artigo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $messages = [
            'titulo.min'  => 'O campo :attribute é obrigatorio!',
            'texto.min'   => 'O :attribute precisa ter no mínimo :min.',
        ];

        $validated = $request->validate([
            'titulo' => 'required|min:5',
            'texto' => 'required|min:5',
        ], $messages);
        
        $artigo = Artigos::findOrFail($request->id);;
        $artigo->categoria_id  = $request->categoria_id;
        $artigo->titulo  = $request->titulo;
        $artigo->texto  = $request->texto;
        $artigo->save();
    
        return redirect('/artigo')->with('status', 'Categoria alterada com sucess!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Artigos $artigo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artigo = Artigos::findOrFail($id);
        $artigo->delete();

        return redirect('/artigo')->with('status', 'artigo excluido com sucesso!');
    }
}
