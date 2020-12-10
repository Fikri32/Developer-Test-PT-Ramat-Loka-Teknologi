<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
  protected $table = 'penulis';
  protected $fillable = [
  'nama','alamat','no_hp'
  ];

  public function Penulis()
    {
      return $this->hasMany('App\Penulis','id_penulis', 'id');
    }
}
