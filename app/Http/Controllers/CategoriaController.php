<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //listando
        $categorias = Categorias::orderby('id', 'ASC')->get();
        return view('categoria.index',['categorias'=>$categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
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
            'nome.min'  => 'O campo :attribute é obrigatorio!',
        ];

        $validated = $request->validate([
            'nome' => 'required|min:5',
        ], $messages);

        $categoria = new Categorias;
        $categoria ->nome  = $request->nome;
        $categoria ->save();

        return redirect('/categoria')->with('status', 'Categoria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Categorias  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorias = Categorias::findOrFail($id);
        return view('categoria.show', ['categorias' => $categorias]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categorias::findOrFail($id);
        return view('categoria.edit', ['categorias' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $messages = [
            'nome.min'  => 'O campo :attribute é obrigatorio!',
        ];

        $validated = $request->validate([
            'nome' => 'required|min:5',
        ], $messages);
        
        $categoria = Categorias::findOrFail($request->id);;
        $categoria ->nome  = $request->nome;
        $categoria ->save();
    
        return redirect('/categoria')->with('status', 'Categoria alterada com sucess!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Categorias $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categorias::findOrFail($id);
        $categoria ->delete();

        return redirect('/categoria')->with('status', 'Categoria excluida com sucesso!');
    }
}
