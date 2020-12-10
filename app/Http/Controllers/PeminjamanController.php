<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Pinjam;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
  public function index(Request $request)
  {
    $tempo = $request->get('tempo');
    $pinjam = Pinjam::all();
    $now = Carbon::now()->toDateString();
   
    // CARI BERDASARKAN TANGGAL
    if($tempo)
    {
      $pinjam = Pinjam::where('tgl_kembali',$tempo)->get();
    }
    // END CARI
    return view('pinjam/index',compact('pinjam','now'));
  }

 
  public function cari(Request $request)
  {
    $cari = $request->cari;
    $now = Carbon::now()->toDateString();
    $pinjam = Pinjam::select('pinjam.nama','pinjam.tgl_pinjam','pinjam.tgl_kembali','pinjam.id_buku')
            ->join('buku','buku.id','=','pinjam.id_buku')
            ->where('pinjam.nama','like',"%".$cari."%")
            ->orwhere('buku.judul','like',"%".$cari."%")
            ->orwhere('pinjam.tgl_pinjam','like',"%".$cari."%")
            ->orwhere('pinjam.tgl_kembali','like',"%".$cari."%")
            ->paginate();
    return view('pinjam.index',compact('pinjam','now'));
  }

  public function store(Request $request)
  {
    if($request->isMethod('get'))
    {
      $buku = Buku::all();
      return view('pinjam/tambah',compact('buku'));
    
    }else{
       // VALIDASI
      $request->validate([
        'nama' => 'required',
        'pinjam'  => 'required',
        'kembali'  => 'required',
        'buku' => 'required',
      ],[
        'nama.required' => 'Nama Peminjam Harus Di isi',
        'pinjam.required'  => 'Tanggal Pinjam Harus Di isi',
        'kembali.required'  => 'Tanggal Kembali Harus Di isi',
        'buku.required' => 'Buku Harus Di isi'
      ]);
      $input = $request->all();
      // END VALIDASI

       // INPUT
       $pinjam = new Pinjam;
       $pinjam->nama = $request->get('nama');
       $pinjam->id_buku = $request->get('buku');
       $pinjam->tgl_pinjam = $request->get('pinjam');
       $pinjam->tgl_kembali = $request->get('kembali');
       $pinjam->save();
       // END INPUT
       Alert::success('Peminjaman Berhasil Di Tambah');
    }
    return redirect('pinjam');
  }
  public function update(Request $request,$id)
  {
    if($request->isMethod('get'))
    {
      $buku = Buku::all();
      $pinjam = Pinjam::where('id',$id)->first();
      return view('pinjam/edit',compact('buku','pinjam'));
    
    }else{
       // VALIDASI
      $request->validate([
        'nama' => 'required',
        'pinjam'  => 'required',
        'kembali'  => 'required',
        'buku' => 'required',
      ],[
        'nama.required' => 'Nama Peminjam Harus Di isi',
        'pinjam.required'  => 'Tanggal Pinjam Harus Di isi',
        'kembali.required'  => 'Tanggal Kembali Harus Di isi',
        'buku.required' => 'Buku Harus Di isi'
      ]);
      $input = $request->all();
      // END VALIDASI

       // INPUT
       $pinjam = Pinjam::find($id);
       $pinjam->nama = $request->get('nama');
       $pinjam->id_buku = $request->get('buku');
       $pinjam->tgl_pinjam = $request->get('pinjam');
       $pinjam->tgl_kembali = $request->get('kembali');
       $pinjam->save();
       // END INPUT
       Alert::success('Peminjaman Berhasil Di Update');
    }
    return redirect('pinjam');
  }

  public function destroy($id)
  {
    Pinjam::destroy($id);
    Alert::success('Peminjaman Berhasil Di Hapus');
    return redirect('pinjam');
   
  }
  
}
  

