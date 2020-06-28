<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('base/v_header_green_dark');?>
<?php 
    $data = array();
    $data['user_id'] = $this->session->userdata('id');
    $data['user'] = $this->session->userdata('user');
    $data['nama'] = $this->session->userdata('nama');
    $data['email'] = $this->session->userdata('email');
    $data['akses'] = $this->session->userdata('akses');
    $data['foto'] = $this->session->userdata('foto');
?>
<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php $this->load->view('base/v_topbar', $data)?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php $this->load->view('base/v_sidebar', $data)?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles" style="height:50px;">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor"><?php echo $title?></h3>
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url()?>dashboard">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo $subtitle?></li>
                        </ol>
                        </div>
                    </div>
                </div>
                <!-- Start Page Content -->
                <?php $this->load->view($page, $data)?>
                <!-- End PAge Content -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2017 Material Pro Admin by wrappixel.com </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Reminder</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="modal-title" id="exampleModalLabel1">Data Profile anda belum lengkap, silahkan mengUpdate data anda dengan klik tombol Lihat Profile</h5>
                        <!-- <form>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Recipient:</label>
                                <input type="text" class="form-control" id="recipient-name1">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Message:</label>
                                <textarea class="form-control" id="message-text1"></textarea>
                            </div>
                        </form> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="<?php echo base_url()?>profile"><button type="button" class="btn btn-primary">Lihat Profile</button></a>
                    </div>
                </div>
            </div>
        </div>
    <script>
        <?php 
        $telp = $this->session->userdata('telp');
        if(isset($telp)){
            if($telp == ''){
                ?>
                $(window).on('load',function(){
                    $('#exampleModal').modal('show');
                });
        <?php
            }
        }
        ?>
        // $(document).ready(function(){
        //     $('#exampleModal').show();
        // });
    </script>
</body>

</html>