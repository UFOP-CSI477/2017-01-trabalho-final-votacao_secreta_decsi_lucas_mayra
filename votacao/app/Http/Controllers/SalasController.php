<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sala;
use Auth;
class SalasController extends Controller
{

      public function index()
      {
          // $sala = Sala::where('id',Auth::user()->participas->sala_id)->orderBy('nome')->get();
          $sala = Sala::orderBy('nome')->get();
          return view('salas.index')->with('salas', $sala);
      }


      public function create()
      {
          return view('salas.create');
      }


      public function store(Request $request)
      {
          Sala::create( $request->all() );
          return redirect('/salas');
      }


      public function show(Sala $sala)
      {
          return view('salas.show')
                    ->with('sala', $sala);
      }


      public function edit(Sala $sala)
      {
          //dd($id);
          //$produto = Produto::find($id);
          return view('salas.edit')
                    ->with('sala', $sala);
      }


      public function update(Request $request, Sala $sala)
      {
        $sala->nome = $request->nome;
        $sala->save();
        return redirect('/salas');
      }


      public function destroy(Sala $sala)
      {
          $sala->delete();
          return redirect('/salas');
      }
}
