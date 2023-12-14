<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Disposisi</title>
</head>

<style>
   * {
      margin: 0;
      padding: 0;
      box-sizing: 0;
   }

   body {
      font-family: Arial, Helvetica, sans-serif;
      background-color: #fff;
      height: 100vh;
   }

   img {
      width: 80px;
   }

   .kop {
      width: 750px;
      margin: 0 auto;
      padding: 20px;
   }

   .tengah {
      text-align: center;
   }

   .table-1 {
      margin: 0 auto;
   }

   .container {
      width: fit-content;
      margin: 0 auto;
   }

   .isi {
      width: 750px;
      margin: 0 auto;
      border: 1px solid black;
   }

   .table-2 {
      width: 750px;
      border-bottom: 2px solid black;
      padding-left: 10px;
      padding-right: 10px;
   }

   .table-3 {
      width: 750px;
      padding-top: 10px;
      padding-left: 10px;
      padding-right: 10px;
   }

   .main {
      display: flex;
   }

   .main div {
      flex-grow: 1;
      border: 1px solid black;
      padding-top: 10px;
      padding-bottom: 10px;
      padding-left: 10px;
      padding-right: 10px;
   }

   .table-4 {
      padding-top: 10px;
      padding-bottom: 10px;
   }

   .end {
      padding-left: 10px;
      padding-right: 10px
   }
</style>

<body>

   <div class="container">
      <div class="kop">
         <table class="table-1">
            <tr>
               <td><img src="img/logo_uin.png" alt=""></td>
               <td style="width: 20px;"></td>

               <td class="tengah">
                  <div class="tengah">
                     <h3>KEMENTRIAN AGAMA RI</h3>
                     <h3>UIN SULTHAN THAHA SAIFUDDIN</h3>
                     <h3>JAMBI</h3>
                  </div>
               </td>
            </tr>
         </table>
         <center>
            <h2 class="text-1" style="padding-top: 10px;">LEMBAR DISPOSISI</h2>
         </center>
      </div>

      <!-- LEMBAR ATAS -->
      <div class="isi">
         <table class="table-2" style="padding-top: 5px; padding-bottom: 5px;">
            <tr>
               <th width="50%"></th>
               <th width="50%"></th>
            </tr>

            <tr>
               <td>Indek Berkas</td>
               <td>Kode</td>
            </tr>
         </table>

         <table class="table-3">
            <tr>
               <th width="20%"></th>
               <th width="3%"></th>
               <th width="77%"></th>
            </tr>

            <tr>
               <td>Tanggal</td>
               <td>:</td>
               <td>8 Desember 2023</td>
            </tr>

            <tr>
               <td>Asal Surat</td>
               <td>:</td>
               <td>Rektor</td>
            </tr>

            <tr>
               <td>Isi Ringkas</td>
               <td>:</td>
               <td>Undangan</td>
            </tr>

            <tr>
               <td>Tanggal Diterima</td>
               <td>:</td>
               <td>02 Desember 2023</td>
            </tr>
         </table>

         <div class="tanggal-penyelesaian" style="padding-top:10px; padding-bottom: 10px; padding-left: 10px;">
            <p>Tanggal Penyelesaian : </p>
         </div>

         <div class="main">
            <div>
               <p>Disampaikan Kepada</p>

               <br>
               <p>1. Yth. Ibu WD1</p>
               <p>1. Yth. Ibu WD1</p>
               <p>1. Yth. Ibu WD1</p>
            </div>

            <div>
               <p>Disampaikan Kepada</p>

               <br>

               <p>Arsipkan</p>
            </div>
         </div>

         <!-- ending -->
         <div class="end">
            <div>
               <p style="padding-top: 10px;">Sudah digunakan harap dikembalikan</p>

               <table class="table-4">
                  <tr>
                     <th width="20%"></th>
                     <th width="3%"></th>
                     <th width="77%"></th>
                  </tr>

                  <tr>
                     <td>Kepada</td>
                     <td>:</td>
                     <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia, autem!</td>
                  </tr>

                  <tr>
                     <td>Tanggal</td>
                     <td>:</td>
                     <td>10 oktober 2023</td>
                  </tr>

                  <tr>
                     <td>Pukul</td>
                     <td>:</td>
                     <td>10:10 WIB</td>
                  </tr>
               </table>
            </div>
         </div>

      </div>

   </div>

</body>

</html>