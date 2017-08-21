<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participa;
use App\Sala;
use App\User;

class UsersController extends Controller
{

    public function index()
    {
        $user = User::orderBy('name')->get();
        return view('users.index')->with('users', $user);
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
      $fields = [
          'name'     => $request->name,
          'email'    => $request->email,
          'password' => bcrypt($request->password),];

      User::create($fields);
      return redirect('/users');
    }


    public function show(User $user)
    {
        return view('users.show')
                  ->with('user', $user);
    }


    public function edit(User $user)
    {
        //dd($id);
        //$produto = Produto::find($id);
        return view('users.edit')
                  ->with('user', $user);
    }


    public function update(Request $request, User $user)
    {
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->type = $request->type;
      $user->save();
      return redirect('/users');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
