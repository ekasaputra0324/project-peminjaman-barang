<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class HomeController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('home.index',[
            "title" => "Home",
            "pages" => "Data Barang",
            "barangs" => $barang
        ]);
    }

    public function store(Request $request)
    {
      $name =  $request->image->getClientOriginalName();
      $path = $request->file('image')->storeAs('barang', $name);
      $barang = new Barang();
      $barang->nama = $request->nama;
      $barang->image = $path;
      $barang->jumlah_barang = $request->jumlah_barang;
      if ($barang->save()) {
          Alert::success('Congrats', 'Data barang Berhasil Disimpan');
          return redirect('/');
      }
      Alert::error('Error', 'Data barang gagal disimpan');
          return redirect('/');
    }
    public function update(Request $request, $id)
    {
        $barang = Barang::where('id',$id);
        $name =  $request->image->getClientOriginalName();
        $path = $request->file('image')->storeAs('barang', $name);
        $barang->update([
            'nama' => $request->nama,
            'image' => $path,
            'jumlah_barang' => $request->jumlah_barang,
        ]);
        Alert::success('Congrats', 'Data barang Berhasil Disimpan');
        return redirect('/');

    }
    public function delete($id)
    {
        $barang = Barang::where('id', $id);
        $barang->delete();
        Alert::success('Congrats', 'Data Berhasil Dihapus');
        return redirect('/');
    }
    public function getdata($id)
    {
        $barang = Barang::where('id' , $id)->get();
        echo json_encode($barang);
    }
}