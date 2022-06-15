@extends('layouts.main')
@section('content')
<button type="button" class="btn btn-primary" style="margin-left: 88%; width:12%;" data-toggle="modal" data-target="#tambahdata">Tambah Data</button>
<div class="card" style="margin-top: 3%">

 <div class="card-body">
    <table id="datatables">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Nama Barang</th>
            <th>Tanggal Peminjaman</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      @foreach ($pinjamans as $item)    
      <tr>
          <td>{{ $i }}</td>
          <td>{{ $item->nama_peminjam }}</td>
          <td>{{ $item->nama }}</td>
          <td>{{ $item->tanggal_peminjaman }}</td>
          @if ($item->status === 1)
          <td class="text-success">Telah Di Kemblikan</td>
          @else
          <td class="text-danger">Belum Di Kembalikan</td>
          @endif
          <td>
              <i class='fas fa-pen fa-12x' style='color:#1b6aea'  data-toggle="modal" data-target="#tambahdata"></i> |
              <i class='fas fa-trash-alt fa-12x' style='color:#ff0505' data-id="" onclick="deletedpinjama()"></i>
          </td>
      </tr>
      @endforeach
    </tbody>
    </table>
</div>
</div>
@section('body')
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peminjam</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('tambahdata') }}" method="post" id="buatubah" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInput">Nama Peminjam</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Peminjam">
            </div>
            <div class="form-group">
                <label for="exampleInput">Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama_barang" placeholder="Nama Barang">
              </div>
            <div class="form-group">
              <label for="exampleInput">Tanggal Peminjaman</label>
              <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" placeholder="Tanggal Peminjan">
            </div>
            <div class="form-group">
              <label for="exampleInput">Tanggal Pengembalian</label>
              <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal pembgembalian" placeholder="Tanggal Pengembalian">
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
@endsection