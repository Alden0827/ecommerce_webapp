
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>CHECKOUTS</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                              <p class="text-muted font-13 m-b-30">
                                  ...
                              </p>
          					
                              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th>ORDER NO.</th>
                                    <th>NUMBER OF ITEMS</th>

                                    <th>NET AMOUNT</th>
                                    <th>EX. TAX</th>

                                    <th>TOTAL</th>
                                    <th>DUE DATE</th>

                                    <th>ACTION</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                  <?php  foreach ($order_listing->result() as $order){ ?>
                                    <tr>
                                      <td><?=$order->order_id?></td>
                                      <td><?=$order->ITEM_COUNT?></td>

                                      <td><?=$order->NET_AMOUNT?></td>
                                      <td><?=$order->EX_TAX?></td>

                                      <td><?=$order->SUB_TOTAL?></td>
                                      <td><?=$order->date_due?></td>

                                      <td>&nbsp;</td>
                                    </tr>                                    
                                  <?php  } ?>

                                
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
