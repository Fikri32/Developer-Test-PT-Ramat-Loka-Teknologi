<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    protected $table = 'pinjam';
    protected $fillable = [
      'nama','id_buku','tgl_pinjam','tgl_kembali'
    ];

    public function buku()
    {
      return $this->belongsTo('App\Buku','id_buku', 'id');
    }
}
