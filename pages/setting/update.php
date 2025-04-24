<?php
$sql = tampil("SELECT `tbl_setting`.*FROM `tbl_setting`");
$tampil = $sql;

foreach ($tampil as $user) {
    $id_setting      = $user['id_setting'];
    $nama_lab        = $user['nama_lab'];
    $nama_perusahaan = $user['nama_perusahaan'];
    $email           = $user['email'];
    $laborant        = $user['laborant'];
    $alamat          = $user['alamat'];
    $kecamatan        = $user['kecamatan'];
    $kota        = $user['kota'];
    $provinsi        = $user['provinsi'];
    $telepon        = $user['telepon'];
    $photo           = $user['path_photo_setting'];
}


?>

<div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Setting</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="#!" class="text-slate-400 dark:text-zink-200">Forms</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Forms Validation
                    </li>
                </ul>
            </div>
            <?php
            if (isset($_POST['updatedata'])) {
                include "proses_update.php";
            }
            ?>
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-15">Data Lab Komputer</h6>
                    <form method="post" enctype="multipart/form-data" action="#">
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-6">
                            <div class="mb-4">
                                <label for="firstNameInput2" class="inline-block mb-2 text-base font-medium">Nama Perusahaan<span class="text-red-500"></span></label>
                                <input type="hidden" id="inputIdAdmin" name="kode" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="<?= $id_setting; ?>" readonly>
                                <input type="text" id="firstNameInput2" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter Name" value="<?= $nama_perusahaan; ?>" name="nama_perusahaan" required>
                            </div>
                            <div class="mb-4">
                                <label for="lastNameInput2" class="inline-block mb-2 text-base font-medium">Email<span class="text-red-500"></span></label>
                                <input type="text" id="lastNameInput2" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter Address" value="<?= $email; ?>" name="email" required>
                            </div>
                            <div class="mb-4">
                                <label for="lastNameInput2" class="inline-block mb-2 text-base font-medium">Nama Lab<span class="text-red-500"></span></label>
                                <input type="text" id="lastNameInput2" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter Address" value="<?= $nama_lab; ?>" name="nama_lab" required>
                            </div>
                            <div class="mb-4">
                                <label for="UsernameInput" class="inline-block mb-2 text-base font-medium">Penanggung Jawab Lab<span class="text-red-500"></span></label>
                                <input type="text" id="UsernameInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Number Telephone" value="<?= $laborant; ?>" name="laborant" required>
                            </div>
                            <div class="mb-4">
                                <label for="cityInput" class="inline-block mb-2 text-base font-medium">Alamat <span class="text-red-500"></span></label>
                                <input type="text" id="cityInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter city" value="<?= $alamat; ?>" name="alamat" required>
                            </div>
                            <div class="mb-4">
                                <label for="lastNameInput2" class="inline-block mb-2 text-base font-medium">Kecamatan<span class="text-red-500"></span></label>
                                <input type="text" id="lastNameInput2" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter Address" value="<?= $kecamatan; ?>" name="kecamatan" required>
                            </div>
                            <div class="mb-4">
                                <label for="lastNameInput2" class="inline-block mb-2 text-base font-medium">Kota<span class="text-red-500"></span></label>
                                <input type="text" id="lastNameInput2" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter Address" value="<?= $kota; ?>" name="kota" required>
                            </div>
                            <div class="mb-4">
                                <label for="lastNameInput2" class="inline-block mb-2 text-base font-medium">Provinsi<span class="text-red-500"></span></label>
                                <input type="text" id="lastNameInput2" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter Address" value="<?= $provinsi; ?>" name="provinsi" required>
                            </div>
                            <div class="mb-4">
                                <label for="lastNameInput2" class="inline-block mb-2 text-base font-medium">No Telepon<span class="text-red-500"></span></label>
                                <input type="text" id="lastNameInput2" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter Address" value="<?= $telepon; ?>" name="telepon" required>
                            </div>
                        </div>
                        <button type="submit" name="updatedata" class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">
                            Perbarui
                        </button>
                    </form>

                    <?php
                    if (isset($_POST['updatelogo'])) {
                        include "proses_updatelogo.php";
                    }

                    // Pastikan $photo didefinisikan sebelum digunakan
                    $photo = isset($photo) ? $photo : '';

                    if (empty($photo)) {
                        echo "<script>alert('Variabel \$photo kosong!');</script>";
                    }
                    ?>

                    <form method="post" enctype="multipart/form-data" action="#">
                        <div class="grid grid-cols-2 gap-5">
                            <!-- Kolom Pertama -->
                            <div class="grid items-center grid-cols-1 gap-5 xl:grid-cols-1">
                                <label for="zipInput" class="inline-block mb-2 text-base font-medium">Logo Perusahaan</label>

                                <!-- Pastikan hanya nama file yang dikirim -->
                                <input type="hidden" id="inputIdAdmin" name="kode" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="<?= $id_setting; ?>" readonly>
                                <input type="hidden" name="photo_db" value="<?= !empty($photo) ? basename($photo) : ''; ?>">

                                <?php if (!empty($photo)) : ?>
                                    <img src="../../images/setting/<?= basename($photo); ?>" width="200px">
                                <?php else : ?>
                                    <p class="text-red-500">Tidak ada logo saat ini.</p>
                                <?php endif; ?>

                                <input type="file" class="cursor-pointer form-file form-file-sm border-slate-200 mt-2" name="Photo">

                                <button type="submit" name="updatelogo" class="text-white btn bg-custom-500 border-custom-500">
                                    Perbarui Photo
                                </button>
                            </div>
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