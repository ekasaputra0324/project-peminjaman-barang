@extends('layouts.main')
@section('content')

<div class="add section-lead mb-12">
  <button type="button" class="btn btn-primary tambahdata" data-toggle="modal" data-target="#tambahdata" style="margin-left: 85%">
   Tambah Barang
  </button>
   <div class="container" style="margin-top: -5%; margin-left:-5%;">
<div class="section-body">
    <h2 class="section-title">Data Barang</h2>
    <p class="section-lead">Data Barang Yang Ada Diruang Tollman</p>
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
              <a href="#" class="btn btn-danger deleteddata" onclick="deleted()">Delete</a>
              <a href="#" data-toggle="modal" data-target="#tambahdata"  class="btn btn-success">Update</a>
            </div>
          </div>
        </article>
      </div>
    </div>
    {{-- modal --}}
  @section('body')
  <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data  Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="exampleInput">Nama Barang</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
            </div>
            <div class="form-group">
              <label for="exampleInput">Jumlah Barang</label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Jumlah Barang">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  @endsection
  @section('script')
  <script src="../assets/js/delete.js"></script>
  @endsection
@endsection