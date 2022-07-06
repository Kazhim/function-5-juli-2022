<?php

include 'koneksi.php';
//harga
$hargaAyam = 3000;
$hargaAyamGoreng = 11000;
$hargaAyamPanggang = 4000;
 
//form pembelian
if(!isset($_POST['proses']) && !isset($_POST['bayar'])){
 echo '
 <center>
 <h1>PEMBELIAN</h1>
 <p><i>silahkan masukkan jumlah pembelian</p>
 <form action="" method="POST">
 <table>
 <tr><td>Ayam Bakar</td><td><input type="text" name="p1"></td></tr>
 <tr><td>Ayam Goreng</td><td><input type="text" name="p2"></td></tr>
 <tr><td>Ayam Panggang</td><td><input type="text" name="p3"></td></tr>
 <tr><td></td><td><input type="submit" name="proses" value="proses"></td></tr>
 </table>
 </form>
 </center>';
 
//jumlah bayar
}elseif(isset($_POST['proses'])){
  function sumTotal($kon, $ayam, $ayamGoreng, $ayamPanggang) {
    $ayamb = $_POST['p1'] * $ayam;
    $ayamg = $_POST['p2'] * $ayamGoreng;
    $ayamp = $_POST['p3'] * $ayamPanggang;
    $total = $ayamb+$ayamg+$ayamp;

    $sql="INSERT INTO tb_pembelian (ayam,ayam_goreng,ayam_panggang,total_bayar) VALUES ('$ayamb','$ayamg','$ayamp','$total')";
    $hasil=mysqli_query($kon,$sql);

    echo '
    <center>
    <h1>JUMLAH BAYAR & KEMBALIAN</h1>
    <p><i>silahkan masukkan uang pembayaran</p>
    <form action="" method="POST">
    <table>
    <tr><td>Total Bayar</td><td><input type="text" name="totalBayar" value="'.$total.'"></td></tr>
    <tr><td>Jumlah Uang</td><td><input type="text" name="jumlahUang"></td></tr>
    <tr><td></td><td><input type="submit" name="bayar" value="bayar"></td></tr>
    </table>
    </form>
    </center>';
  }

  sumTotal($kon,$hargaAyam,$hargaAyamGoreng,$hargaAyamPanggang);
 

//jumlah bayar,jumlah uang,kembali
}elseif(isset($_POST['bayar'])){
 $totalBayar = $_POST['totalBayar'];
 $jumlahUang = $_POST['jumlahUang'];
 $kembalian = $jumlahUang - $totalBayar;

 echo '
 <center>
 <h1>JUMLAH BAYAR & KEMBALIAN</h1>
 <form action="" method="POST">
 <table>
 <tr><td>Total Bayar</td><td><input type="text" name="totalBayar" value="'.$totalBayar.'" readonly></td></tr>
 <tr><td>Jumlah Uang</td><td><input type="text" name="jumlahuang" value="'.$jumlahUang.'" readonly></td></tr>
 <tr><td>Kembali</td><td><input type="text" name="jumlahuang" value="'.$kembalian.'" readonly></td></tr>
 </table>
 </form>
 </center>';
}
?>