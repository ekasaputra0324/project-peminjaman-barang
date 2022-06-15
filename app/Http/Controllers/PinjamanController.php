<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use App\Http\Requests\StorePinjamanRequest;
use App\Http\Requests\UpdatePinjamanRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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


      return view('pinjaman.index',[
         "pages" => "Data Pinjaman",
         "title" => "Pinjaman",
         "pinjamans" => $data
      ]);
    }

   public function store(Rrquest $request){
     $request->validate([
        'nama' => 'required',
        'tanggal_peminjaman' => 'required',
        'nama_peminjam' => 'required',
        'status' => 'required'
     ]);

     $pinjaman = new Pinjaman();
     $pinjaman->barang_id  = $request->nama;
     $pinjaman->nama_peminjam = $request->nama_peminjam;
     $pinjaman->tanggal_peminjaman = $request->tanggal_pinjaman;
     $pinjaman->status = $request->status;
     $pinjaman->save();
   }

   public function deleted($id){

        $pinjaman = Pinjaman::where('id', $id);
        $pinjaman->delete();
   }
}
