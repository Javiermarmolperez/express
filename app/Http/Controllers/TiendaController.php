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


}
