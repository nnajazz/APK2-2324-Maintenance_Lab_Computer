<?php 
require_once "../inc/function.php";
$id = $_GET['id'];
$sql = "SELECT tbl_petugas.*, tbl_users.* FROM tbl_petugas 
	    LEFT JOIN tbl_users ON tbl_petugas.id_user = tbl_users.id_user WHERE tbl_petugas.id_user='$id' ";
$query = mysqli_query($KONEKSI, $sql) or die("Gagal melakukan querry" . mysqli_error($KONEKSI));
$row =  mysqli_fetch_assoc($query);



?>


<div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">        
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
           
           <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-gray-800 text-15 dark:text-white">Hapus Data</h6>
                
                <div class="mb-4">
                    <p>Apakah anda yakin mau menghapus data ini??</p>
                </div>

                <div class="mb-2">
                    
                    
                    <button data-modal-target="defaultModal2" type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Hapus Data</button>
                    <div id="defaultModal2" modal-center class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
                        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600 flex flex-col h-full">
                            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                                <h5 class="text-16">Konfirmasi Hapus</h5>
                                <button data-modal-close="defaultModal2" class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500 dark:text-zink-200 dark:hover:text-red-500"><i data-lucide="x" class="size-5"></i></button>
                            </div>
                            <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                                <p class="text-slate-500 dark:text-zink-200">Apakah anda yakin akan menghapus admin <span style="color: red;"><?php echo $row ['nama_petugas']; ?></span></p>
                                <div class="flex justify-end gap-2">
                                    <a href="?pages=user_petugas" type="reset"  class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Cancel</a>

                                    <a href="?pages=user_petugas&aksi=proses_hapus&id=<?php echo $row['id_user'];  ?>" type="submit" name="Hapus" class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">Hapus</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div><!--end card-->
    </div>
</div>
</div>