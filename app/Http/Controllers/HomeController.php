<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index',[
            "title" => "Home",
             "pages" => "Data Barang"
        ]);
    }
    public function FromTambahData()
    {
       return view('home.from-tambah-data',[
              "title" => "From",
              "pages" => "Tambah Data Barang"
       ]);
    }
}
