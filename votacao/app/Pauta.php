<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Pauta extends Model
{

    protected $fillable = ['reuniao_id', 'nome', 'descricao'];

    public function reuniaos() {
      return $this->belongsTo('App\Reuniao');
    }

    public function resultados() {
      return $this->hasMany('App\Resultado');
    }
}
