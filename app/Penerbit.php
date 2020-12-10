<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
  protected $table = 'penerbit';
  protected $fillable = [
  'nama','alamat','no_hp'
  ];

  public function Penerbit()
  {
    return $this->hasMany('App\Penerbit','id_penerbit', 'id');
  }
}
