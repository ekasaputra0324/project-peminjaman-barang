// $('.deleteddata').click(function () { 
//     // e.preventDefault();
//     console.log('oke');
    
// });
function deleted() {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
         window.location = '/deleted'
        } else {
          swal("Your imaginary file is safe!");
        }
      });
}
