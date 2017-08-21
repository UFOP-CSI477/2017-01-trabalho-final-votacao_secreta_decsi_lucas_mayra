<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reuniao;
use App\Pauta;
use App\Resultado;

class ResultadosController extends Controller
{

  public function create(Pauta $pauta)
  {
      $reuniao = Reuniao::find($pauta->reuniao_id);
      return view('resultados.create')
              ->with('reuniao', $reuniao)
              ->with('pauta', $pauta);
  }

  public function store(Request $request)
  {
      Resultado::create( $request->all() );
      $reuniao = Reuniao::find(Pauta::find($request->pauta_id)->reuniao_id);
      $pautas = Pauta::all();
      return view('pautas.index')
              ->with('reuniao', $reuniao)
              ->with('pautas', $pautas);
  }

}
