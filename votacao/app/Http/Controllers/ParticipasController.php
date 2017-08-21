<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participa;
use App\User;
use App\Sala;

class ParticipasController extends Controller
{

  public function index()
  {
      $participa = Participa::all();
      return view('participas.index')->with('participas', $participa);
  }


  public function create()
  {
      $salas = Sala::orderBy('nome')->get();
      $users = User::orderBy('name')->get();
      return view('participas.create')
              ->with('salas', $salas)
              ->with('users', $users);
  }


  public function store(Request $request)
  {
      Participa::create( $request->all() );
      return redirect('/participas');
  }

  //  destroy
  public function show(Participa $participa)
  {
      $participa->delete();
      return redirect('/participas');
  }

}
