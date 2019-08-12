<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NotaAuthe;

class NotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarioEmail = auth()->user()->email;
        $notas = NotaAuthe::where('usuario', $usuarioEmail)->paginate(5);
        return view('notas.lista',compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nota = new NotaAuthe();
        $nota->nombre = $request->nombre;
        $nota->descripcion = $request->descripcion;
        $nota->usuario = auth()->user()->email;
        $nota->save();

        return back()->with('mensaje', 'Nota Agregada!');
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
        $notas = NotaAuthe::findOrFail($id);
        return view('notas.editar', compact('notas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $notasUpdate = NotaAuthe::findOrFail($id);

        $notasUpdate ->nombre      = $request->nombre;
        $notasUpdate ->descripcion = $request->descripcion;
        
        $notasUpdate->save();

        return back()->with('actualizado', 'La nota ha sido actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notasDelete = NotaAuthe::findOrFail($id);
        $notasDelete->delete();
        return back()->with('elimindada', 'La nota ha sido eliminada');
    }
}
