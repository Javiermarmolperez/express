<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index',compact('users'));
    }


    protected function show()
    {
        return  view('users.show',compact('user'));
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
