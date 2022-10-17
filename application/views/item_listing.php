
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>PRODUCT LISTING<small>...</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                             <p class="text-muted font-13 m-b-30">
                              <a type="submit" class="btn btn-success btn-sm pull-right" href="<?=site_url('item_listing/products_add')?>">NEW PRODUCT </a>
                             </p>
                      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>UPC</th>
                            <th>Item</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Unit Price</th>
                            <th>Stock</th>
                            <th>Date Updated</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>


                      <?php 

                      foreach ($items->result() as $item) { 
            

                        ?>

                          <tr>
                            <td><img src="<?=site_url("uploads/items/thumbs/".$item->upc."_p_thumb.jpg")?>" width="100" height="100"/><br><?=$item->upc?></td>
                            <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;white-space: normal !important; ">
                              <strong><?=$item->item_caption?></strong><br> <br> 
                            </td>
                            <td><?=$item->brand?></td>
                            <td><?=$item->category?></td>
                            <td>$<?=$item->unit_price?></td>
                            <td><?=$item->stock?> available</td>
                            <td><?=date('M d, Y',strtotime($item->date_updated))?></td>
                            
                            <td><?=$item->status_id?></td>
                            <td> 
                                <button class="btn btn-success btn-sm" id="btn_edit"><i class="fa fa-edit"></i></button> 
                                <button class="btn btn-danger btn-sm" id="btn_delete"><i class="fa fa-remove"></i></button> 
                                <button class="btn btn-info btn-sm" id="btn_"><i class="fa fa-toggle-on"></i></button> 
                            </td>
                          </tr>                          
                        
                      <?php } ?>



                        </tbody>
                      </table>
            
          
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>


</div>


          </div>
        </div>
        <!-- /page content -->


