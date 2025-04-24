<?php 
require_once "../inc/function.php";

$target = '../images/petugas/';
//pastikan parameter id diambil dari url bukan dr post
//biasanya kita menggunakan post kalau dari data form sprti edit, tp klau delete id bukan post lebih menggunakan id array asotivive

$data = ['id' => $_GET ['id']];
//jadi, baris $data = ['id' => $_GET ['id']]; membuat array asosiatif $data di mana:
//$data = ['id'] berisi nilai yg diambil dari $_GET ['id'], yakni nilai parameter id yg dikirim melalui URL


//hapus cabang dengan menggunakan data id yg diambil dr url
if (hapus_petugas($data, $target)) {
    echo "<script>
    alert('Data berhasil di hapus');
    document.location.href='index.php?pages=user_petugas';
    </script>";
} else {
    echo "<script>
    alert('Data tidak berhasil di hapus');
    document.location.href='index.php?pages=user_petugas';
    </script>";
    echo "<br>";
    echo mysqli_error($KONEKSI);
}


?>
<meta http-equiv="refresh" content="0.5; url=index.php?pages=user_petugas">