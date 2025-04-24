<?php 
@$page =$_GET['aksi'];
switch ($page) {
    case 'tampil':
        include "tampil.php";
        break;
        
    case 'tambah':
        include "tambah.php";
        break;

    case 'edit':
        include "edit.php";
        break;

    case 'proses_edit':
        include "proses edit.php";
        break;
    
    case 'hapus':
        include "hapus.php";
        break;

    case 'proses_hapus':
        include "proses_hapus.php";
        break;

    case 'view':
        include "view.php";
        break;
    

        default:
        include "tampil.php";
        break;

}
?>