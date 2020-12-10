<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Kategori;
use App\Penulis;
use App\Penerbit;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{
  public function index()
  {
    $buku = Buku::all();
    return view('buku/index',compact('buku'));
  }

  public function cari(Request $request)
  {
    $cari = $request->cari;
    $buku = Buku::select('buku.judul','buku.tgl_terbit','buku.jumlah','buku.id_kategori','buku.id_penulis','buku.id_penerbit')
            ->join('kategori','kategori.id','=','buku.id_kategori')
            ->join('penulis','penulis.id','=','buku.id_penulis')
            ->join('penerbit','penerbit.id','=','buku.id_penerbit')
            ->where('buku.judul','like',"%".$cari."%")
            ->orwhere('kategori.nama','like',"%".$cari."%")
            ->orwhere('penulis.nama','like',"%".$cari."%")
            ->orwhere('penerbit.nama','like',"%".$cari."%")
            ->paginate();
    return view('buku.index',compact('buku'));
  }


  public function store(Request $request)
  {
    if($request->isMethod('get'))
    {

      $kategori = Kategori::all();
      $penerbit = Penerbit::all();
      $penulis  = Penulis::all(); 
      return view('buku/tambah',compact('penerbit','kategori','penulis'));

    }else{
      // VALIDASI
        $request->validate([
          'judul' => 'required',
          'tgl' => 'required',
          'jumlah' => 'required',
          'kategori' => 'required',
          'penulis' => 'required',
          'penerbit' => 'required',
        ], [
          'judul.required' => 'Judul Buku Harus Diisi',
          'tgl.required' => 'Tanggal Harus Diisi',
          'jumlah.required' => 'Jumlah Harus Diisi',
          'kategori.required' => 'Kategori Harus Diisi',
          'penulis.required' => 'Penulis Harus Diisi',
          'penerbit.required' => 'Penerbit Harus Diisi',
        ]);
        $input = $request->all();
        // END VALIDASI

        // INPUT
        $buku = new Buku;
        $buku->judul = $request->get('judul');
        $buku->tgl_terbit = $request->get('tgl');
        $buku->jumlah = $request->get('jumlah');
        $buku->id_kategori = $request->get('kategori');
        $buku->id_penulis = $request->get('penulis');
        $buku->id_penerbit = $request->get('penerbit');
        $buku->save();
        // END INPUT
        Alert::success('Buku Berhasil Di Tambah');

    }
    return redirect('buku');

  }

  public function update(Request $request,$id)
  {
    if($request->isMethod('get'))
    {
      $buku = Buku::where('id',$id)->first();
      $kategori = Kategori::all();
      $penerbit = Penerbit::all();
      $penulis  = Penulis::all(); 
      return view('buku/edit',compact('penerbit','kategori','penulis','buku'));

    }else{
      // VALIDASI
        $request->validate([
          'judul' => 'required',
          'tgl' => 'required',
          'jumlah' => 'required',
          'kategori' => 'required',
          'penulis' => 'required',
          'penerbit' => 'required',
        ],[
          'judul.required' => 'Judul Buku Harus Diisi',
          'tgl.required' => 'Tanggal Harus Diisi',
          'jumlah.required' => 'Jumlah Harus Diisi',
          'kategori.required' => 'Kategori Harus Diisi',
          'penulis.required' => 'Penulis Harus Diisi',
          'penerbit.required' => 'Penerbit Harus Diisi',
        ]);

        $input = $request->all();
        // END VALIDASI

        // UPDATE
        $buku = Buku::find($id);
        $buku->judul = $request->get('judul');
        $buku->jumlah = $request->get('jumlah');
        $buku->tgl_terbit = $request->get('tgl');
        $buku->id_kategori = $request->get('kategori');
        $buku->id_penulis = $request->get('penulis');
        $buku->id_penerbit = $request->get('penerbit');
        $buku->save();
        // END UPDATE

        Alert::success('Buku Berhasil Di Update');
      }
    return redirect('buku');
  }

  public function destroy($id)
  {
      Buku::destroy($id);
      Alert::success('Buku Berhasil Di Hapus');
      return redirect('buku');
  }
}
