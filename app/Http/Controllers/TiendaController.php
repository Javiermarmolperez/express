<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index()
    {
        $tiendas = Tienda::all();


        return view('tiendas.index',compact('tiendas'));
    }


    protected function show(Tienda $tienda)
    {
        return  view('tienda.show',compact('tienda'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'name'=>'required']);

        $tienda = Tienda::find($id);
        $tienda->update($request->all());


        $courses_ids = $request->courses_id;
        $tienda->courses()->detach();
        $tienda->courses()->attach($courses_ids);

        return redirect()->route('tienda.index')->with('success','Registro actualizado satisfactoriamente');

    }

}
