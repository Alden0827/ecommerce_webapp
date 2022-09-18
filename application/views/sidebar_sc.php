        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('')?>" class="site_title"><i class="fa fa-paw"></i> <span>SELLER CENTER</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url()?>/assets/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Alden</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li ><a href="<?php echo site_url('seller_center/dashboard'); ?>"><i class="fa fa-bar-chart"></i> DASHBOARD </a>
<!--
                    <ul class="nav child_menu">
                      <li><a href="index.php">Explore</a></li>
                    </ul>
 -->
				          </li>

                  <li><a href="<?php echo site_url('seller_center/listing'); ?>"><i class="fa fa-shopping-cart"></i> PRODUCT LISTING </a>
                  </li>


                  <li><a href="<?php echo site_url('seller_center/bids'); ?>"><i class="fa fa-list"></i> BIDS </a>
                  </li>

                  <li><a><i class="fa fa-thumbs-o-up"></i>WALLET<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('seller_center/payouts'); ?>">PAYOUT</a></li>
                      <li><a href="<?php echo site_url('seller_center/sale_history'); ?>">SALE HISTORY</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->


            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>


        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle ">
                  <a id="menu_toggle"></a>
                  <!-- <a id="menu_toggle"><i class="fa fa-bars"></i></a> -->
                </div>


                <?php if (($this->session->userdata('user_data')) == null) { ?>
                  <!-- START: LOGGED-OUT NAVBAR -->
                  <nav class="nav navbar-nav">
                    <ul class=" navbar-right">
                      <li class="nav-item dropdown open" style="padding-left: 15px;">


                          <?php
                              // include_once APPPATH . "libraries/vendor/autoload.php";
                              // $this->load->model('google_login_model');
                              // $google_client = new Google_Client();
                              // $google_client->setClientId($this->config->item("google_client_id"));
                              // $google_client->setClientSecret($this->config->item("google_secret_id"));
                              // $google_client->addScope('email');
                              // $google_client->addScope('profile');

                              // $google_client->setRedirectUri(site_url('seller_center'));
                              // echo "<a href='".site_url('google_auth_c')."' class=\"btn btn-outline-primary\" role=\"button\">SELLER CENTER</a> ";

                              // if (isset($login_button)) {
                              //   echo $login_button;
                              // }else{
                              //   $google_client->setRedirectUri($this->config->item("google_redirect_url"));
                                echo '<a href="'.site_url('logout').'"  class="btn btn-outline-success" role="button"> LOGOUT</a>';
                              // }

                          ?>
                      </li>
                    </ul>
                  </nav>
                  <!-- END: LOGGED-OUT NAVBAR -->

                <?php } else {
                  $user_data = $this->session->userdata('user_data');
                ?>
                <!-- START: LOGGED-IN NAVBAR -->
                <nav class="nav navbar-nav">
                  <ul class=" navbar-right">
                    <li class="nav-item dropdown open" style="padding-left: 15px;">
                      <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?=$user_data['profile_picture'];?>" alt=""><?=$user_data["first_name"];?> <?=$user_data["last_name"];?>
                      </a>
                      <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="<?=site_url('products')?>">Store</a>
                          <a class="dropdown-item"  href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                          </a>
                      <a class="dropdown-item"  href="javascript:;">Help</a>
                        <a class="dropdown-item"  href="<?php echo base_url('logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                      </div>
                    </li>

                    <li role="presentation" class="nav-item dropdown open">
                      <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                      </a>
                      <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        <li class="nav-item">
                          <a class="dropdown-item">
                            <span class="image"><img src="<?php echo base_url()?>/assets/images/img.jpg" alt="Profile Image" /></span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="dropdown-item">
                            <span class="image"><img src="<?php echo base_url()?>/assets/images/img.jpg" alt="Profile Image" /></span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="dropdown-item">
                            <span class="image"><img src="<?php echo base_url()?>/assets/images/img.jpg" alt="Profile Image" /></span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="dropdown-item">
                            <span class="image"><img src="<?php echo base_url()?>/assets/images/img.jpg" alt="Profile Image" /></span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <div class="text-center">
                            <a class="dropdown-item">
                              <strong>See All Alerts</strong>
                              <i class="fa fa-angle-right"></i>
                            </a>
                          </div>
                        </li>
                      </ul>
                    </li>
                  </ul>
              </nav>
                <!-- END: LOGGED-IN NAVBAR -->
                <?php } ?>



            </div>
          </div>
        <!-- /top navigation -->
