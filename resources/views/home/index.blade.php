@extends('layouts.main')
@section('content')

<div class="add section-lead mb-12">
  <button type="button" class="btn btn-primary tambahdata" data-toggle="modal" data-target="#tambahdata" style="margin-left: 85%">
   Tambah Barang
  </button>
  <div class="container" style="margin-top:-5%; margin-left:-3%;">
  <div class="section-body">
    <h2 class="section-title">Barang</h2>
    <p class="section-lead">Data Barang Yang Ada Di Ruang Tollman</p>
    <div class="row">
      @foreach ($barangs as $barang)
      <?php  $id = $barang->id; ?>     
      <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <article class="article">
          <div class="article-header">
            <div class="article-image" data-background="{{ asset('storage/'. $barang->image) }}">
            </div>
            <div class="article-title">
              <h2><a href="#">{{ $barang->nama }}</a></h2>
            </div>
          </div>
          <div class="article-details">
            <p>Jumlah Barang : {{ $barang->jumlah_barang }} <br> 
              <?php $total = 0; ?>
              {{-- @foreach ($pinjamans[$id] as $pinjaman) --}}
            
              Jumlah Yang Terpinjam : {{ 0 }} <br>
              {{-- @endforeach --}}
               Sisa Barang : 0
           </p>
            <div class="article-cta">
              <a href="#" class="btn btn-danger" onclick="deleted({{ $barang->id }})" >Hapus</a>
              <a href="#" class="btn btn-warning update" data-id="{{ $barang->id }}"  data-toggle="modal" data-target="#tambahdata" >Edit</a>
            </div>
          </div>
        </article>
      </div>
      @endforeach
    </div>
  </div>

    {{-- modal --}}
  @section('body')
  <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data  Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('tambahdata') }}" method="post" id="buatubah" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInput">Nama Barang</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang" required>
            </div>
            <div class="form-group">
              <label for="exampleInput">Foto Barang</label>
              <input type="file" class="form-control" id="image" name="image" placeholder="Nama Barang" required>
            </div>
            <div class="form-group">
              <label for="exampleInput">Jumlah Barang</label>
              <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Jumlah Barang" required>
            </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  @endsection
  @section('script')
  <script src="../assets/js/barang.js"></script>
  @endsection
@endsection