<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pauta;
use App\Reuniao;
use App\Resultado;

class PautasController extends Controller
{

  public function index(Reuniao $reuniao)
  {
      $resultado = Resultado::all();
      $pauta = Pauta::where('reuniao_id', '=', $reuniao->id)->get();
      return view('pautas.index')
              ->with('pautas', $pauta)
              ->with('reuniao', $reuniao)
              ->with('resultado', $resultado);
  }

  public function create(Reuniao $reuniao)
  {
      return view('pautas.create')
              ->with('reuniao', $reuniao);
  }


  public function store(Request $request)
  {
      Pauta::create( $request->all() );
      $reuniao = Reuniao::find($request->reuniao_id);
      $pauta = Pauta::all();
      return view('pautas.index')
              ->with('pautas', $pauta)
              ->with('reuniao', $reuniao);
  }


  public function show(Pauta $pauta)
  {
        $pauta->delete();
        return redirect('/pautas');
  }


  public function edit(Pauta $pauta)
  {
      return view('pautas.edit')
                ->with('pauta', $pauta);
  }


  public function update(Request $request, Pauta $pauta)
  {
    $pauta->reuniao_id = $request->reuniao_id;
    $pauta->nome = $request->nome;
    $pauta->descricao = $request->descricao;
    $pauta->save();
    return redirect('/reuniaos');
  }

  public function status(Request $request, Pauta $pauta)
  {
    $pauta->reuniao_id = $request->reuniao_id;
    $pauta->nome = $request->nome;
    $pauta->status = $request->status;
    $pauta->descricao = $request->descricao;
    $pauta->save();
    return view('pautas.index')
            ->with('pautas', $pauta)
            ->with('reuniao', $reuniao);
  }

}
