<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reuniao;
use App\Sala;

class ReuniaosController extends Controller
{

        public function index()
        {
            $reuniao = Reuniao::orderBy('date')->get();
            return view('reuniaos.index')->with('reuniaos', $reuniao);
        }


        public function create()
        {
            $salas = Sala::orderBy('nome')->get();
            return view('reuniaos.create')
                    ->with('salas', $salas);
        }


        public function store(Request $request)
        {
            Reuniao::create( $request->all() );
            return redirect('/reuniaos');
        }


        public function show(Reuniao $reuniao)
        {
            return view('reuniaos.show')
                      ->with('reuniao', $reuniao);
        }


        public function edit(Reuniao $reuniao)
        {
            $salas = Sala::orderBy('nome')->get();
            return view('reuniaos.edit')
                      ->with('reuniao', $reuniao)
                      ->with('salas', $salas);
        }


        public function update(Request $request, Reuniao $reuniao)
        {
          $reuniao->sala_id = $request->sala_id;
          $reuniao->date = $request->date;
          $reuniao->save();
          return redirect('/reuniaos');
        }


        public function destroy(Reuniao $reuniao)
        {
            $reuniao->delete();
            return redirect('/reuniaos');
        }

}
