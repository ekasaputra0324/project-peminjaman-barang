function validate(){
    swal({
        title: "Are you sure logout?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = '/logout'
        } ..
      });
}