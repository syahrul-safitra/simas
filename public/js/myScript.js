
// javascript code:
$(document).ready(function () {
   console.log('ini berhasil?');

   // get btn-delete-instansi : 
   $('.btn-delete-suratmasuk').on('click', function (e) {
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

   });

   $('.btn-delete-instansi2').on('click', function (e) {

      console.log('testingg');
      e.preventDefault();

      // get data href ;
      const data = $(this).data('id');

      swal({
         title: 'Apakah anda yakin?',
         text: 'Data surat masuk akan dihapus',
         icon: 'warning',
         buttons: true,
         dangerMode: true,
      })
         // jika btn ok di klik : 
         .then((willdelete) => {
            if (willdelete) {
               document.location.href = data;
            }
         })
   })
});