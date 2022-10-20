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

            <?php echo form_open('order/checkout'); ?>

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
                                <input type="checkbox" id="check-all" class="flat" checked="checked">
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

                          <tbody id="cart_list_container" >
                            <?php foreach ($cart_items as $item) { ?>
                                <tr class="even pointer" cart_id="<?=$item->cart_id;?>" item_total_cost="<?=$item->total;?>" unit_price='<?=$item->unit_price?>'
                                  >
                                  
                                  <td class="a-center ">
                                    <input type="checkbox" class="flat chk_item_selector" id="chk_item_selector" checked="checked">
                                    <input type="hidden" name="cart_id[]" value="<?=$item->cart_id;?>" id="hidden_chart_id" class="hidden_chart_id">
                                  </td>
                                  <td class=" ">
                                    <div class="image-wrapper float-left pr-3">
                                        <img src="<?=site_url('uploads/items/'.$item->upc.'_p.jpg')?>" width="100" height="100" alt=""/>
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
                                  <td class=" "><input class = "form-control input-lg col-xs-1" min="1" max="<?=$item->stock?>" type="number" id="qty" value="<?=$item->qnt?>" width="5"></i></td>
                                  <td class="a-right a-right "><strong>$<span id='item_total'><?=$item->total?></span></strong></td>
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
                                                  <strong>Tax: </strong>
                                              </p></td>
                                              <td class="text-center">
                                              <p>
                                                  <strong id="total_cost">$0.00</strong>
                                              </p>
                                              <p>
                                                  <strong id="taxed_amount">$0.00</strong>
                                              </p>

                                            </td>
                                          </tr>
                                          <tr>
                                              <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                              <td class="text-center text-danger"><h4><strong id="net_amount">$0.0</strong></h4></td>
                                          </tr>
                                      </tbody>
                                  </table>
                                  <button type="Submit" class="btn btn-success btn-lg btn-block" name='submit' value='Submit' id='checkout_button'>
                                      Checkout Now   <span class="glyphicon glyphicon-chevron-right"></span>
                                  </button></td>
                              </div>
                          </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </form>

          </div>
        </div>
        <!-- /page content -->



        <script type="text/javascript">
          $(function() {

            var formatter = new Intl.NumberFormat('en-US', {
              style: 'currency',
              currency: 'USD',
            });

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
                      update_summary()
                      // console.log(data)      
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

            //toggle check all
            $(document).on("click","#check-all",function(){
                var is_checked = $(this).is(":checked");
                console.log(is_checked);
                $("#cart_list_container tr").each(function(){
                    $(this).find('input.chk_item_selector').prop('checked',is_checked);
                });
                update_summary();
            });

            //toggle check selector
            $(document).on("click","#chk_item_selector",function(){
                var is_checked = $(this).is(":checked");
                $('#check-all').prop('checked',false);
                // console.log(is_checked);
                update_summary();
            });

            //update summary
            function update_summary(){
                var shipping_fee = 0;
                var tax_rate = 0.12;
                var item_count = 0;
                var total_cost = 0;
                var taxed_amount = 0;
                var net_amount = 0;
                $("#cart_list_container tr").each(function(){
                    var tr = $(this);
                    var is_selected = $(this).find('input.chk_item_selector').is(":checked");
                    var hidden_chart_id = $(this).find('input.hidden_chart_id');
                    var cart_id = tr.attr('cart_id');
                    var item_cost = 0;
                    var qty = 0;
                    
                    if (is_selected) {

                        // CALCULATES TOTAL FROM DATABASE
                        unit_price = parseFloat(tr.attr('unit_price'));
                        qty = parseInt(tr.find('input#qty').val());
                        item_cost = unit_price * qty;
                        total_cost+=parseFloat(item_cost) ;

                        hidden_chart_id.removeAttr("disabled"); 
                        
                    }else{
                        hidden_chart_id.attr('disabled','disabled');
                    }
                    tr.find('span#item_total').html(parseFloat(tr.attr('unit_price')) * qty);
                });

                taxed_amount = total_cost * tax_rate;
                net_amount = total_cost + taxed_amount;

                $('#total_cost').html(formatter.format(total_cost));
                $('#taxed_amount').html(formatter.format(taxed_amount));
                $('#net_amount').html(formatter.format(net_amount));

                if (net_amount < 1) {
                    $('#checkout_button').attr('disabled','disabled');
                }else{
                    $('#checkout_button').removeAttr('disabled');
                }
                
            }

            update_summary();

          });
        </script>
