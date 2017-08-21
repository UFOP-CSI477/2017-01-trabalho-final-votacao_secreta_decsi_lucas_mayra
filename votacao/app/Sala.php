<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $fillable = ['nome'];

    public function participas() {
      return $this->hasMany('App\Participa');
    }

    public function reuniaos() {
      return $this->hasMany('App\Reuniao');
    }
}
