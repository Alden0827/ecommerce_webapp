

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>My Wishlist</h3>
              </div>

<!--               <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
            </div>

            <div class="clearfix"></div>

            <div class="row" style="display: block;">
                            
              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                   
<!--                     <ul class="nav navbar-right panel_toolbox">
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
                    </ul> -->
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <!-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> -->

                      <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                            <tr class="headings">
                              <th>
                                <input type="checkbox" id="check-all" class="flat">
                              </th>
                              <th class="column-title">Product </th>
                              <th class="column-title">Unit Price </th>
                              <th class="column-title">Stock </th>
                              <th class="column-title no-link last " style="width: 300px;"><span class="nobr">Action</span>
                              </th>
                              <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                              </th>
                            </tr>
                          </thead>

                          <tbody>


                            <?php foreach ($wishlist_items as $item) {  
                                $row_background_style = "style=\"background-color:#EDBB99\"";
                                $add_cart_button = "<a class=\"btn btn-app btn-danger \" id='btn_add_to_cart'><i class=\"fa fa-shopping-cart\"></i> Add to Cart </a>";
                                $stock_caption = "$item->stock Available";
                   
                                if ($item->stock > 0){
                                  $row_background_style = "";
                                }else{
                                  $add_cart_button = "";
                                  $stock_caption = "<b><font color=\"red\">Out of Stock</font></b>";
                                }

                            ?>
                                

                                

                                <tr class="even pointer" upc='<?=$item->upc;?>' wl_id='<?=$item->wl_id;?>' <?= $row_background_style?>>
                                  <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records">
                                  </td>
                                  <td class=" ">
                                    <div class="image-wrapper float-left pr-3">
                                        <img src='<?=site_url("uploads/items/$item->upc")?>_p.jpg' width="100" height="100" alt=""/>
                                    </div>
                                    <div class="">
                                        <strong><?=$item->item_caption?> </strong><br>
                                        <i>
                                          <?=$item->item_desc?>
                                        </i> 
                                    </div>
                                  <td class="a-right a-right ">
                                    <?php
                                    if ($item->discount == 0) {
                                        echo '$'.$item->unit_price;
                                    }else{
                                        echo '<s><font color="red">$'.$item->unit_price.'</font></s><br>';
                                      echo '$<strong>'.$item->discounted_price.'</strong>';
                                    }
                                    ?>

                                  </td>
                                  <td class="a-right a-right "><?=$stock_caption?></td>
                                  <td class=" last">
                                    

                                    <div class="visible delete_entry_container">
                                      
                                      <a class="btn btn-app btn-danger" id='delete_entry'>
                                        <i class="fa fa-trash "></i> Delete
                                      </a>
                                      <?=$add_cart_button?>

                                    </div>
                                    
                                    
                                    <div class="invisible confirm_delete_entry_container">


                                      <a class="btn btn-app btn-danger" id='confirm_delete_entry'>
                                        <i class="fa fa-check "></i> Delete
                                      </a>

                                      <a class="btn btn-app btn-danger" id='cancel_delete_entry'>
                                        <i class="fa fa-close "></i> Cancel
                                      </a>

                                    </div>

                                  

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
        <!-- /page content -->



<script type="text/javascript">

$(function() {

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

    //WHEN CONFIRM DELETE CLICKED
    $(document).on('click','#confirm_delete_entry',function(e){
      e.preventDefault();

        var row = $(this).closest('tr');
        var wl_id = row.attr('wl_id');
        $.ajax({
            url:'<?=site_url('Wishlist/remove')?>',
            data: {wl_id:wl_id},
            type: 'post',
            success: function(data){
              row.fadeOut(300,function(){
                  row.remove();
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

    //ADD TO CART
    $(document).on('click','#btn_add_to_cart',function(){
       var upc = $(this).closest('tr').attr('upc');

        $.ajax({
          type: "POST",
          url: "<?=site_url('Cart/add')?>",
          data: {upc:upc},
          success: function(json_result){
            console.log(json_result);
              var res = $.parseJSON(json_result);
                // $(this).attr("disabled", 'disabled');
                $.toast({
                        // text: '<b>'+res.upc+'<b><br>'+res.item_caption, 
                        text: '<?php echo $this->session->flashdata('info');?>',
                        heading: 'Added to Cart Successfully!', 
                        icon: 'success', 
                        showHideTransition: 'slide',
                        allowToastClose: true, 
                        hideAfter: 3000, 
                        stack: 5, 
                        position: 'bottom-right',
                        textAlign: 'left',  
                        loader: true,  
                        loaderBg: '#830101',  
                        beforeShow: function () {}, 
                        afterShown: function () {}, 
                        beforeHide: function () {}, 
                        afterHidden: function () {}  
                    });

          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('error!');
             console.log(XMLHttpRequest);
             $('#container1').html(XMLHttpRequest);
          }
        });

    });


});




</script>
