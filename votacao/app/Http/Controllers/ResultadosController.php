<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultadosController extends Controller
{

  public function store(Request $request)
  {
      Pauta::create( $request->all() );
      $reuniao = Reuniao::find($request->reuniao_id);
      $pauta = Pauta::all();
      return view('pautas.index')
              ->with('pautas', $pauta)
              ->with('reuniao', $reuniao);
  }
  
}
