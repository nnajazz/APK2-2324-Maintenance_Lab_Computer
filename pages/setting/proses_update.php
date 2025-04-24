<?php
ob_start();
require_once "../inc/function.php";

$id_setting      = htmlspecialchars($_POST["kode"]);
$nama_lab        = htmlspecialchars($_POST["nama_lab"]);
$nama_perusahaan = htmlspecialchars($_POST["nama_perusahaan"]);
$email        = htmlspecialchars($_POST["email"]);
$laborant        = htmlspecialchars($_POST["laborant"]);
$alamat          = htmlspecialchars($_POST["alamat"]);
$kecamatan        = htmlspecialchars($_POST["kecamatan"]);
$kota        = htmlspecialchars($_POST["kota"]);
$provinsi        = htmlspecialchars($_POST["provinsi"]);
$telepon        = htmlspecialchars($_POST["telepon"]);

//var_dump($_POST);
//var_dump ($_FILES);
//die;
//$GAMBAR     = $_FILES['Photo']['tmp_name']; //untuk menangkap data file

if ($id_setting == "" || $nama_lab  == "" || $nama_perusahaan == "" || $alamat == "" || $laborant == "" || $email == "" || $kecamatan == "" || $kota == "" || $provinsi == "" || $telepon == "") {
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
    if (update_setting($_POST) > 0) {
        echo "<script>alert('Data berhasil di tambahkan!');
        document.location.href = 'index.php?pages=setting'
        </script>";
        }
    else {

        echo "<script>alert('Data gagal di tambahkan!');
        document.location.href = 'index.php?pages=setting'
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

<meta http-equiv="refresh" content="0.5; url=index.php?pages=setting">