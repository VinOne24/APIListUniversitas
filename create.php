<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nama = $_POST["nama"];
    $lokasi = $_POST["lokasi"];
    $urlmap = $_POST["urlmap"];
    $akreditasi = $_POST["akreditasi"];
    $no_tlpn = $_POST["no_tlpn"];
    $detail = $_POST["detail"];
    
    $perintah = "INSERT INTO tbl_universitas (nama, lokasi, urlmap, akreditasi, no_tlpn, detail) VALUES('$nama','$lokasi','$urlmap','$akreditasi','$no_tlpn', '$detail')";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);
    
    if($cek>0){
        $response["kode"] = 1 ;
        $response["pesan"] = "Tambah Data Sukses" ;
    }
    else{
        $response["kode"] = 0 ;
        $response["pesan"] = "Tambah Data Gagal" ;
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}
echo json_encode($response);
mysqli_close($konek);