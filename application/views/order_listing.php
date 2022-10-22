
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
                                    <th>ITEM COUNT</th>

                                    <th>NET AMOUNT</th>
                                    <th>EX. TAX</th>

                                    <th>TOTAL</th>
                                    <th>DUE DATE</th>

                                    <th>STATUS</th>

                                    <th>ACTION</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                  <?php  foreach ($order_listing->result() as $order){ ?>
                                    <tr order_id="<?=$order->order_id?>">
                                      <td><?=$order->order_id?></td>
                                      <td><?=$order->ITEM_COUNT?></td>

                                      <td><?=$order->NET_AMOUNT?></td>
                                      <td><?=$order->EX_TAX?></td>

                                      <td><?=$order->SUB_TOTAL?></td>
                                      <td><?=$order->date_due?></td>

                                      <td><?php
                                        $status = "";
                                        if ($order->status_id == 1) {
                                            $status = "<span class='badge badge-warning'>$order->status</span>";
                                        }elseif($order->status_id == 2 || $order->status_id == 3 || $order->status_id == 4) {
                                            $status = "<span class='badge badge-danger'>$order->status</span>";
                                        }elseif($order->status_id == 5) {
                                            $status = "<span class='badge badge-info'>$order->status</span>";
                                        }elseif($order->status_id == 6) {
                                            $status = "<span class='badge badge-success'>$order->status</span>";
                                        }else{
                                            $status = "<span class=''>$order->status</span>";
                                        }
                                        print($status);

                                      ?></td>

                                      <td>

                                        <button id="btn_action_view" class="btn btn-sm btn-info"><i class="fa fa-close"></i> View</button>
                                        <button id="btn_action_ship" class="btn btn-sm btn-primary"><i class="fa fa-close"></i> Ship</button>
                                        <button id="btn_action_cancel" class="btn btn-sm btn-danger"><i class="fa fa-close"></i> Cancel</button>


                                      </td>
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


<script type="text/javascript">
$(function() {

      // /ON VIEW ORDER
      $(document).on('click','#btn_action_view',function(){
          var order_id = $(this).closest('tr').attr('order_id');
          $.redirect("<?=site_url('order/checkout');?>", {'order_id': order_id});
      });

      //ON CANCEL ORDER
      $(document).on('click','#btn_action_cancel',function(){
          var tr = $(this).closest('tr').attr('order_id');
          alert('This option is currently not working');
      });

      //ON SHIP ORDER
      $(document).on('click','#btn_action_ship',function(){
          var tr = $(this).closest('tr').attr('order_id');
          alert('This option is currently not working');
      });




});

</script>