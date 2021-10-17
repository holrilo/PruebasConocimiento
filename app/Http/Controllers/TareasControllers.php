<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tareas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TareasControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$tareas = Tareas::all();
        //return $tareas;
        //$datos['tareas'] = Tareas::all();

        $datos['tareas'] = Tareas::orderBy('fecha_vencimiento', 'ASC')->paginate(5);
        return view('tarea.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tarea.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $tareas = new Tareas();
        $tareas->nombre_tariea = $request->txtTarea;
        $tareas->descripcion_tarea = $request->txtDesc;
        $tareas->fecha_creacion = $request->txtFecha;
        $tareas->estado_tarea = $request->txtEstado;
        $tareas->fecha_vencimiento = $request->txtFechaV;
        //$tareas->usuario = $request->usuario;
        $tareas->usuario = Auth::user()->name;
        $tareas->save();
        //return "Se creo el registro". $tareas;
        return redirect('tarea')->with('mensaje', 'Tarea Agregada con Exito');
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
        //
        $tarea = Tareas::findOrFail($id);
        return view('tarea.edit', compact('tarea'));
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
        //
        $tareas = Tareas::findOrFail($id);
        $tareas->nombre_tariea = $request->txtTarea;
        $tareas->descripcion_tarea = $request->txtDesc;
        $tareas->fecha_creacion = $request->txtFecha;
        $tareas->estado_tarea = $request->txtEstado;
        $tareas->fecha_vencimiento = $request->txtFechaV;
        //$tareas->usuario = $request->usuario;
        if (Auth::user()->name != $tareas->usuario) {
            # code...
            $mensaje = "EL usuario no creo el caso no se puede modificar ";
        } else {
            $tareas->save();
            $mensaje = "Tarea Modificada con Exito";
        }

        return redirect('/tarea')->with('mensaje', $mensaje);;

        // $tareas->save();
        //return "Se creo el registro". $tareas;
        //return $tareas;
        //return "entro".$tareas->nombre_tariea;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //$tareas = Tareas::destroy($request->id);

        $tareas = Tareas::findOrFail($id);
        if (Auth::user()->name != $tareas->usuario) {
            # code...
            $mensaje = "EL usuario no creo el caso no se puede eliminar ";
        } else {
            Tareas::destroy($id);
            $mensaje = "Tarea Eliminada con Exito";
        }

        //Tareas::destroy($id);
        //return $tareas;
        return redirect('/tarea')->with('mensaje', $mensaje);
    }
}
