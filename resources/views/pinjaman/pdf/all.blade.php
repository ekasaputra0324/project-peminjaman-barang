<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Data Peminjaman Barang</h2>

<table>
  <tr>
    <th>No.</th>
    <th>Nama Peminjam</th>
    <th>Nama Barang</th>
    <th>Tanggal Peminjaman</th>
    <th>Status Peminjaman</th>
  </tr>
  <?php $i = 1; ?>
  @foreach ($data as $item)    
  <tr>
    <td>{{ $i }}</td>
    <td>{{ $item->nama_peminjam }}</td>
    <td>{{ $item->nama }}</td>
    <td>{{ $item->tanggal_peminjaman }}</td>
    @if ($item->status === 0)
    <td style="color: red">Belum Di Kembaikan</td>   
    @else
    <td style="color:green">Sudah Di Kembaikan</td>
    @endif
  </tr>
  <?php $i++ ?>
  @endforeach
</table>

</body>
</html>
