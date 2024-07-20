
// javascript code:
$(document).ready(function () {
   console.log('ini berhasil?' + ' iya donk');

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

   $('.btn-delete-instansi').on('click', function (e) {

      console.log('testingg');
      e.preventDefault();

      // get data href ;
      const data = $(this).data('id');

      swal({
         title: 'Apakah anda yakin?',
         text: 'Data instansi akan dihapus',
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

   $('#btn-delete-diteruskan').on('click', function (e) {
      e.preventDefault();

      // get data href : 
      const data = $(this).data('id');

      swal({
         title: 'Apakah anda yakin?',
         text: 'Data diteruskan akan dihapus',
         icon: 'warning',
         buttons: true,
         dangerMode: true
      })
         // jika btn ok di klik : 
         .then((willdelete) => {
            if (willdelete) {
               document.location.href = data;
            }
         })
   })

   $('#btn-delete-disposisi').on('click', function (e) {
      e.preventDefault();

      const data = $(this).data('id');

      console.log(data);
      swal({
         title: 'Apakah anda yakin?',
         text: 'Data disposisi akan dihapus',
         icon: 'warning',
         buttons: true,
         dangerMode: true
      })
         // jika btn ok di klik : 
         .then((willdelete) => {
            if (willdelete) {
               document.location.href = data;
            }
         })
   })

   $('#tindak-lanjut').on('change', function () {
      const tujuan = $('#tujuan');

      var data = $(this).val();
      if (data != '') {
         tujuan.val(data);
         tujuan.prop('readonly', true);
      } else {
         tujuan.val('');
         tujuan.prop('readonly', false);
      }
   })

   $('.btn-delete-suratkeluar').on('click', function (e) {

      e.preventDefault();
      const data = $(this).data('id');

      console.log(data);

      swal({
         title: "Apakah anda yakin?",
         text: "Data surat keluar akan dihapus",
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

   $('#search').on('keyup', function (e) {
      e.preventDefault();

      var data = $(this).val();

      const table_data = $('.table-data');

      // ajax : 
      $.ajax({
         url: 'carisuratmasuk/ajax',
         method: 'GET',
         data: { data: data },
         success: function (res) {

            console.log(res);
            table_data.html(res);
            if (res.status == 'nothing_found') {
               table_data.html('<span class="text-danger">' + 'Nothing Found' + '</span>');
            }
         }
      })
   })
});