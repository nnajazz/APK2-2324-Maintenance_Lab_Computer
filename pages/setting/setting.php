<?php
@$page = $_GET['aksi'];
switch ($page) {
    case 'update':
        include "update.php";
        break;

    case 'proses_update':
        include "proses_update.php";
        break;


    default:
        include "update.php";
        break;
}
