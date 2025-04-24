<?php
// Set zona waktu
date_default_timezone_set('Asia/Jakarta');
$tgl = date('Y-m-d H:i:s');

// Koneksi database
$HOSTNAME = "localhost";
$DATABASE  = "db_maintenance_lab";
$email  = "root";
$PASSWORD  = "";

$KONEKSI = mysqli_connect($HOSTNAME, $email, $PASSWORD, $DATABASE);

if (!$KONEKSI) {
    die("Koneksi error bozz!!! " . mysqli_connect_error());
}

//fungsi autonumber
function autonumber($tabel, $kolom, $lebar = 0, $awalan)
{
    global $KONEKSI;

    $auto = mysqli_query($KONEKSI, "SELECT $kolom FROM $tabel WHERE $kolom LIKE '$awalan%' ORDER BY $kolom DESC LIMIT 1") or die(mysqli_error($KONEKSI));
    $jumlah_record = mysqli_num_rows($auto);

    if ($jumlah_record == 0) {
        $nomor = 1;
    } else {
        $row = mysqli_fetch_array($auto);
        $nomor = intval(substr($row[0], strlen($awalan))) + 1;
    }

    if ($lebar > 0) {
        $angka = $awalan . str_pad($nomor, $lebar, "0", STR_PAD_LEFT);
    } else {
        $angka = $awalan . $nomor;
    }
    return $angka;
}
//echo autonumber ("tbl_users", "id_user", 3 , "USR");


//fungsi register
function registrasi($data)
{
    global $KONEKSI;
    global $tgl;

    $id_user = stripslashes($data['id_user']);
    $nama = stripslashes($data['nama']); //untuk cek form register dari nama
    $email = strtolower(stripslashes($data['email'])); //memastikan form register mengirim input email berupa huruf kecil semua
    $password = mysqli_real_escape_string($KONEKSI, $data['password']);
    $password2 = mysqli_real_escape_string($KONEKSI, $data['password2']);


    //echo $nama."|".$email."|".$password."|".$password2;

    //cek email yang di input belum di database 

    $result = mysqli_query($KONEKSI, "SELECT email from tbl_users WHERE email='$email'");
    //var_dump($result);

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('email yang anda input sudah ada di database.');
                    </script>";
        return false;
    }

    //cek konfirmasi password 
    if ($password !==   $password2) {
        echo "<script>
                    alert('konfirmasi password!! password tidak sesuai');
                    document.location.href='register.php';
                    </script>";
        return false;
    }

    //enkripsi password yang akan masukkan ke database 
    $password_hash = password_hash($password, PASSWORD_DEFAULT); // menggunakan algoritma dari hash 
    //var_dump($password_hash);

    //ambil id_tipe_user yg ada di tbl_tipe_user

    $tipe_user = "SELECT * FROM tbl_tipe_user WHERE tipe_user='Admin' ";
    $hasil = mysqli_query($KONEKSI, $tipe_user);
    $row = mysqli_fetch_assoc($hasil);
    $id = $row['id_tipe_user'];

    //tambahkan user baru ke tbl_users
    $sql_users = "INSERT INTO tbl_users SET 
                            id_user = '$id_user',
                            role = '$id',
                            email = '$email',
                            password = '$password_hash',
                            create_at = '$tgl'";

    mysqli_query($KONEKSI, $sql_users) or die("gagal menambahkan user" . mysqli_error($KONEKSI));

    //tambahkan user baru ke tbl_admin
    $sql_admin  = "INSERT INTO tbl_admin SET
                    id_user = '$id_user',
                    nama_admin = '$nama',
                    create_at = '$tgl' ";

    mysqli_query($KONEKSI, $sql_admin) or die("gagal menambahkan user" . mysqli_error($KONEKSI));


    echo "<script>
                document.location.href='login.php';
                </script>";

    return mysqli_affected_rows($KONEKSI);
}

//fungsi login
function login($username, $password)
{
    global $KONEKSI;

    $query = "SELECT u.id_user, u.password, t.nama_tipe 
              FROM tbl_users u
              JOIN tbl_tipe_user t ON u.id_tipe = t.id_tipe
              WHERE u.username = '$username'";

    $result = mysqli_query($KONEKSI, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['user_id'] = $row['id_user'];
            $_SESSION['role'] = $row['nama_tipe'];
            return $row['nama_tipe'];
        }
    }
    return false;
}

// FUNGSI LOGOUT
// ===========================
function logout()
{
    session_start();
    session_destroy();
    header("Location: login.php");
    exit();
}

function tampil($DATA)
{ {
        global $KONEKSI;

        $HASIL = mysqli_query($KONEKSI, $DATA);
        $row = []; //menyiapkan variabel / wadah yang masih kosong untuk nantinya akan kita gunakan untuk menyimpan data yang kita query / panggil dari database

        while ($row = mysqli_fetch_assoc($HASIL)) {
            $rows[] = $row; //kita masukkan datanya disini
        }
        return $rows; // kita kembalikan nilainya, di munculkan
    }
}

//fungsi upload file menggunakan parameter
function upload_file_new($data, $file, $target)
{
    //inisialisasi elemen dari foto/file
    $namaFile   = $file['Photo']['name'];
    $ukuranFile = $file['Photo']['size'];
    $error      = $file['Photo']['error'];
    $tmpName    = $file['Photo']['tmp_name'];
    $tipeFile   = $file['Photo']['type'];

    $kode  = htmlspecialchars($data['kode']);

    //debug buat element $data dan $file
    echo "<pre>";
    print_r($data); //melihat data yg akan di terima
    print_r($file); //melihat file yg akan di terima
    echo "</pre>";

    //pastikan bahwa user melakukan upload file
    if ($error == UPLOAD_ERR_NO_FILE) {
        echo "<script>alert('Tidak ada file yang di upload!');
                    </script>";
        return false;
    }

    //validasi ekstensi file
    $ekstensiValid = ['jpeg', 'jpg', 'bmp', 'png'];
    $ekstensifile  = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if (!in_array($ekstensifile, $ekstensiValid)) {
        echo "<script>alert('File yang anda upload bukan gambar!');
                    </script>";
        return false;
    }

    //validasi ukuran gambar
    if ($ukuranFile > 1 * 1024 * 1024) {
        echo "<script>alert('Ukuran file tidak boleh dari 1MB!');
                    </script>";
        return false;
    }

    //membuat nama file baru yang uniq
    $id_random = uniqid();
    $namaFileBaru = $kode . "_" . $id_random . "." . $ekstensifile;

    $file_path = $target . $namaFileBaru;

    //cek apakah file sudah terupload
    if (move_uploaded_file($tmpName, $file_path)) {
        echo "<script>alert('Fle berhasil di upload!');
                    </script>";
        return $namaFileBaru;
    } else {
        echo "<script>alert('gagal upload file!');
                    </script>";
        return false;
    }
}

//fungsi tambah admin
function tambah_admin($data, $file, $target)
{
    global $KONEKSI;
    global $tgl;

    $kode            = htmlspecialchars($data['kode']);
    $nama_admin    = htmlspecialchars($data['nama_admin']);
    $email           = htmlspecialchars($data['email']);
    $telepon           = htmlspecialchars($data['telepon']);
    $role            = htmlspecialchars($data['role']);
    $password        = mysqli_escape_string($KONEKSI, $data['password']);
    $password2       = mysqli_escape_string($KONEKSI, $data['password2']);

    //var_dump($cabang);
    //die;
    //var_dump($_POST);
    //var_dump($_FILES);

    //die;
    //pastikan gambar terupload
    $gambar_foto = upload_file_new($data, $file, $target);

    //var_dump($gambar_foto);
    //die;

    //jika gambar tidak di upload operasi di hentikan
    if (!$gambar_foto) {
        return false;
    }

    //cek email yg di daftar apakah sudah dipakai atau belum 
    $result = mysqli_query($KONEKSI, "SELECT email FROM tbl_users WHERE email = '$email' ");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('email sudah ada di database :3');
                    document.location.href='?pages=user_admin';
                    </script>";

        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                    alert('konfirmasi email yg di input tidak sama !!!');
                    document.location.href='?pages=user_admin';
                    </script>";
        return false;
    }

    //kita lakukan enkipsi password yang dia input
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan data user baru ke tbl_users
    $sql_user = "INSERT INTO tbl_users SET 
                            id_user = '$kode',
                            email = '$email',
                            password = '$password_hash',
                            role = '$role',
                            create_at = '$tgl' ";

    mysqli_query($KONEKSI, $sql_user) or die("gagal menambahkan user baru") .  mysqli_errno($KONEKSI);

    //tambah data user baru ke tbl admin
    $sql_users = "INSERT INTO tbl_admin SET 
                            nama_admin = '$nama_admin',
                            telepon_admin = '$telepon',
                            path_photo_admin = '$gambar_foto',
                            id_user = '$kode',
                            create_at = '$tgl' ";

    mysqli_query($KONEKSI, $sql_users) or die("gagal menambahkan admin baru" . mysqli_errno($KONEKSI));
    return mysqli_affected_rows($KONEKSI);
}

//fungsi edit admin
function edit_admin($data, $file, $target)
{
    global $KONEKSI;
    global $tgl;

    $id_admin = htmlspecialchars($data['kode']);
    $nama_admin = htmlspecialchars($data['nama_admin']);
    $email = htmlspecialchars($data['email']);
    $telepon = htmlspecialchars($data['telepon']);
    $foto_lama = htmlspecialchars($data['photo_db']);

    $cek_file_lama = $target . $foto_lama;

    //cek apakah ada file baru yg di upload oleh server
    if (isset($_FILES['Photo']) && $_FILES['Photo']['error'] !== UPLOAD_ERR_NO_FILE) {

        //kita harus upload file
        $gambar_foto = upload_file_new($data, $file, $target);
        echo $gambar_foto;

        //kita pastikan nama file baru ter upload (debugging)
        echo "File Baru :" . $gambar_foto . "Berhasil Di Upload";

        //kita pastikan file lama di hapuskan (unlink)

        //cek dulu file lama di db apakah ada di folder target
        if ($gambar_foto && file_exists($cek_file_lama)) {
            if (unlink($cek_file_lama)) {
                //true ==> berhasil hapus file lama
                echo "file lama berhasil di hapus";
            } else {
                echo "gagal menghapus file lama";
            }
        }
    } else {
        //jika tidak ada file baru, gunakan gambar lama
        $gambar_foto = $foto_lama;
        echo "menggunakan foto lama: " . $foto_lama;
    }


    //update edit data ke tbl_petugas
    $sql_user_petugas = "UPDATE tbl_admin SET 
                                    nama_admin         = '$nama_admin',
                                    telepon_admin      = '$telepon',
                                    path_photo_admin   = '$gambar_foto',
                                    update_at            = '$tgl' WHERE id_user = '$id_admin' ";

    if (mysqli_query($KONEKSI, $sql_user_petugas)) {
        echo "<script>
                    alert('data berhasil di update')
                    </script>";
    } else {
        echo "<script>
                    alert('gagal update data')
                    </script>";
    }

    return mysqli_affected_rows($KONEKSI);
}

// fungsi hapus admin
function hapus_admin()
{
    global $KONEKSI;
    $id_user = $_GET['id'];

    // hapus file gambar yang usernya kita hapus
    $sql = "SELECT * FROM tbl_admin WHERE id_user='$id_user' " or die("Data tidak ditemukan" . mysqli_error($KONEKSI));
    $hasil = mysqli_query($KONEKSI, $sql);
    $row = mysqli_fetch_assoc($hasil);

    $photo = $row['path_photo_admin'];
    $target = '../images/admin/';

    if (!$photo == "") {
        // Jika ada maka kita hapus
        unlink($target . $photo);
    }


    // hapus data di tabel admin
    $query_admin = "DELETE FROM tbl_admin WHERE id_user='$id_user' ";
    mysqli_query($KONEKSI, $query_admin) or die("Gagal melakukan hapus data admin" . mysqli_error($KONEKSI));

    // hapus data di tabel users
    $query_user = "DELETE FROM tbl_users WHERE id_user='$id_user' ";
    mysqli_query($KONEKSI, $query_user) or die("Gagal melakukan hapus data user" . mysqli_error($KONEKSI));


    return mysqli_affected_rows($KONEKSI);
}
