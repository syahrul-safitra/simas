
// javascript code:
$(document).ready(function () {
   console.log('ini berhasil?');

   // get btn-delete-instansi : 
   $('.btn-delete-instansi').on('click', function (e) {
      e.preventDefault();

      // get data => href;
      const data = $(this).data('id');

      swal({
         title: "Apakah anda yakin?",
         text: "Data instansi akan dihapus",
         icon: "warning",
         buttons: true,
         dangerMode: true,
      })
         // jika tombol yes maka pergi ke location href :
         .then((willdelete) => {
            if (willdelete) {
               document.location.href = data;
            }
         })

   })
});