<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participa extends Model
{

  protected $fillable = ['sala_id', 'user_id'];

  public function users() {
    return $this->hasMany('App\User');
  }

  public function salas() {
    return $this->hasMany('App\Sala');
  }

}
