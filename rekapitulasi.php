<?php include "header.php"?>
<!-- Awal Row -->
<div class ="row">
    <!-- Awal col-md-12 -->
    <div class="col-md-12">
        <!-- Awal Card -->
    <div class="card-body">
                          <!-- DataTales Example -->
                    <div class="card shadow mb-4 mt-3 ">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-black">Rekapitulasi Pengunjung</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="" class="text-center">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Dari Tanggal</label>
                                        <input class="form-control" type="date" name="tanggal1" value="<?= isset($_POST['tanggal1'])? $_POST['tanggal1']: date('Y-m-d')?>"required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Hingga Tanggal</label>
                                        <input class="form-control" type="date" name="tanggal2"value="<?= isset($_POST['tanggal1'])? $_POST['tanggal2']: date('Y-m-d')?>"required>
                                    </div>
                                </div>
                        </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-2">
                                    <button class="btn btn-info form-control" name="btampilkan"><i class="fa fa-search"></i>Tampilkan</button>
                                </div>
                                <div class="col-md-2">
                                    <a href="admin.php"class="btn btn-danger form-control"><i class="fa fa-backward"></i>Kembali</a>
                            </div>
                        </form>

                        <?php 
                            if(isset($_POST['btampilkan'])) :
                        
                        ?>
                        </div>
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pengunjung</th>
                                            <th>Alamat</th>
                                            <th>Tujuan</th>
                                            <th>No.Hp</th>
                                             <th>No.Kamar</th>
                                            
                                        </tr>
                                        <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Nama Pengunjung</th>
                            <th>Alamat</th>
                            <th>Tujuan</th>
                            <th>No.Hp</th>
                         <th>No.Kamar</th>
                            
                        </tr>
                        </tfoot>
                                        
                                    </thead>
                                    <tbody>
                                    <?php
                                        
                                        $tgl1 = $_POST['tanggal1']; 
                                        $tgl2 = $_POST['tanggal2'];    



                                            $tampil = mysqli_query($koneksi,"SELECT*FROM tamu 
                                            where tanggal BETWEEN '$tgl1' and '$tgl2' order by id desc");
                                            $no = 1;
                                            while($data =mysqli_fetch_array($tampil)) {
                                        
                                        ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><?=$data['tanggal']?></td>
                                            <td><?=$data['nama']?></td>
                                            <td><?=$data['alamat']?></td>
                                            <td><?=$data['tujuan']?></td>
                                            <td><?=$data['nope']?></td>
                                            <td><?=$data['nokamar']?></td>
                                            
                                        </tr>


                                       
                                        <?php } ?>
                                       
                                    </tbody>
                                </table>
                                
                                <center>
                                    <form method="POST" action="exportexcel.php">
                                        <div class="col-md-4">
                                        <input type="hidden" name="tanggala" value="<?= @$_POST['tanggall']?>">
                                        <input type="hidden" name="tanggalb" value="<?= @$_POST['tanggal2']?>">

                                        <button class="btn btn-success form-control" name="bexport"><i class="fa fa-download"></i>Export Data Excel</button>
                                    </div>
                                    

                                </center>
                                                                


                            </div>

                            <?php endif; ?>
                    </div> 
                    <!-- end Card -->
    </div>
    <!-- Akhir col-md-12 -->

</div>
<!-- Akhir Row -->

<?php include "footer.php"; ?>