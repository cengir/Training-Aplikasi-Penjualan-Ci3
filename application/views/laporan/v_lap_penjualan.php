                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Form <?php echo $title?></h4>
                                <form method="post" action="<?php echo base_url()?>index.php/laporan_penjualan" class="form-material m-t-40">
                                    <div class="row col-12">
                                        <div class="col-3">
                                            <label>Kode</label>
                                            <input type="text" class="form-control" name="jual_kode" placeholder="Search by Code" value="<?php if(isset($jual_kode)) echo $jual_kode;?>">
                                        </div>
										<div class="col-3">
											<label for="example-email">From</label>
											<input type="date" class="form-control " name="from_date" placeholder="From Date" value="<?php if(isset($from_date)) echo $from_date;?>"> 
										</div>
										<div class="col-3">
											<label for="example-email">To</label>
											<input type="date" class="form-control " name="to_date" placeholder="To Date" value="<?php if(isset($to_date)) echo $to_date;?>"> 
										</div>
										<div class="col-1" style="margin-top: 20px;">
											<button type="submit" class="btn btn-primary">Filter</button>
										</div>
                                    </div>
                                </form>
                                <div class="row col-12">
                                    <div class="table-responsive m-t-40">
                                        <table id="myTable" width="100%" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode</th>
                                                    <th>Tanggal</th>
                                                    <th>Grand Total</th>
                                                    <th>Detail</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $no = 1; $grand_total = 0;
                                                    foreach($query as $field){ 
                                                        $grand_total = $grand_total +  $field->jual_total;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no;?></td>
                                                        <td><?php echo $field->jual_kode;?></td>
                                                        <td><?php echo $field->jual_tanggal;?></td>
                                                        <td><?php echo $field->jual_total;?></td>
                                                        <td>
                                                            <?php
                                                            $q = $this->M_lap_penjualan->get_penjualan_detail($field->jual_kode);
                                                            foreach($q as $row){
                                                                echo "Barang = ".$row->brg_nama.", Harga = ".$row->brg_harga.", Jml = ".$row->det_jumlah.", Total = ".$row->det_subtotal.";<br>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url()?>laporan_penjualan/delete_penjualan/<?php echo $field->jual_kode;?>" onclick="return confirm('Apakah anda yakin akan  manghapus data ini')" class="btn btn-circle btn-danger"><i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
    <script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url()?>assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url()?>assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url()?>assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url()?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url()?>assets/js/custom.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jasny-bootstrap.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url()?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <script src="<?php echo base_url()?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script>
        // For select 2
        $(".select2").select2();
    </script>