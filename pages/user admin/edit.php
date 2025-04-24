<?php
$id = $_GET['id'];
//require_once "../inc/functions.php";

//mencari tipe role
$sql_tipe_user = "SELECT id_tipe_user FROM tbl_tipe_user WHERE tipe_user='Admin'";
$hasil = mysqli_query($KONEKSI, $sql_tipe_user);
$row = mysqli_fetch_assoc($hasil);

//mencari data berdasar id yang di kirim oleh form edit
$sql = "SELECT `tbl_admin`.*, `tbl_users`.* FROM `tbl_admin` 
	LEFT JOIN `tbl_users` ON `tbl_admin`.`id_user` = `tbl_users`.`id_user` ";

$edit = mysqli_query($KONEKSI, $sql);
while ($row = mysqli_fetch_assoc($edit)) {
    $id_user  = $row['id_user'];
    $nama     = $row['nama_admin'];
    $email    = $row['email'];
    $password = $row['password'];
    $telp     = $row['telepon_admin'];
    $foto     = $row['path_photo_admin'];
    $role     = $row['role'];
}
?>

<div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16"></h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="?pages=dashboard" class="text-slate-400 dark:text-zink-200">Dashboard</a>
                    </li>
                    <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="?pages=user_petugas&aksi=tampil" class="text-slate-400 dark:text-zink-200">Tampil Edit Karyawan</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Edit Karyawan
                    </li>
                </ul>
            </div>

            <?php
            if (isset($_POST['editdata'])) {
                include "proses_edit.php";
            }
            ?>

            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-15">Form Edit</h6>
                    <form method="post" enctype="multipart/form-data">
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-6">
                            <div class="mb-4">
                                <label for="inputIdAdmin" class="inline-block mb-2 text-base font-medium">ID Admin<span class="text-red-500"></span></label>
                                <input type="text" id="inputIdAdmin" name="kode" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="<?= $id_user; ?>" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="inputNamaAdmin" class="inline-block mb-2 text-base font-medium">Nama Admin<span class="text-red-500"></span></label>
                                <input type="text" id="inputNamaAdmin" name="nama_admin" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Nama Lengkap Admin" value="<?= $nama; ?>">
                            </div>
                            <div class="mb-4">
                                <label for="inputEmail4" class="inline-block mb-2 text-base font-medium">Email<span class="text-red-500"></span></label>
                                <input type="email" id="inputEmail4" name="email" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Email" value="<?= $email; ?>" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="inputTelepon" class="inline-block mb-2 text-base font-medium">Telepon <span class="text-red-500"></span></label>
                                <input type="number" id="inputTelepon" name="telepon" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Telepon" value="<?= $telp; ?>">
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlFile1">Photo User</label><br>
                                <input type="hidden" name="photo_db" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="<?= $foto; ?>">

                                <img src="../../images/admin/<?php echo $foto; ?>" width="100px">


                                <input type="file" id="input-file-max-fs" name="Photo" class="dropifyform-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-default-file="../image/user/value=<?= $foto; ?>" data-max-file-size="2M">

                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>Upload Picture</p>
                                <div class="login-text text-middle">
                                    <p class="mt-3 text-black">mau ganti password? <a href="../inc/forgot.php" class="">ganti password </a> user admin !</p>
                                </div>
                            </div>

                        </div>

                        <div class="flex justify-end gap-2">
                            <button type="button" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10"><i data-lucide="x" class="inline-block size-4"></i> <span class="align-middle">Cancel</span></button>
                            <button type="submit" class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100" name="editdata">Edit Data</button>
                            <button type="submit" class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">Reset</button>

                        </div>
                    </form>
                </div>
            </div>




        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-wrapper -->

    <footer class="ltr:md:left-vertical-menu rtl:md:right-vertical-menu group-data-[sidebar-size=md]:ltr:md:left-vertical-menu-md group-data-[sidebar-size=md]:rtl:md:right-vertical-menu-md group-data-[sidebar-size=sm]:ltr:md:left-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:md:right-vertical-menu-sm absolute right-0 bottom-0 px-4 h-14 group-data-[layout=horizontal]:ltr:left-0  group-data-[layout=horizontal]:rtl:right-0 left-0 border-t py-3 flex items-center dark:border-zink-600">
        <div class="group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl w-full">
            <div class="grid items-center grid-cols-1 text-center lg:grid-cols-2 text-slate-400 dark:text-zink-200 ltr:lg:text-left rtl:lg:text-right">
                <div>
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Tailwick.
                </div>
                <div class="hidden lg:block">
                    <div class="ltr:text-right rtl:text-left">
                        Design & Develop by Themesdesign
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>