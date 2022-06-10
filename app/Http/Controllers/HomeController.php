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
        //    $validate = $request->validate([
        //            'name' => 'required',
        //            'image' => 'required',
        //            'jumlah_barang' => 'required'
        //        ]);
      $image = $request->file('image')->store('barang-image');
      $barang = new Barang();
      $barang->nama = $request->nama;
      $barang->image = $image;
      $barang->jumlah_barang = $request->jumlah_barang;
      $barang->save();
      Alert::success('Congrats', 'Data Berhasil Disimpan');
      return redirect('/');

}
}