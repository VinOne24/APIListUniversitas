<?php
    require("koneksi.php");
    
    $perintah = "SELECT * FROM tbl_universitas";
    $eksekusi = mysqli_query($konek, $perintah);
    
    $cek = mysqli_affected_rows($konek);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Data tersedia";
        $response["data"] = array();
        
        while($ambil = mysqli_fetch_object($eksekusi)){
            $temp["id"] = $ambil->id;
            $temp["nama"] = $ambil->nama;
            $temp["lokasi"] = $ambil->lokasi;
            $temp["urlmap"] = $ambil->urlmap;
            $temp["akreditasi"] = $ambil->akreditasi;
            $temp["no_tlpn"] = $ambil->no_tlpn;
            $temp["detail"] = $ambil->detail;
            
            array_push($response["data"], $temp);
        }
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Data tidak tersedia";
    }
    
    echo json_encode($response);
    mysqli_close($konek);