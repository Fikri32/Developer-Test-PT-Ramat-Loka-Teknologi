<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
  public function index()
  {
    $kategori = Kategori::all();
    return view('kategori/index',compact('kategori'));
  }

  public function store(Request $request)
  {
    if($request->isMethod('get'))
    {
      return view('kategori/tambah');
    }else{
        // VALIDASI
        $request->validate([
          'nama' => 'required',
        ], [
          'nama.required' => 'Nama Kategori Harus Diisi',
        ]);
        $input = $request->all();
        // END VALIDASI

        // INPUT
        $kategori = new Kategori;
        $kategori->nama = $request->get('nama');
        $kategori->save();
        // ENDINPUT
        Alert::success('Kategori Berhasil Di Tambah');

    }
    return redirect('kategori');

  }

  public function update(Request $request,$id)
  {
    if($request->isMethod('get'))
    {
      $kategori = Kategori::where('id',$id)->first();
      return view('kategori/edit',compact('kategori'));
    }else{
        // VALIDASI
        $request->validate([
          'nama' => 'required',
        ],[
          'nama.required' => 'Nama Harus Diisi',
        ]);

        $input = $request->all();
        // END VALIDASI

        // UPDATE
        $kategori = Kategori::find($id);
        $kategori->nama = $request->get('nama');
        $kategori->save();
        // END UPDATE
        Alert::success('Kategori Berhasil Di Update');
      }
    return redirect('kategori');
  }

  public function destroy($id)
  {
    Kategori::destroy($id);
    Alert::success('Kategori Berhasil Di Hapus');
    return redirect('kategori');
  }
}
