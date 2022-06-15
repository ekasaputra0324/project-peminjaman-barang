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