

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h6>
                  <a href="<?=site_url()?>"> Home <a> / 
                  <a href="#"> Categories <a> / 
                  <strong><?=$category_name?></strong> 
                </h6>
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


                    <div class="row" rem="card container">



                        <?php  foreach ($product_listing as $item): ?>
                                

                        <!-- START OF CARD -->
                        <a href="<?php echo site_url("Products/detail/$item->upc") ?>"> 
                          <div class="col-md-3   widget widget_tally_box">
                            <div class="x_panel ui-ribbon-container fixed_item_card_height fixed_item_card_width">
                              
                                <?php if ($item->discount > 0): ?>
                                  <div class="ui-ribbon-wrapper">
                                    <div class="ui-ribbon">
                                      <?=$item->discount*100;?>% Off
                                    </div>
                                  </div>
                                <?php endif; ?>

                              <div class="x_content">
                                <div style="text-align: center; margin-bottom: 17px">
                                  <img src="<?php echo base_url()?>/uploads/items/<?=$item->upc;?>_p.jpg" class="image_zindex">
                                </div>                                
                                <div class="flex">
                                  <ul class="list-inline count2">
                                    <li>
                                      <b>$<?=$item->unit_price;?></b>
                                      <span>Price</span>
                                    </li>
                                    <li>
                                      <b>1,234</b>
                                      <span>Sold</span>
                                    </li>
                                    <li>
                                      <b>*****</b>
                                      <span>Rate</span>
                                    </li>
                                  </ul>
                                </div>
                                <p class="card_max_caption">
                                  <?=$item->item_caption;?>
                                </p>

                              </div>
                            </div>
                          </div>
                        </a>

                      <!-- END OF CARD -->
       

                           <!-- start of card -->
<!--                            <a href="<?php echo site_url("Products/detail/$item->upc") ?>">
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
                           </a> -->
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
