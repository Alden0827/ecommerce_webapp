

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Featured Products</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="">
                  <div class="x_content">

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      </ol>
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="<?=site_url('assets/images/banner1.jpg')?>" alt="First slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="<?=site_url('assets/images/banner2.jpg')?>" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="<?=site_url('assets/images/banner3.jpg')?>" alt="Third slide">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>

                    <br />
                    <div class="row" rem="card container">



                        <?php  foreach ($product_listing as $item): ?>
                                
                           <!-- start of card -->
                           <a href="<?php echo site_url("Products/detail/$item->upc") ?>">
                            <div class="col-md-3   widget widget_tally_box">
                              <div class="x_panel ui-ribbon-container fixed_height_item_card">
                                
                                <?php if ($item->discount > 0): ?>
                                  <div class="ui-ribbon-wrapper">
                                    <div class="ui-ribbon">
                                      <?=$item->discount*100;?>% Off
                                    </div>
                                  </div>
                                <?php endif; ?>

                                <div class="x_title">
                                  <h2><?=$item->item_caption;?></h2>
                                  <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                  <div style="text-align: center; margin-bottom: 17px">
                                    <img src="<?php echo base_url()?>/uploads/<?=$item->upc;?>_p.jpg" width="240" height="240">
                                  </div>

                                  <div class="flex">
                                    <ul class="list-inline count2">
                                      <li>
                                        <h3><?=$item->unit_price;?></h3>
                                        <span>Price</span>
                                      </li>
                                      <li>
                                        <h3>&nbsp;</h3>
                                        <span>&nbsp;</span>
                                      </li>
                                      <li>
                                        <h3>******</h3>
                                        <span>Rating</span>
                                      </li>
                                    </ul>
                                  </div>

                                  <p><?=$item->item_desc;?></p>

                                </div>
                              </div>
                            </div>
                           </a>
                            <!-- end of card -->
                            
                        <?php endforeach; ?>








                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
