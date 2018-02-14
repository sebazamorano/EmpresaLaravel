<?php

namespace Empresa\Http\Controllers;

use Empresa\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$proveedores = Proveedor::all();
        //COnsulta a la BD Select * from proveedor;
        $proveedores = Proveedor::orderBy('id', 'DESC')->paginate(15);

        //Retornando ala vista con lw variable proovedores
        return view('proveedor.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'rut' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'giro' => 'required'
        ]);

        Proveedor::create($request->all());

        return redirect()->route('proveedores.index');
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
        //$proveedor = Proveedor::find($id);
        //$proveedor = Proveedor::where('id', $id)->first();
        $proveedor = Proveedor::findOrFail($id);

        return view('proveedor.edit', compact('proveedor'));
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
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->all());

        return redirect()->route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proveedor::find($id)->delete();

        return redirect()->route('proveedores.index');
    }
}
