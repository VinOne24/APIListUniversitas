<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $lokasi = $_POST["lokasi"];
    $urlmap = $_POST["urlmap"];
    $akreditasi = $_POST["akreditasi"];
    $no_tlpn = $_POST["no_tlpn"];
    $detail = $_POST["detail"];
    
    
    $perintah = "UPDATE tbl_universitas SET nama='$nama', lokasi='$lokasi', urlmap='$urlmap',akreditasi='$akreditasi', no_tlpn='$no_tlpn', detail='$detail' WHERE id='$id'";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);
    
    if($cek>0){
        $response["kode"] = 1 ;
        $response["pesan"] = "Ubah Data Sukses" ;
    }
    else{
        $response["kode"] = 0 ;
        $response["pesan"] = "Ubah Data Gagal" ;
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}
echo json_encode($response);
mysqli_close($konek);