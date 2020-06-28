                
                <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="post" action="<?php echo base_url()?>profile/update_foto/<?php echo $user_id?>" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">Update Foto Profile</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="" class="control-label">Upload File:</label>
                                    <input type="file" class="form-control" name="file" required />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <a href="#" data-toggle="modal" data-target="#uploadModal" class="">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="<?php echo base_url()?>assets/images/users/<?php if($foto != '') echo $foto; else echo "profile.png";?>" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?php echo $this->session->userdata('nama')?></h4>
                                    <h6 class="card-subtitle"><?php echo $this->session->userdata('email')?></h6>
                                </center>
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Profile</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form method="post" action="<?php echo base_url()?>profile/update/<?php echo $data->mb_id?>" class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">ALamat</label>
                                                <div class="col-md-12">
                                                    <textarea name="mb_alamat" rows="5" placeholder="contoh: jl.Raya No.01, Kel.Caracas, Kec.Kalijati, Kab.Subang" class="form-control"><?php echo $data->mb_alamat?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Telpon</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="mb_notlp" placeholder="input nomor handphone" value="<?php echo $data->mb_notlp?>" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Tempat Lahir</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="mb_tmptlahir" placeholder="input tempat lahir" value="<?php echo $data->mb_tmptlahir?>" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Tanggal Lahir</label>
                                                <div class="col-md-12">
                                                    <input type="date" name="mb_tgllahir" placeholder="input tanggal lahir" value="<?php if($data->mb_tgllahir != '0000-00-00')echo $data->mb_tgllahir; else date('d/m/Y');?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12">Kampus<?php //echo $data->sch_id?></label>
                                                <div class="col-sm-12">
                                                    <select name="sch_id" class="form-control form-control-line">
                                                        <!-- <option value="">--PILIH--</option> -->
                                                        <?php 
                                                        if($data->sch_id == 0){
                                                            $q = $this->db->get('m_school')->result();
                                                            foreach($q as $row){
                                                                echo '<option value="'.$row->sch_id.'">'.$row->sch_nama.'</option>';
                                                            }
                                                        }else{
                                                            $q = $this->db->get_where('m_school', array('sch_id'=>$data->sch_id))->result();
                                                            foreach($q as $row){
                                                                echo '<option value="'.$row->sch_id.'">'.$row->sch_nama.'</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12">Semester</label>
                                                <div class="col-sm-12">
                                                    <!-- <select name="mb_semester" class="form-control form-control-line"> -->
                                                        <?php 
                                                        // $this->load->helper('form');
                                                        $arr_data = array(
                                                            '1'=>'1',
                                                            '2'=>'2',
                                                            '3'=>'3',
                                                            '4'=>'4',
                                                            '5'=>'5',
                                                            '6'=>'6',
                                                            '7'=>'7',
                                                            '8'=>'8',
                                                            'Lulus'=>'Lulus',
                                                        );
                                                        echo form_dropdown('mb_semester',$arr_data,$data->mb_semester,'class=form-control');
                                                        ?>
                                                    <!-- </select> -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Tempat Kerja</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="mb_perusahaan" placeholder="input perusahaan" value="<?php echo $data->mb_perusahaan?>" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Bagian Kerja</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="mb_bagian" placeholder="input kerja di bagian" value="<?php echo $data->mb_bagian?>" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Link Facebook</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="mb_facebook" placeholder="contoh : https://www.facebook.com/iin.swara" value="<?php echo $data->mb_facebook?>" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Link Linkedln</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="mb_linkedln" placeholder="contoh : https://www.linkedin.com/in/solihin-3271b511a/" value="<?php echo $data->mb_linkedln?>" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
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
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url()?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>