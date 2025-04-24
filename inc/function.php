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
