<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleccion;

class EleccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $eleccion = Eleccion::all();
	    return view ('eleccion/list',compact('eleccion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
	    return view('eleccion/create');
    }


    
    function validateData(Request $request)
    {
        $request->validate([
            'periodo'=> 'required|max:200',
            'fecha'=> 'required',
            'fechaapertura'=> 'required',
            'horaapertura'=> 'required',
            'fechacierre'=> 'required',
            'horacierre'=> 'required',
            'observaciones'=> 'required',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validateData($request);
        // print_r($request->all());

        $campos=[
            'periodo'       => $request->periodo,
		    'fecha'         => $request->fecha,
		    'fechaapertura' => $request->fechaapertura,
		    'horaapertura'  => $request->horaapertura,
		    'fechacierre'   => $request->fechacierre,
		    'horacierre'    => $request->horacierre,
		    'observaciones' => $request->observaciones,
        ];
        
        $eleccion = Eleccion::create($campos);
        return redirect('eleccion')->with('success', 'Actualizado correctamente...');
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
        $eleccion = Eleccion::find($id);
        return view ('eleccion/edit', compact('eleccion')); 
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
        $this->validateData($request);
        $campos=[
            'periodo'       => $request->periodo,
		    'fecha'         => $request->fecha,
		    'fechaapertura' => $request->fechaapertura,
		    'horaapertura'  => $request->horaapertura,
		    'fechacierre'   => $request->fechacierre,
		    'horacierre'    => $request->horacierre,
		    'observaciones' => $request->observaciones,
        ];

        
        Eleccion::whereId($id) -> update($campos);
        return redirect('eleccion')-> with( 'success', ' guardado satisfactoriamente ...');
        

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
        Eleccion::whereId($id)-> delete();
         return redirect('eleccion');
    }
}