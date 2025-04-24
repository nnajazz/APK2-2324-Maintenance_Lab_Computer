<?php
//ob_start();
//require_once "../inc/functions.php";

$kode   = stripslashes($_POST['kode']);
$nama_admin = stripslashes($_POST['nama_admin']);
$email      = strtolower(stripslashes($_POST['email']));
$telepon      = strtolower(stripslashes($_POST['telepon']));
$role       = stripslashes($_POST['role']);
$password   = mysqli_real_escape_string($KONEKSI, $_POST['password']);
$password2  = mysqli_real_escape_string($KONEKSI, $_POST['password2']);

//var_dump($_POST);
//var_dump ($_FILES);
//die;
//$GAMBAR     = $_FILES['Photo']['tmp_name']; //untuk menangkap data file

$target = '../images/admin/';

if ($kode == "" || $nama_admin == "" || $email == ""  || $telepon == "" || $role == "" || $password == "" || $password2 == "") {

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
    if (tambah_admin($_POST, $_FILES, $target)> 0) {

        echo "<script>alert('Data berhasil di tambahkan!');
        document.location.href = 'index.php?pages=user_admin'
        </script>";

    } else {

        echo "<script>alert('Data gagal di tambahkan! ".mysqli_error($KONEKSI) ." ');
        document.location.href = 'index.php?pages=user_admin'
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

<meta http-equiv="refresh" content="0.5; url=index.php?pages=user_admin">