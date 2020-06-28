                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Form <?php echo $title?></h4>
                                <form method="post" action="<?php echo base_url()?>index.php/penjualan/save_detail" class="form-material m-t-40">
                                    <div class="row col-12">
                                        <div class="col-3">
                                            <label>Kode</label>
                                            <input type="text" readonly class="form-control" name="jual_kode" value="<?php echo $jual_kode?>">
                                        </div>
										<div class="col-5">
											<label for="example-email">Barang</label>
											<select name ='brg_id' class="form-control select2" required>
												<?php
													$q = $this->db->get('m_barang')->result();
													foreach($q as $row){
														echo '<option value="'.$row->brg_id.'|'.$row->brg_harga.'">'.$row->brg_nama.' | '.$row->brg_harga.'</option>';
													}
												?>
                                            </select>
										</div>
										<div class="col-3">
											<label for="example-email">Jumlah</label>
											<input type="number" class="form-control " name="det_jumlah" placeholder="isi jumlah" required> 
										</div>
										<div class="col-1" style="margin-top: 20px;">
											<button type="submit" class="btn btn-primary">Add</button>
										</div>
                                    </div>
                                </form>
                                <div class="row col-12">
                                    <div class="table-responsive m-t-40">
                                        <table id="myTable" width="100%" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>ID Barang</th>
                                                    <th>Nama</th>
                                                    <th>Harga</th>
                                                    <th>Qty</th>
                                                    <th>Subtotal</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $no = 1; $total = 0;
                                                    $q = $this->db->query("SELECT * 
                                                    FROM tr_penjualandetail
                                                    join m_barang on m_barang.brg_id=tr_penjualandetail.brg_id
                                                    where tr_penjualandetail.jual_kode='$jual_kode'
                                                    order by det_id asc")->result();
                                                    foreach($q as $field){ 
                                                        $total = $total +  $field->det_subtotal;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no;?></td>
                                                        <td><?php echo $field->brg_id;?></td>
                                                        <td><?php echo $field->brg_nama;?></td>
                                                        <td><?php echo $field->brg_harga;?></td>
                                                        <td><?php echo $field->det_jumlah;?></td>
                                                        <td><?php echo $field->det_subtotal;?></td>
                                                        <td>
                                                            <a href="<?php echo base_url()?>index.php/penjualan/delete_detail_penjualan/<?php echo $field->det_id;?>" class="btn btn-circle btn-danger"><i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                        <form method="post" action="<?php echo base_url()?>index.php/penjualan/save_trans">
                                            <input type="hidden" name="jual_kode" value="<?php echo $jual_kode?>" >
                                            <input type="hidden" name="jual_total" value="<?php echo $total?>" >
                                            <div class="col-12" align="center">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
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