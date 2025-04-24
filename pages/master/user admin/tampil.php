<div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Datatable</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="?pages=dashboard" class="text-slate-400 dark:text-zink-200">Dashboard</a>
                    </li>
                    <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="?pages=user_admin&aksi=tampil" class="text-slate-400 dark:text-zink-200">Tampil admin</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Tampil admin
                    </li>
                </ul>
            </div>


            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-15">Tampil admin</h6>
                    <div class="mb-3">

                        <a href="?pages=user_admin&aksi=tambah" class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100" id="addRow">Tambah Biasa</a>

                        <!--ini bagian tambah modaaaaal-->
                        <button data-modal-target="extraLargeModal" type="button" class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:focus:ring-custom-400/20 mb-4">Tambah Modal</button>

                        <button data-print="extraLargeModal" type="button" class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:focus:ring-custom-400/20 mb-4">Print</button>

                        <div id="extraLargeModal" modal-center class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="mb-4 text-15">Tambah User admin</h6>
                                    <form action="#!">
                                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-6 row g-3">
                                            <div class="col-xxl-15">
                                                <label for="firstNameInput2" class="inline-block mb-2 text-base font-medium">Isi Nama Lengkap Admin <span class="text-red-500"></span></label>
                                                <input type="text" id="firstNameInput2" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter First Name" value="" required>
                                            </div>
                                            <div class="col-xxl-15">
                                                <label for="lastNameInput2" class="inline-block mb-2 text-base font-medium">Email <span class="text-red-500"></span></label>
                                                <input type="text" id="lastNameInput2" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter Last Name" value="Bethany" required>
                                            </div>
                                            <div class="col-xxl-15">
                                                <label for="UsernameInput" class="inline-block mb-2 text-base font-medium">Password <span class="text-red-500"></span></label>
                                                <input type="text" id="UsernameInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Username" required>
                                            </div>
                                            <div class="col-xxl-15">
                                                <label for="UsernameInput" class="inline-block mb-2 text-base font-medium">Confirm Password <span class="text-red-500"></span></label>
                                                <input type="text" id="UsernameInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Username" required>
                                            </div>
                                            <div class="col-xxl-15">
                                                <label for="cityInput" class="inline-block mb-2 text-base font-medium">No Telephone <span class="text-red-500"></span></label>
                                                <input type="text" id="cityInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter city" required>
                                            </div>
                                            <div class="col-xxl-15">
                                                <label for="zipInput" class="inline-block mb-2 text-base font-medium">Photo User </label>

                                                <input type="file" class="cursor-pointer form-file form-file-sm border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 mt-2">
                                            </div>
                                        </div>
                                        <div class="flex justify-end gap-2 mt-3">
                                            <button type="button" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10"><i data-lucide="x" class="inline-block size-4"></i> <span class="align-middle"><a href="?pages=user_admin&aksi=tampil">Cancel</a></span></button>
                                            <button type="submit" class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <table id="tableDynamically" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Nama admin</th>
                                <th>Telepon Admin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = tampil("SELECT tbl_admin.*, tbl_users.*, tbl_tipe_user.* FROM tbl_admin LEFT JOIN tbl_users ON tbl_admin.id_user = tbl_users.id_user LEFT JOIN tbl_tipe_user ON tbl_users.role = tbl_tipe_user.id_tipe_user");


                            $tampil = $sql;
                            $no = 1;
                            foreach ($tampil as $user) :
                                //var_dump($tampil);
                                //die;
                            ?>
                                <tr>
                                    <td><?= $user['id_user']; ?></td>
                                    <td class=""><a class="product-list-img" href="javascript: void (0);">
                                            <img src="../../../images/admin/<?= $user['path_photo_admin']; ?>" style="width: 100px;" alt="User"></a>
                                    </td>
                                    <td><?= $user['nama_admin']; ?></td>
                                    <td><?= $user['telepon_admin']; ?></td>

                                    <td class="">
                                        <details>
                                            <summary>⋮</summary>
                                            <a href="?pages=user_admin&aksi=view&id=<?php echo $user['id_user']; ?>">View</a><br>
                                            <a href="#" data-bs-toggle="modal" data-modal-target="extraLargeModall<?= $user['id_user'];  ?>">View Modal</a><br>
                                            <a href="?pages=user_admin&aksi=edit&id=<?php echo $user['id_admin']; ?>">Edit</a><br>
                                            <a href="#">Edit Modal</a><br>
                                            <a href="?pages=user_admin&aksi=hapus&id=<?php echo $user['id_user']; ?>">Delete</a><br>
                                        </details>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div><!--end card-->

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