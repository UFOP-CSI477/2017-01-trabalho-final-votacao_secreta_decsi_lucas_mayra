<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{

  protected $fillable = ['pauta_id', 'user_id', 'voto', 'comentario'];

  public function pautas() {
    return $this->belongsTo('App\Pauta');
  }

  public function users() {
    return $this->belongsTo('App\User');
  }
}
