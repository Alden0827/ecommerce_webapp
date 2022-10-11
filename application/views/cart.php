<?php

  // print_r($cart_items);
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Shopping Cart</h3>
                       <?php 
                          // print('<pre>');
                          // print_r($cart_items);
                          // print('</pre>');
                       ?>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row" style="display: block;">
              <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Select free shipping voucher below to enjoy shipping discount</h2>
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
                    <!-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> -->
                    <div class="col-md-8 col-sm-8  ">
                      <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                            <tr class="headings">
                              <th>
                                <input type="checkbox" id="check-all" class="flat">
                              </th>
                              <th class="column-title">Product </th>
                              <th class="column-title">Unit Price </th>
                              <th class="column-title">Quantity </th>
                              <th class="column-title">Total Price </th>
                              <th class="column-title no-link last"><span class="nobr">Action</span>
                              </th>
                              <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                              </th>
                            </tr>
                          </thead>

                          <tbody>
                            <?php foreach ($cart_items as $item) { ?>
                                <tr class="even pointer" cart_id="<?=$item->cart_id;?>">
                                  <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records">
                                  </td>
                                  <td class=" ">
                                    <div class="image-wrapper float-left pr-3">
                                        <img src="<?=site_url('uploads/'.$item->upc.'_p.jpg')?>" width="100" height="100" alt=""/>
                                    </div>
                                    <div class="">
                                        <strong><?=$item->item_caption?></strong>                                        
                                        <br><i><?=$item->item_desc?></i>
                                        <br><i>UPC: <?=$item->upc?></i>
                                    </div>
                                  </td>
                                  <td class=" "><?php
                                    if ($item->discount == 0) {
                                        echo '$'.$item->unit_price;
                                    }else{
                                        echo '<s><font color="red">$'.$item->unit_price.'</font></s><br>';
                                      echo '$<strong>'.$item->discounted_unit_price.'</strong>';
                              
                                    }
                                    ?></td>
                                  <td class=" "><input class = "form-control input-lg col-xs-1" min="1" max="<?=$item->stock?>" type="number" name="qty"  id="qty" value="<?=$item->qnt?>" width="5"></i></td>
                                  <td class="a-right a-right "><strong>$<?=$item->total?></strong></td>
                                  <td class=" last">

                                    <div class="visible delete_entry_container">
                                      <a href="#" class="btn btn-sm btn-danger" id="delete_entry" ><i class="fa fa-trash"></i></a>
                                    </div>
                                    
                                    
                                    <div class="invisible confirm_delete_entry_container">
                                      <a href="#" class="btn btn-sm btn-danger" id="confirm_delete_entry" ><i class="fa fa-trash"></i></a>
                                      <a href="#" class="btn btn-sm btn-success" id="cancel_delete_entry"><i class="fa fa-close"></i></a>
                                    </div>

                                  </td>
                                </tr>
                            <?php } ?>

                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4  ">
                       <div class="row">
                          <div class="well col-xs-12 col-sm-12 col-md-12 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                              <div class="row">
                                  <div class="text-center">
                                      <h5>SUMMARY</h5>
                                  </div>
                                  </span>
                                  <table class="table table-hover">
                                      <thead>
                                          <tr>
                                              <th>&nbsp;</th>
                                              <th class="text-center">Total</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td class="text-right">
                                              <p>
                                                  <strong>Price: </strong>
                                              </p>
                                              <p>
                                                  <strong>Shipment: </strong>
                                              </p>
                                              <p>
                                                  <strong>Tax: </strong>
                                              </p></td>
                                              <td class="text-center">
                                              <p>
                                                  <strong>$90.00</strong>
                                              </p>
                                              <p>
                                                  <strong>$5.00</strong>
                                              </p>
                                              <p>
                                                  <strong>$6.94</strong>
                                              </p>

                                            </td>
                                          </tr>
                                          <tr>
                                              <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                              <td class="text-center text-danger"><h4><strong>$101.94</strong></h4></td>
                                          </tr>
                                      </tbody>
                                  </table>
                                  <button type="button" class="btn btn-success btn-lg btn-block">
                                      Checkout Now   <span class="glyphicon glyphicon-chevron-right"></span>
                                  </button></td>
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



            //WHEN QNT_CHANGED CLICKED
            $(document).on('change','#qty',function(){
              var new_qty = $(this).val();
              var cart_id = $(this).closest('tr').attr('cart_id');

              $.ajax({
                  url:'<?=site_url('Cart/updateqty')?>',
                  data: {
                      cart_id:cart_id,
                      cart_item_qty:new_qty
                  },
                  type: 'post',
                  success: function(data){
                      console.log(data)      
                  }
              })
            });

            //WHEN CONFIRM DELETE CLICKED
            $(document).on('click','#confirm_delete_entry',function(e){
              e.preventDefault();

                var cart_id = $(this).closest('tr').attr('cart_id');
                var row = $(this).closest('tr');

                $.ajax({
                    url:'<?=site_url('Cart/delete')?>',
                    data: {cart_id:cart_id},
                    type: 'post',
                    success: function(data){
                      row.fadeOut(300,function(){
                          $(this).remove();
                      });        
                    }
                })
            });

            //WHEN CANCEL DELETE CLICKED
            $(document).on('click','#cancel_delete_entry',function(e){
              e.preventDefault();
              var confirm_delete_entry_container = $(this).parent().parent().find('.confirm_delete_entry_container');
              var delete_entry_container = $(this).parent().parent().find('.delete_entry_container');     

              confirm_delete_entry_container.fadeOut(300,function(e){
                delete_entry_container.fadeIn(300);
              });
            });

            // DELETE ENTRY CLICKED
            $(document).on('click','#delete_entry',function(e){
              e.preventDefault();
              // $('#confirm_delete_entry')
              var confirm_delete_entry_container = $(this).parent().parent().find('.confirm_delete_entry_container');
              var delete_entry_container = $(this).parent().parent().find('.delete_entry_container');

              delete_entry_container.fadeOut(300,function(e){
                confirm_delete_entry_container.fadeIn(100);
                if ($(confirm_delete_entry_container).hasClass('invisible')) {
                   $(confirm_delete_entry_container).removeClass('invisible').addClass('visible');
                }
              });

            });
          });
        </script>
