<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $fillable = [
      'judul','tgl_terbit','id_kategori','id_penerbit','id_penulis'
    ];

    public function kategori()
    {
      return $this->belongsTo('App\Kategori','id_kategori', 'id');
    }

    public function penulis()
    {
      return $this->belongsTo('App\Penulis','id_penulis', 'id');
    }

    public function penerbit()
    {
      return $this->belongsTo('App\Penerbit','id_penerbit', 'id');
    }

    public function pinjam()
    {
      return $this->hasMany('App\Pinjam','id_buku', 'id');
    }
    
   
    
}
