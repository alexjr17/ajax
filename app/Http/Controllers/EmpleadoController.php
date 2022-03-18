<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $dataEmpleados = array();
    public function index()
    {

        $empleados = Empleado::orderBy('id', 'asc')->get();
        foreach ($empleados as $empleado) {
            if ($empleado->image) {
                $empleado = Arr::add($empleado, 'file', Storage::url($empleado->image->url));
            }else {
                $empleado = Arr::add($empleado, 'file', '');
            }            
            $this->dataEmpleados[] = $empleado;
        }
        return datatables()->of($this->dataEmpleados)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(Empleado::$rules);
        $empleado = Empleado::create($request->all());
        if ($request->file('file')) {
            $url = Storage::disk('public')->put('images', $request->file('file'));
            $empleado->image()->create([
                'url' => $url
            ]);
        }
        if ($empleado) {
            return response()->json([
                'status' => 200,
                'message' => 'Se añadio nuevo registro'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'NO se pudo hacer el guardado'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        if ($empleado) {
            return response()->json($empleado);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(Empleado::$rules);
        $empleado = Empleado::find($id);
        $validar = $empleado->update($request->all());



        if ($validar) {
            return response()->json([
                'status' => 200,
                'message' => 'se actualizo con exito'
            ]);
        }
    }

    public function imageUpdate(Request $request)
    {
        $request->validate([
            'file' => 'image|required'
        ]);
        $empleado = Empleado::find($request->id);
        if ($request->file('file')) {
            $url = Storage::disk('public')->put('images', $request->file('file'));
            if ($empleado->image) {
                Storage::disk('public')->delete($empleado->image->url);
                $empleado->image()->update([
                    'url' => $url
                ]);
            } else {
                $empleado->image()->create([
                    'url' => $url
                ]);
            }
        }
        if ($empleado) {
            return response()->json([
                'status' => '200',
                'message' => 'se actualizo la imagen'
            ]);
        }
    }

    public function imageDestroy($id)
    {
        // dd($id);
        $empleado = Empleado::find($id);
        if ($empleado->image) {
            $empleado->image()->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Se elimino con exito la imangen'
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No se encontro imagen para eliminar'
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        $empleado->delete();
        return response()->json([
            'status' => 200,
            'message' => 'se elimino con exito'
        ]);
    }
}
