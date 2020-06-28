
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile" style="background: url(<?php echo base_url()?>assets/images/background/user-info.jpg) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="<?php echo base_url()?>assets/images/user.png" alt="user" /> </div>
                    <!-- User profile text-->
                    <div class="profile-text"> 
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?php if(isset($nama)) echo $nama; else echo $nama;?></a>
                        <div class="dropdown-menu animated flipInY"> <a href="<?php echo base_url()?>profile/" class="dropdown-item"><i class="ti-user"></i> My Profile</a> 
                            <div class="dropdown-divider"></div> 
                                <a href="<?php echo base_url()?>profile/account" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                            <div class="dropdown-divider"></div> 
                                <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a> </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> 
                            <a class="waves-effect waves-dark" href="<?php echo base_url()?>index.php/home" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home</span></a>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-database"></i><span class="hide-menu">Master Data</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url()?>index.php/barang">Barang</a></li>
                                <li><a href="<?php echo base_url()?>index.php/user">User</a></li>
                            </ul>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="<?php echo base_url()?>index.php/penjualan/add_penjualan" 
                            aria-expanded="false"><i class="mdi mdi-laptop-windows"></i><span class="hide-menu">Penjualan</span></a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="<?php echo base_url()?>index.php/laporan_penjualan" 
                            aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Laporan Penjualan</span></a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="<?php echo base_url()?>index.php/login/logout" aria-expanded="false"><i class="mdi mdi-logout-variant"></i><span class="hide-menu">Logout</span></a>
                        </li>                        
                         
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>