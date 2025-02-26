<?php
session_start();
require_once 'function.php';
//cek session
if (@$_SESSION['email']) {
    if (@$_SESSION['level'] == "Admin") {
        header("location:../admin/index.php");
    } elseif (@$_SESSION['level'] == "Laborant") {
        header("location:../laborant/index.php");
    } elseif (@$_SESSION['level'] == "Kordinator") {
        header("location:../kordinator/index.php");
    } elseif (@$_SESSION['level'] == "Petugas") {
        header("location:../petugas/index.php");
    }
}



//cek login 
//jika tombol sign in (login) di tekan maka akan mengirim variabel yang ada di form login yaitu usernamae (email) dan password 

if (isset($_POST['login'])) {
    $email = strtolower(stripslashes($_POST['email'])); // email yang di input oleh user
    $userpass = mysqli_real_escape_string($KONEKSI, $_POST['password']); // password yang di input oleh user

    //lalu kita query ke database
    $sql = mysqli_query($KONEKSI, "SELECT password, role FROM tbl_users WHERE email='$email' ");

    list($paswd, $role) = mysqli_fetch_array($sql);

    //echo $role;
    //ambil level role/user  sedang login
    $tipe_user = "SELECT * FROM tbl_tipe_user WHERE id_tipe_user='$role'";
    $hasil = mysqli_query($KONEKSI, $tipe_user);
    $row = mysqli_fetch_assoc($hasil);
    $level = $row['tipe_user'];
    //echo $level;

    //jika data di temukan dalam database maka akan melakukan proses validasi dengan menggunakan password_verify
    if (mysqli_num_rows($sql) > 0) {
        /*jika ada data (>0) maka kita lakukan validasi
    $userpass ==> di ambil dari form input yang di lakukan oleh user
    $passwd ==> password yang ada di database dalam bentuk HASH
    */
        if (password_verify($userpass, $paswd)) {
            //akan kita buat session
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['level'] = $level;

            /*
        jika berhasil login, maka user akan kita arah kan ke halaman admin sesuai dengan level user 
        jika dia level admin ===> admin/index.php
        jika dia level petugas ===> petugas/index.php
        jika dia level penyewa ===> penyewa/index.php
        */

            if ($_SESSION['level'] == "Admin") {
                header("location:../admin/index.php");
            } elseif ($_SESSION['level'] == "Laborant") {
                header("location:../laborant/index.php");
            } elseif ($_SESSION['level'] == "Kordinator") {
                header("location:../kordinator/index.php");
            } elseif ($_SESSION['level'] == "Petugas") {
                header("location:../petugas/index.php");
            }
            die();
        } else {
            echo '<script language="javascript">
                window.alert("LOGIN GAGAL!!!, harap isi email / password dengan benar.");
                window.document.location.href="login.php";
            </script>';
        }
    } else {
        echo '<script language="javascript">
                window.alert("LOGIN GAGAL, email yang anda masukkan tidak di temukan.");
                window.document.location.href="login.php";
            </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="light scroll-smooth group" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg" data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky" data-content="fluid" dir="ltr">


<!-- Mirrored from themesdesign.in/tailwick/html/auth-login-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Oct 2024 14:29:09 GMT -->

<head>

    <meta charset="utf-8">
    <title>Sign In | Tailwick - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <!-- Layout config Js -->
    <script src="../assets/js/layout.js"></script>
    <!-- Icons CSS -->

    <!-- Tailwind CSS -->


    <link rel="stylesheet" href="../assets/css/tailwind2.css">
</head>

<body class="flex items-center justify-center min-h-screen py-16 lg:py-10 bg-slate-50 dark:bg-zink-800 dark:text-zink-100 font-public">

    <div class="relative">
        <div class="absolute hidden opacity-50 ltr:-left-16 rtl:-right-16 -top-10 md:block">
            <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 125 316" width="125" height="316">
                <title>&lt;Group&gt;</title>
                <g id="&lt;Group&gt;">
                    <path id="&lt;Path&gt;" class="fill-custom-100/50 dark:fill-custom-950/50" d="m23.4 221.8l-1.3-3.1v-315.3l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-100 dark:fill-custom-950" d="m31.2 229.6l-1.3-3.1v-315.3l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-200/50 dark:fill-custom-900/50" d="m39 237.4l-1.3-3.1v-315.3l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-200/75 dark:fill-custom-900/75" d="m46.8 245.2l-1.3-3.1v-315.3l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-200 dark:fill-custom-900" d="m54.6 253.1l-1.3-3.1v-315.4l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-300/50 dark:fill-custom-800/50" d="m62.4 260.9l-1.2-3.1v-315.4l1.2 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-300/75 dark:fill-custom-800/75" d="m70.3 268.7l-1.3-3.1v-315.4l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-300 dark:fill-custom-800" d="m78.1 276.5l-1.3-3.1v-315.3l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-400/50 dark:fill-custom-700/50" d="m85.9 284.3l-1.3-3.1v-315.3l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-400/75 dark:fill-custom-700/75" d="m93.7 292.1l-1.3-3.1v-315.3l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-400 dark:fill-custom-700" d="m101.5 299.9l-1.3-3.1v-315.3l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-500/50 dark:fill-custom-600/50" d="m109.3 307.8l-1.3-3.1v-315.4l1.3 3.1z" />
                </g>
            </svg>
        </div>

        <div class="absolute hidden -rotate-180 opacity-50 ltr:-right-16 rtl:-left-16 -bottom-10 md:block">
            <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 125 316" width="125" height="316">
                <title>&lt;Group&gt;</title>
                <g id="&lt;Group&gt;">
                    <path id="&lt;Path&gt;" class="fill-custom-100/50 dark:fill-custom-950/50" d="m23.4 221.8l-1.3-3.1v-315.3l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-100 dark:fill-custom-950" d="m31.2 229.6l-1.3-3.1v-315.3l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-200/50 dark:fill-custom-900/50" d="m39 237.4l-1.3-3.1v-315.3l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-200/75 dark:fill-custom-900/75" d="m46.8 245.2l-1.3-3.1v-315.3l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-200 dark:fill-custom-900" d="m54.6 253.1l-1.3-3.1v-315.4l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-300/50 dark:fill-custom-800/50" d="m62.4 260.9l-1.2-3.1v-315.4l1.2 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-300/75 dark:fill-custom-800/75" d="m70.3 268.7l-1.3-3.1v-315.4l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-300 dark:fill-custom-800" d="m78.1 276.5l-1.3-3.1v-315.3l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-400/50 dark:fill-custom-700/50" d="m85.9 284.3l-1.3-3.1v-315.3l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-400/75 dark:fill-custom-700/75" d="m93.7 292.1l-1.3-3.1v-315.3l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-400 dark:fill-custom-700" d="m101.5 299.9l-1.3-3.1v-315.3l1.3 3.1z" />
                    <path id="&lt;Path&gt;" class="fill-custom-500/50 dark:fill-custom-600/50" d="m109.3 307.8l-1.3-3.1v-315.4l1.3 3.1z" />
                </g>
            </svg>
        </div>

        <div class="mb-0 w-screen lg:mx-auto lg:w-[500px] card shadow-lg border-none shadow-slate-100 relative">
            <div class="!px-10 !py-12 card-body">
                <a href="#!">
                    <img src="../assets/images/logo-light.png" alt="" class="hidden h-6 mx-auto dark:block">
                    <img src="../assets/images/logo-dark.png" alt="" class="block h-6 mx-auto dark:hidden">
                </a>

                <div class="mt-8 text-center">
                    <h4 class="mb-1 text-custom-500 dark:text-custom-500">Welcome Back !</h4>
                    <p class="text-slate-500 dark:text-zink-200">Sign in to continue to Tailwick.</p>
                </div>

                <form method="POST">
                    <form action="https://themesdesign.in/tailwick/html/index.html" class="mt-10" id="signInForm">
                        <div class="hidden px-4 py-3 mb-3 text-sm text-green-500 border border-green-200 rounded-md bg-green-50 dark:bg-green-400/20 dark:border-green-500/50" id="successAlert">
                            You have <b>successfully</b> signed in.
                        </div>
                        <div class="mb-3">
                            <label for="username" class="inline-block mb-2 text-base font-medium">UserName / Email ID</label>
                            <input type="text" id="username" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter username or email" name="email">
                            <div id="username-error" class="hidden mt-1 text-sm text-red-500">Please enter a valid email address.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="inline-block mb-2 text-base font-medium">Password</label>
                            <input type="password" id="password" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter password" name="password">
                            <!--<div id="password-error" class="hidden mt-1 text-sm text-red-500">Password must be at least 8 characters long and contain both letters and numbers.</div>-->
                        </div>

                        <!--<div class="mb-4">
                            <label for="inputTypeUser" class="">Type User</label>
                            <select class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" 
                            id="inputTypeUser"  
                            name="type_user" 
                            onchange="tipeUser(this.value);" 
                            required>
                            <option selected="" disabled="" value="">Select Type User..</option>
                            <option value="1">Admin</option>
                            <option value="2">Petugas</option>
                            <option value="3">Karyawan</option>
                            <option value="4">Owner</option>
                            <option value="5">Penyewa</option>
                        </select>
                    </div>

                    <div class="mb-4" id="x_branch" style="display:none;">
                        <label for="ddlBranch" class="">Cabang Apartement</label>
                        <select class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" 
                        id="ddlBranch" 
                        name="branch" 
                        required>
                        <option selected="" disabled="" value="">Pilih Cabang...</option>
                        <option value="1">Cabang 1</option>
                        <option value="2">Cabang 2</option>
                        <option value="3">Cabang 3</option>
                    </select>
                </div>-->

                        <div>
                            <div class="flex items-center gap-2">
                                <input id="checkboxDefault1" class="border rounded-sm appearance-none size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400" type="checkbox" value="">
                                <label for="checkboxDefault1" class="inline-block text-base font-medium align-middle cursor-pointer">Remember me</label>
                            </div>
                            <div id="remember-error" class="hidden mt-1 text-sm text-red-500">Please check the "Remember me" before submitting the form.</div>
                        </div>
                        <div class="mt-10">
                            <button type="submit" name="login" class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Sign In</button>
                        </div>

                        <div class="relative text-center my-9 before:absolute before:top-3 before:left-0 before:right-0 before:border-t before:border-t-slate-200 dark:before:border-t-zink-500">
                            <h5 class="inline-block px-2 py-0.5 text-sm bg-white text-slate-500 dark:bg-zink-600 dark:text-zink-200 rounded relative">Sign In with</h5>
                        </div>

                        <div class="flex flex-wrap justify-center gap-2">
                            <button type="button" class="flex items-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 active:text-white active:bg-custom-600 active:border-custom-600"><i data-lucide="facebook" class="size-4"></i></button>
                            <button type="button" class="flex items-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-white btn bg-orange-500 border-orange-500 hover:text-white hover:bg-orange-600 hover:border-orange-600 focus:text-white focus:bg-orange-600 focus:border-orange-600 active:text-white active:bg-orange-600 active:border-orange-600"><i data-lucide="mail" class="size-4"></i></button>
                            <button type="button" class="flex items-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-white btn bg-sky-500 border-sky-500 hover:text-white hover:bg-sky-600 hover:border-sky-600 focus:text-white focus:bg-sky-600 focus:border-sky-600 active:text-white active:bg-sky-600 active:border-sky-600"><i data-lucide="twitter" class="size-4"></i></button>
                            <button type="button" class="flex items-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-white btn bg-slate-500 border-slate-500 hover:text-white hover:bg-slate-600 hover:border-slate-600 focus:text-white focus:bg-slate-600 focus:border-slate-600 active:text-white active:bg-slate-600 active:border-slate-600"><i data-lucide="github" class="size-4"></i></button>
                        </div>

                        <div class="mt-10 text-center">
                            <p class="mb-0 text-slate-500 dark:text-zink-200">Don't have an account ? <a href="register.php" class="font-semibold underline transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500"> SignUp </a> </p>
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>

    <script src='../assets/libs/choices.js/public/assets/scripts/choices.min.js'></script>
    <script src="../assets/libs/%40popperjs/core/umd/popper.min.js"></script>
    <script src="../assets/libs/tippy.js/tippy-bundle.umd.min.js"></script>
    <script src="../assets/libs/simplebar/simplebar.min.js"></script>
    <script src="../assets/libs/prismjs/prism.js"></script>
    <script src="../assets/libs/lucide/umd/lucide.js"></script>
    <script src="../assets/js/tailwick.bundle.js"></script>
    <script src="../assets/js/pages/auth-login.init.js"></script>

    <script type="text/javascript">
        function tipeUser(val) {
            var branchDiv = document.getElementById("x_branch");

            if (val === '1') { // When Admin is selected
                branchDiv.style.display = "block";
            } else {
                branchDiv.style.display = "none";
            }
        }
    </script>


</body>


<!-- Mirrored from themesdesign.in/tailwick/html/auth-login-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Oct 2024 14:29:10 GMT -->

</html>