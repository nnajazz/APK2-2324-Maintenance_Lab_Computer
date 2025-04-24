<?php
@$pages = $_GET['pages'];
switch ($pages) {

    case 'tampil':
        include "../pages/master/tampil.php";
        break;

    case 'dashboard':
        include "../pages/master/dashboard.php";
        break;

    case 'tambah':
        include "../pages/master/form.php";
        break;

    case 'profile':
        include "../pages/master/profile.php";
        break;

    case 'invoice':
        include "../pages/master/print.php";
        break;

    case 'user_admin':
        include "../pages/user admin/user_admin.php";
        break;

    case 'setting':
        include "../pages/setting/update.php";
        break;

    case 'user_petugas':
        include "../pages/user petugas/user_petugas.php";
        break;

    case 'lab':
        include "../pages/lab/lab.php";
        break;

    case 'user_laborant':
        include "../pages/user laborant/user_laborant.php";
        break;

    case 'user_kordinator':
        include "../pages/user kordinator/user_kordinator.php";
        break;

    case 'proses_update':
        include "../pages/master/proses_update.php";
        break;

    case 'tahun_ajaran':
        include "../pages/tahun ajaran/tahun_ajaran.php";
        break;

    case 'jurusan':
        include "../pages/jurusan/jurusan.php";
        break;

    default:
        include "../pages/master/dashboard.php";
        break;
}
?>