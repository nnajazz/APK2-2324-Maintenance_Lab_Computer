<?php
$id = $_GET['id'];


$sql_tipe_user = "SELECT id_tipe_user FROM tbl_tipe_user WHERE tipe_user='Petugas'";
$hasil = mysqli_query($KONEKSI, $sql_tipe_user);
$row = mysqli_fetch_assoc($hasil);

$sql_petugas = "SELECT `tbl_petugas`.*, `tbl_users`.*, `tbl_lab`.* FROM `tbl_petugas` 
	LEFT JOIN `tbl_users` ON `tbl_petugas`.`id_user` = `tbl_users`.`id_user` 
	LEFT JOIN `tbl_lab` ON `tbl_petugas`.`id_lab` = `tbl_lab`.`id_lab` ";

$edit_petugas = mysqli_query($KONEKSI, $sql_petugas);
while ($row = mysqli_fetch_assoc($edit_petugas)) {
    $id_user  = $row['id_petugas'];
    $nama     = $row['nama_petugas'];
    $email    = $row['email'];
    $jenkel     = $row['jenkel'];
    $password = $row['password'];
    $telp     = $row['telepon_petugas'];
    $foto     = $row['path_photo_petugas'];
    $role     = $row['role'];
    $id_lab   = $row['id_lab'];
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
                        <a href="?pages=user_petugas&aksi=tampil" class="text-slate-400 dark:text-zink-200">Tampil Petugas</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Tambah Petugas
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
                    <h6 class="mb-4 text-15">Form Edit Petugas</h6>
                    <form method="post" enctype="multipart/form-data">
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-6">
                            <div class="mb-4">
                                <label for="inputIdPetugas" class="inline-block mb-2 text-base font-medium">ID Petugas<span class="text-red-500"></span></label>
                                <input type="text" id="inputIdPetugas" name="kode" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="<?= $id; ?>" placeholder="Id " readonly>
                            </div>

                            <div class="mb-4">
                                <label for="inputEmail" class="inline-block mb-2 text-base font-medium">Email Perusahaan <span class="text-red-500"></span></label>
                                <input type="email" id="inputEmail" name="email" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Isi Email" value="<?= $email; ?>" readonly>

                                <!--<input type="hidden" name="role" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="<?php echo $row['id_tipe_user']; ?>">-->
                            </div>
                            <div class="mb-4">
                                <label for="inputNamaPetugas" class="inline-block mb-2 text-base font-medium">Nama Petugas<span class="text-red-500"></span></label>
                                <input type="text" id="inputNamaPetugas" name="nama_petugas" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Isi Nama" value="<?= $nama; ?>">
                            </div>
                            <div class="mb-4">
                                <label for="inputTelepon" class="inline-block mb-2 text-base font-medium">Telepon <span class="text-red-500"></span></label>
                                <input type="number" id="inputTelepon" name="telepon" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Isi Telepon" value="<?= $telp; ?>">
                            </div>
                            <!--<div class="mb-3">
                                <label for="password" class="inline-block mb-2 text-base font-medium">Password</label>
                                <input type="password" id="password" name="password" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter password" >
                            </div>
                            <div class="mb-3">
                                <label for="password" class="inline-block mb-2 text-base font-medium">Repeat Password</label>
                                <input type="password" id="password" name="password2" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter password">
                            </div>-->
                            <div class="mb-3 row">
                                <label for="example-text-input" class="inline-block mb-2 text-base font-medium">Jenis Kelamin</label>
                                <div class="col-md-10">
                                    <input class="form-check-input" type="radio" id="regexp-mask" name="jenkel" value="L"
                                        <?php
                                        if ($jenkel == 'L') {
                                            echo 'checked';
                                        }
                                        ?>>
                                    <label class="form-check-label">Laki-Laki</label>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="regexp-mask" name="jenkel" value="P"
                                            <?php
                                            if ($jenkel == 'P') {
                                                echo 'checked';
                                            }
                                            ?>>
                                        <label class="form-check-label">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="inputTypelab" class="">lab</label>
                                <select class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="inputTypelab"
                                    name="nama_lab"
                                    required>
                                    <option selected="" disabled="" value="">Select Type User..</option>
                                    <?php
                                    $SQL_BRANCH = "SELECT * FROM tbl_lab" or die("data tidak di temukan..!!" . mysqli_error($KONEKSI));
                                    $DATA_BRANCH = mysqli_query($KONEKSI, $SQL_BRANCH);

                                    while ($BRANCH = mysqli_fetch_assoc($DATA_BRANCH)) {
                                        if ($id_lab == $BRANCH['id_lab']) {
                                            $SELECT = "selected";
                                        } else {
                                            $SELECT = "";
                                        }

                                        echo '<option ' . $SELECT . ' value="' . $BRANCH['id_lab'] . '"> ' . $BRANCH['nama_lab'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="exampleFormControlFile1" class="inline-block mb-2 text-base font-medium">Photo Petugas <span class="text-red-500"></span></label>
                                <input type="hidden" name="photo_db" value="<?= $foto; ?>">
                                <img src="../images/petugas/<?php echo $foto; ?>" width="100px">

                                <input type="file" id="input-file-max-fs" name="Photo" class="dropify form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-default-file="../image/petugas/value=<? $foto; ?>" data-max-file-size="2M">
                            </div>
                        </div>

                        <div class="flex justify-end gap-2">
                            <button type="button" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10"><i data-lucide="x" class="inline-block size-4"></i> <span class="align-middle">Cancel</span></button>

                            <button type="submit" class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100" name="editdata">Submit</button>
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