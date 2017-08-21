<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{

  protected $fillable = ['sala_id', 'date'];

  public function salas() {
    return $this->belongsTo('App\Sala');
  }

  public function pautas() {
    return $this->hasMany('App\Pauta');
  }
}
