@extends('layouts.main')
@section('content')

<div class="add section-lead mb-12">
   <a href="{{ route('tambah_data') }}" class="btn btn-primary" style="margin-left: 85%;">Tambah Barang</a>
   <div class="container" style="margin-top: -5%; margin-left:-5%;">
<div class="section-body">
    <h2 class="section-title">Data Barang</h2>
    <p class="section-lead">Data Barang Yang Ada Diruang Tollman</p>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <article class="article">
              <div class="article-header">
                <div class="article-image" data-background="../assets/img/news/mobo.jpg">
                </div>
                <div class="article-title">
                  <h2><a href="#">Motherboard</a></h2>
                </div>
              </div>
              <div class="article-details">
                <p>Jumlah Barang : 10 <br>
                 Jumlah Yang Terpinjam : 2  <br>
                 Sisa Barang : 8 
                <div class="article-cta">
                  <a href="#" class="btn btn-danger">Delete</a>
                  <a href="#" class="btn btn-success">Update</a>
                </div>
              </div>
            </article>
          </div>
      <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <article class="article">
          <div class="article-header">
            <div class="article-image" data-background="../assets/img/news/mobo.jpg">
            </div>
            <div class="article-title">
              <h2><a href="#">Motherboard</a></h2>
            </div>
          </div>
          <div class="article-details">
            <p>Jumlah Barang : 10 <br>
             Jumlah Yang Terpinjam : 2  <br>
             Sisa Barang : 8 
            <div class="article-cta">
              <a href="#" class="btn btn-danger">Delete</a>
              <a href="#" class="btn btn-success">Update</a>
            </div>
          </div>
        </article>
      </div>
    </div>
@endsection