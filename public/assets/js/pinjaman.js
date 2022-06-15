function deletedpinjaman(id){
    swal({
        title: "Apakah anda yakin?",
        text: "Jika anda menghapus data ini akan dihapus secara permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = '/deletedpinjaman/'.concat(id) 
        } 
      });
}
$('.tambahpinjaman').click(function () { 
    // e.preventDefault();
    $('#exampleModalLabel').html('Tambah Data Pinjaman');
    $('.modal-footer button[type=submit]').html('save');
    $('#barang_id').val(null)
    $('#tanggal_peminjaman').val(null)
    $('#status').val(null);
    $('#nama_peminjam').val(null);
    $('#buatubahpinjaman').attr('action', '/tambahpinjaman');
    
});
$('.updatepinjaman').click(function () { 
    $('#exampleModalLabel').html('Edit Data Pinjaman');
    $('.modal-footer button[type=submit]').html('save');
    var id = $(this).attr('data-id');
    console.log(id);
    $('#buatubahpinjaman').attr('action', '/updatepinjaman/'.concat(id));
    $.ajax({
        type: "get",
        url: "/getdatapinjamanByid/".concat(id),
        dataType: "json",
        success: function (data) {
            var pinjaman = data[0];
            $('#barang_id').val(pinjaman.barang_id)
            $('#tanggal_peminjaman').val(pinjaman.tanggal_peminjaman)
            $('#status').val(pinjaman.status);
            $('#nama_peminjam').val(pinjaman.nama_peminjam);
        }
    });
    
});
