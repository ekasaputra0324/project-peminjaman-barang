@extends('layouts.main')
@section('content')
<button type="button" class="btn btn-primary tambahpinjaman" style="margin-left: 88%; width:12%;  " data-toggle="modal" data-target="#tambahdata">Tambah Data</button>
<a href="{{ route($PDF) }}" class="btn btn-danger" style="margin-left: 75%; margin-top:-5%; width:12%;">Convert to PDF</a>
<div class="card" style="margin-bottom: -3%">
 <div class="card-body">
    <table id="datatables">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Nama Barang</th>
            <th>Tanggal Peminjaman</th>
            <th>Status Peminjaman</th>
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
              <i class='fas fa-pen fa-12x updatepinjaman' data-id="{{ $item->id }}" style='color:#1b6aea'  data-toggle="modal" data-target="#tambahdata"></i> |
              <i class='fas fa-trash-alt fa-12x' style='color:#ff0505' data-id="" onclick="deletedpinjaman({{ $item->id }})"></i>
          </td>
      </tr>
      <?php $i++; ?>
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
          <form action="{{ route('tambahpinjaman') }}" method="post" id="buatubahpinjaman" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInput">Nama Peminjam</label>
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" placeholder="Nama Peminjam">
              </div>
              <div class="form-group">
            <label for="barang">Barang</label>
            <select class="form-control" name="barang_id" id="barang_id">
              @foreach ($barangs as $barang)
              <option value="{{ $barang->id }}" >{{ $barang->nama }}</option>
              @endforeach
            </select>
          </div>
            <div class="form-group">
              <label for="exampleInput">Tanggal Peminjaman</label>
              <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" placeholder="Tanggal Peminjan">
            </div>
            <label for="barang">Status Pengembalian</label>
            <select class="form-control" name="status" id="status">
              <option value="0" >Belum Di Kembalikan</option>
              <option value="1" >Sudah Di Kembalikan</option>
            </select>
        
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
<script src="../assets/js/pinjaman.js"></script>
@endsection
@endsection