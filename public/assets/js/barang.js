// const { concat } = require("lodash");

function deleted(id) {
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this imaginary file!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      window.location = '/deleted/'.concat(id) 
    } 
  });
}
// update
$('.update').click(function(){ 
  $('#exampleModalLabel').html('Ubah Data Barang');
  $('.modal-footer button[type=submit]').html('Change');
   id = $(this).attr('data-id');
   $('#buatubah').attr('action', '/ubah_data/'.concat(id));
  console.log(id);
  $.ajax({
    url: "/getbarangByid/".concat(id),
    success: function (data) {
    var data1 = JSON.parse(data);
    var data3 = data1[0]
    console.log(data3.nama);
    $('#nama').val(data3.nama)
    $('#jumlah_barang').val(data3.jumlah_barang)
    $('#image').val();
     
    }
  });
});

$('.tambahdata').click(function(){ 
  $('#exampleModalLabel').html('Tambah Data Barang');
  $('.modal-footer button[type=submit]').html('save');
  $('#nama').val(null)
  $('#jumlah_barang').val(null)
  $('#image').val(null);
  $('#buatubah').attr('action', '/tambah_data');
   
 
});