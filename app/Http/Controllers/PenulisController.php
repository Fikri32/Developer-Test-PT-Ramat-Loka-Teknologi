<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penulis;
use RealRashid\SweetAlert\Facades\Alert;

class PenulisController extends Controller
{
    public function index()
    {
      $penulis = Penulis::all();
      return view('penulis/index',compact('penulis'));
    }

    public function store(Request $request)
    {
      if($request->isMethod('get'))
      {
        return view('penulis/tambah');

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
          $penulis = new Penulis;
          $penulis->nama = $request->get('nama');
          $penulis->alamat = $request->get('alamat');
          $penulis->no_hp = $request->get('no_hp');
          $penulis->save();
          // END INPUT

          Alert::success('Penulis Berhasil Di Tambah');
        }
        return redirect('penulis');
    }

    public function update(Request $request,$id)
    {
      if($request->isMethod('get'))
      {
        $penulis = Penulis::where('id',$id)->first();
        return view('penulis/edit',compact('penulis'));
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
          $penulis = Penulis::find($id);
          $penulis->nama = $request->get('nama');
          $penulis->alamat = $request->get('alamat');
          $penulis->no_hp = $request->get('no_hp');
          $penulis->save();
          // END UPDATE

          Alert::success('Penulis Berhasil Di Update');
        }
        return redirect('penulis');
    }

    public function destroy($id)
    {
        Penulis::destroy($id);
        Alert::success('Penulis Berhasil Di Hapus');
        return redirect('penulis');
    }
}
