<?php
ob_start();
require_once "../inc/function.php";

$id_setting = intval($_POST['kode']); // Pastikan ID berupa angka
$foto_lama = isset($_POST['photo_db']) ? stripslashes($_POST['photo_db']) : '';
$target = '../images/setting/';

// Pastikan file 'Photo' ada dalam $_FILES sebelum mengaksesnya
if (!isset($_FILES['Photo']) || $_FILES['Photo']['error'] == UPLOAD_ERR_NO_FILE) {
?>
    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2 mb-8">
        <div class="d-flex align-items-center">
            <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i></div>
            <div class="ms-3">
                <h6 class="mb-0 text-white">Peringatan!</h6>
                <div class="text-white">Tidak berhasil mengedit data, lengkapi datanya.</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
} else {
    // Proses update logo
    $foto_baru = update_logo($_POST, $_FILES, $target);

    if ($foto_baru !== false) {
        global $KONEKSI;
        $tgl = date("Y-m-d H:i:s"); // Waktu update terbaru

        $query = "UPDATE tbl_setting SET path_photo_setting = ?, update_at = ? WHERE id_setting = ?";
        $stmt = mysqli_prepare($KONEKSI, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssi", $foto_baru, $tgl, $id_setting);
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Data berhasil diperbarui!');</script>";
            } else {
                echo "<script>alert('Gagal memperbarui database: " . mysqli_error($KONEKSI) . "');</script>";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Query tidak valid: " . mysqli_error($KONEKSI) . "');</script>";
        }

        echo "<script>document.location.href = 'index.php?pages=setting';</script>";
    } else {
        echo "<script>alert('Data gagal diperbarui!'); 
        document.location.href = 'index.php?pages=setting';
        </script>";
    }
}
?>
<meta http-equiv="refresh" content="0.5; url=index.php?pages=setting">