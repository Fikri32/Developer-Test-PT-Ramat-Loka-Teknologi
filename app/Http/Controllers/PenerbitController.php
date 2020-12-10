<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penerbit;
use RealRashid\SweetAlert\Facades\Alert;

class PenerbitController extends Controller
{
  public function index()
  {
    $penerbit = Penerbit::all();
    return view('penerbit/index',compact('penerbit'));
  }

  public function store(Request $request)
  {
    if($request->isMethod('get'))
    {
      return view('penerbit/tambah');
    }else{
        // VALIDASI
        $request->validate([
          'nama' => 'required',
          'alamat' => 'required',
          'no_hp' => 'required'
        ], [
          'nama.required' => 'Nama Harus Diisi',
          'alamat.required' => 'Alamat Harus Diisi',
          'no_hp.required' => 'No Handphone Harus Diisi',
        ]);
        $input = $request->all();
        // END VALIDASI
        
        // INPUT
        $penerbit = new Penerbit;
        $penerbit->nama = $request->get('nama');
        $penerbit->alamat = $request->get('alamat');
        $penerbit->no_hp = $request->get('no_hp');
        $penerbit->save();
        // END INPUT

        Alert::success('Penerbit Berhasil Di Tambah');

    }
    return redirect('penerbit');

  }

  public function update(Request $request,$id)
  {
    if($request->isMethod('get'))
    {
      $penerbit = Penerbit::where('id',$id)->first();
      return view('penerbit/edit',compact('penerbit'));
    }else{
        // VALIDASI
        $request->validate([
          'nama' => 'required',
          'alamat' => 'required',
          'no_hp' => 'required'
        ],[
          'nama.required' => 'Nama Harus Diisi',
          'alamat.required' => 'Alamat Harus Diisi',
          'no_hp.required' => 'No Handphone Harus Diisi',
        ]);

        $input = $request->all();
        // END VALIDASI
        
        // UPDATE
        $penerbit = Penerbit::find($id);
        $penerbit->nama = $request->get('nama');
        $penerbit->alamat = $request->get('alamat');
        $penerbit->no_hp = $request->get('no_hp');
        $penerbit->save();
        // END UPDATE

        Alert::success('Penerbit Berhasil Di Update');
      }
    return redirect('penerbit');
  }

  public function destroy($id)
  {
    Penerbit::destroy($id);
    Alert::success('Penerbit Berhasil Di Hapus');
    return redirect('penerbit');
  }
}
