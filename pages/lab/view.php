<?php
$id = $_GET['id'];
//require_once "../inc/functions.php";

//mencari data berdasar id yang di kirim oleh form edit
$sql = "SELECT * FROM tbl_branch WHERE kode_branch = '$id' ";

$edit = mysqli_query($KONEKSI, $sql);
while ($row = mysqli_fetch_assoc($edit)) {
    $kode_branch          = $row['kode_branch'];
    $nama_perusahaan      = $row['nama_perusahaan'];
    $alamat_perusahaan    = $row['alamat_perusahaan'];
    $email_perusahaan     = $row['email_perusahaan'];
    $telepon_perusahaan   = $row['telepon_perusahaan'];
    $kecamatan_perusahaan = $row['kecamatan_perusahaan'];
    $kota_perusahaan      = $row['kota_perusahaan'];
    $provinsi_perusahaan  = $row['provinsi_perusahaan'];
    $foto                 = $row['path_logo'];
    $kode_pos             = $row['kode_pos'];
}
//echo $id_user;

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
                    <a href="?pages=branch&aksi=tampil" class="text-slate-400 dark:text-zink-200">Tampil User Admin</a>
                </li>
                <li class="text-slate-700 dark:text-zink-100">
                    Tambah Biasa
                </li>
            </ul>
        </div>

        <?php
        if (isset($_POST ['editdata'])) {
            include "proses_edit.php";
        }
        ?>

        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">Form Edit</h6>
                <form method="post" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-6">
                        <div class="mb-4">
                            <label for="inputIdAdmin" class="inline-block mb-2 text-base font-medium">Branch ID<span class="text-red-500"></span></label>
                            <input type="text" id="inputIdAdmin" name="kode" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="<?= $kode_branch; ?>"  placeholder="Id " readonly>
                        </div>
                        <div class="mb-4">
                            <label for="inputNamaAdmin" class="inline-block mb-2 text-base font-medium">Nama Cabang<span class="text-red-500"></span></label>
                            <input type="text" id="inputNamaAdmin" name="nama_cab" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Isi Nama" value="<?= $nama_perusahaan; ?>" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="inputEmail4" class="inline-block mb-2 text-base font-medium">Alamat<span class="text-red-500"></span></label>
                            <input type="text" id="inputAlamat" name="alamat" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Isi Alamat" value="<?= $alamat_perusahaan; ?>" readonly>
                        </div>
                        
                        <div class="mb-4">
                            <label for="inputTelepon" class="inline-block mb-2 text-base font-medium">Email Perusahaan <span class="text-red-500"></span></label>
                            <input type="email" id="inputEmail" name="email" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Isi Email" value="<?= $email_perusahaan; ?>" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="inputTelepon" class="inline-block mb-2 text-base font-medium">Telepon <span class="text-red-500"></span></label>
                            <input type="number" id="inputTelepon" name="telepon" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Isi Telepon" value="<?= $telepon_perusahaan; ?>" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="inputPassword" class="inline-block mb-2 text-base font-medium">Kecamatan<span class="text-red-500"></span></label>
                            <input type="text" id="inputKecamatan" name="kecamatan" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Isi Kecamatan" value="<?= $kecamatan_perusahaan; ?>" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="inputPassword2" class="inline-block mb-2 text-base font-medium">Kota<span class="text-red-500"></span></label>
                            <input type="text" id="inputKota" name="kota" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Isi Kota" value="<?= $kota_perusahaan; ?>" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="inputPassword2" class="inline-block mb-2 text-base font-medium">Provinsi<span class="text-red-500"></span></label>
                            <input type="text" id="inputProvinsi" name="provinsi" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Isi Provinsi" value="<?= $provinsi_perusahaan; ?>" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="inputPassword2" class="inline-block mb-2 text-base font-medium">Kode Pos<span class="text-red-500"></span></label>
                            <input type="number" id="inputKodePos" name="kodepos" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Isi Kota" value="<?= $kode_pos; ?>" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlFile1">Photo User</label><br>
                            <input type="hidden" name="photo_db" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="<?= $foto; ?>">
                            
                            <img src="../image/logo/<?php echo $foto; ?>" width="100px">

                        </div>
                        </div>
                        
                    </div>
                    
                </form>
            </div>
        </div>




    </div>
    <!-- container-fluid -->

<!-- End Page-wrapper -->

<footer class="ltr:md:left-vertical-menu rtl:md:right-vertical-menu group-data-[sidebar-size=md]:ltr:md:left-vertical-menu-md group-data-[sidebar-size=md]:rtl:md:right-vertical-menu-md group-data-[sidebar-size=sm]:ltr:md:left-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:md:right-vertical-menu-sm absolute right-0 bottom-0 px-4 h-14 group-data-[layout=horizontal]:ltr:left-0  group-data-[layout=horizontal]:rtl:right-0 left-0 border-t py-3 flex items-center dark:border-zink-600">
    <div class="group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl w-full">
        <div class="grid items-center grid-cols-1 text-center lg:grid-cols-2 text-slate-400 dark:text-zink-200 ltr:lg:text-left rtl:lg:text-right">
            <div>
                <script>document.write(new Date().getFullYear())</script> © Tailwick.
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
