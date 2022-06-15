<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use App\Http\Requests\StorePinjamanRequest;
use App\Http\Requests\UpdatePinjamanRequest;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = DB::table('pinjamen')->join('barangs','pinjamen.barang_id', '=' , 'barangs.id')
              ->select('pinjamen.id','barangs.nama','pinjamen.nama_peminjam','pinjamen.tanggal_peminjaman','pinjamen.status')->get();

      $barang = Barang::all();
      return view('pinjaman.index',[
         "pages" => "Data Pinjaman",
         "title" => "Pinjaman",
         "pinjamans" => $data,
         "barangs" => $barang
      ]);
    }

   public function store(Request $request){
      
     $request->validate([
        'barang_id' => 'required',
        'tanggal_peminjaman' => 'required',
        'nama_peminjam' => 'required',
        'status' => 'required'
     ]);

     $pinjaman = new Pinjaman();
     $pinjaman->barang_id  = $request->barang_id;
     $pinjaman->nama_peminjam = $request->nama_peminjam;
     $pinjaman->tanggal_peminjaman = $request->tanggal_peminjaman;
     $pinjaman->status = $request->status;
     $pinjaman->save();
      Alert::success('Congrats','data pinjaman berhasil di tambahkan');
      return redirect('/pinjaman');
    
    
   }

   public function deleted($id){

        $pinjaman = Pinjaman::where('id', $id);
        if ($pinjaman->delete()) {
          Alert::success('Congrats','data pinjaman berhasil di hapus');
          return redirect('/pinjaman');
        }
   }
   public function update(Request $request, $id)
   {
      $pinjaman = Pinjaman::where('id', $id)->get();
      $pinjaman->update([
         'barang_id' => $request->barang_id,
         'nama_peminjam' => $request->nama_peminjam,
         'status' => $request->status,
         'tanggal_peminjaman' => $request->tanggal_peminjaman
      ]);
      Alert::success('Congrats','data pinjaman berhasil di edit');
      return redirect('/pinjaman');
   }
   public function getDatapinjamanByid($id)
   {
      $pinjamna = Pinjaman::where('id', $id);
      echo json_encode($pinjaman);
   }
}
