<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;
class PinjamanController extends Controller
{
   
   
    public function index()
    {
      $data = DB::table('pinjamen')->join('barangs','pinjamen.barang_id', '=' , 'barangs.id')
              ->select('pinjamen.id','barangs.nama','pinjamen.nama_peminjam','pinjamen.tanggal_peminjaman','pinjamen.status')->get();

      $barang = Barang::all();
      return view('pinjaman.index',[
         "pages" => "Data Pinjaman",
         "title" => "Pinjaman",
         "pinjamans" => $data,
         "barangs" => $barang,
         "PDF" => "allPDF"
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
   public function edit(Request $request, $id)
   {
      $pinjaman = Pinjaman::find($id);
      $pinjaman->barang_id  = $request->barang_id;
      $pinjaman->nama_peminjam = $request->nama_peminjam;
      $pinjaman->tanggal_peminjaman = $request->tanggal_peminjaman;
      $pinjaman->status = $request->status;
      $pinjaman->save();
    
      Alert::success('Congrats','data pinjaman berhasil di edit');
      return redirect('/pinjaman');
   }
   public function getDatapinjamanByid($id)
   {
      $pinjaman = Pinjaman::where('id', $id)->get();
      echo json_encode($pinjaman);
   }
   public function retunred()
   {
      $pinjaman = DB::table('pinjamen')->join('barangs','pinjamen.barang_id', '=' , 'barangs.id')
                  ->select('pinjamen.id','barangs.nama','pinjamen.nama_peminjam','pinjamen.tanggal_peminjaman','pinjamen.status')->where('pinjamen.status', 1)->get();
      $barang = Barang::all();
      return view('pinjaman.index',[
          "pages" => "Data Pinjaman",
          "title" => "Retutned",
          "pinjamans" => $pinjaman,
          "barangs" => $barang,
          "breadcrumb" => "Retutned",
          "PDF" => "retunredPDF"
      ]);
   }
   public function restored()
   {
      $pinjaman = DB::table('pinjamen')->join('barangs','pinjamen.barang_id', '=' , 'barangs.id')
      ->select('pinjamen.id','barangs.nama','pinjamen.nama_peminjam','pinjamen.tanggal_peminjaman','pinjamen.status')->where('pinjamen.status', 0)->get();
      $barang = Barang::all();
      return view('pinjaman.index',[
      "pages" => "Data Pinjaman",
      "title" => "Restored",
      "pinjamans" => $pinjaman,
      "barangs" => $barang,
      "breadcrumb" => "Restored",
      "PDF" => "restoredPDF"
      ]);
   }
   public function allPDF()
   {
      $data = DB::table('pinjamen')->join('barangs','pinjamen.barang_id', '=' , 'barangs.id')
                  ->select('pinjamen.id','barangs.nama','pinjamen.nama_peminjam','pinjamen.tanggal_peminjaman','pinjamen.status')->get();
      $pdf = PDF::loadView('pinjaman.pdf.all',['data' => $data]);
      return $pdf->download('pinjaman.pdf');
   }
   public function retunredPDF()
   {
      $data =  DB::table('pinjamen')->join('barangs','pinjamen.barang_id', '=' , 'barangs.id')
      ->select('pinjamen.id','pinjamen.nama_peminjam','pinjamen.tanggal_peminjaman','barangs.nama','pinjamen.status')
      ->where('pinjamen.status',1)->get();
      $pdf = PDF::loadView('pinjaman.pdf.all',['data' => $data]);
      return $pdf->download('pinjaman.pdf');
   }
   public function restoredPDF()
   {
      $data =  DB::table('pinjamen')->join('barangs','pinjamen.barang_id', '=' , 'barangs.id')
            ->select('pinjamen.id','pinjamen.nama_peminjam','pinjamen.tanggal_peminjaman','barangs.nama','pinjamen.status')
            ->where('pinjamen.status',0)->get();
      $pdf = PDF::loadView('pinjaman.pdf.all',['data' => $data]);
      return $pdf->download('pinjaman.pdf');
   } 
}
