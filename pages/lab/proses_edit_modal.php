<?php
ob_start();
require_once "../inc/functions.php";

$kode_branch          = stripslashes($_POST['kode']);
$nama_perusahaan      = stripslashes($_POST['nama_cab']);
$alamat_perusahaan    = stripslashes($_POST['alamat']);
$email_perusahaan     = stripslashes($_POST['email']);
$telepon_perusahaan   = stripslashes($_POST['telepon']);
$kecamatan_perusahaan = stripslashes($_POST['kecamatan']);
$kota_perusahaan      = stripslashes($_POST['kota']);
$provinsi_perusahaan  = stripslashes($_POST['provinsi']);
$foto_lama            = stripslashes($_POST['photo_db']);
$kode_pos             = stripslashes($_POST['kodepos']);  

$target = '../image/logo/';
 
//var_dump($_POST);
//var_dump ($_FILES);
//die;
//$GAMBAR     = $_FILES['Photo']['tmp_name']; //untuk menangkap data file

if ($kode_branch == "" || $nama_perusahaan == "" || $alamat_perusahaan == "" || $email_perusahaan == "" || $telepon_perusahaan =="" || $kecamatan_perusahaan == "" || $kota_perusahaan =="" || $provinsi_perusahaan =="" || $foto_lama == "" || $kode_pos == "") {
    ?>
    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2 mb-8" style="border-width: 1px;">
        <div class="d-flex align-items-center">
            <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i></div>
            <div class="ms-3">
                <h6 class="mb-0 text-white">Danger Alerts</h6>
                <div class="text-white">tidak berhasil mengedit data, lengkapi datanya</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php

} else {
    if (isset($foto_lama)) {
        var_dump($_FILES['Photo']);
       if (edit_mobranch($_POST, $_FILES, $target)> 0) {
        echo "<script>alert('Data berhasil di tambahkan!');
        document.location.href = 'index.php?pages=branch'
        </script>";
       }

    } else {

        echo "<script>alert('Data gagal di tambahkan!');
        document.location.href = 'index.php?pages=branch'
        </script>"; 
        echo "<br>";
        echo mysqli_error($KONEKSI);
    
    }

?>
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class="bx bxs-check-circle"></i></div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Success Alerts</h6>
                    <div class="text-white">Data berhasil di edit</div>
                </div> 
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

<?php 
}
?>

<meta http-equiv="refresh" content="0.5; url=index.php?pages=branch">