
        <!-- page content -->
        <div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <BR>
                <h6><a href="#">HOME</a> | <a href="#">VISIT STORE</a> | <a href="#">SIMILAR ITEMS</a></h6>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
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
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$item_detail[0]->item_caption; ?></h2>
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

                    <div class="col-md-5 col-sm-5 ">
                      <div class="product-image">
                        <img src="<?=site_url('uploads/'.$item_detail[0]->upc); ?>_p.jpg" alt="..." id='cover_photo' />
                      </div>
                      <div class="product_gallery">
                        <?php 
                          echo "<a href='#' id='item_thumb' img_url='".site_url('uploads/'.$item_detail[0]->upc.'_p.jpg')."'><img src=\"".site_url('uploads/'.$item_detail[0]->upc."_p.jpg")."\" alt=\"...\" /></a>"; 
                          for ($i=1; $i < 8; $i++) { 
                            $image = 'uploads/'.$item_detail[0]->upc."_p$i.jpg";
                            $img_url = site_url($image);
                            if (file_exists($image)){
                              echo "<a href='' id='item_thumb' img_url='$img_url'><img src=\"$img_url\" alt=\"...\" /></a>"; 
                            }
                          }
                        ?>


                      </div>
                    </div>

                    <div class="col-md-7 col-sm-7 " style="border:0px solid #e5e5e5;">

                      <h3 class="prod_title"><?=$item_detail[0]->item_desc;?></h3>

                      <p><?=$item_detail[0]->item_specs;?></p>
                      <br />
<!-- 
                      <div class="">
                        <h2>Available Colors</h2>
                        <ul class="list-inline prod_color display-layout">
                          <li>
                            <p>Green</p>
                            <div class="color bg-green"></div>
                          </li>
                          <li>
                            <p>Blue</p>
                            <div class="color bg-blue"></div>
                          </li>
                          <li>
                            <p>Red</p>
                            <div class="color bg-red"></div>
                          </li>
                          <li>
                            <p>Orange</p>
                            <div class="color bg-orange"></div>
                          </li>

                        </ul>
                      </div> 
                      <br />

                      <div class="">
                        <h2>Size <small>Please select one</small></h2>
                        <ul class="list-inline prod_size display-layout">
                          <li>
                            <button type="button" class="btn btn-default btn-xs">Small</button>
                          </li>
                          <li>
                            <button type="button" class="btn btn-default btn-xs">Medium</button>
                          </li>
                          <li>
                            <button type="button" class="btn btn-default btn-xs">Large</button>
                          </li>
                          <li>
                            <button type="button" class="btn btn-default btn-xs">Xtra-Large</button>
                          </li>
                        </ul>
                      </div> -->
                      <br />

                      <div class="">
                        <div class="product_price">
                          <h1 class="price">$<?=$item_detail[0]->unit_price;?></h1>
                          <span class="price-tax">Ex Tax: $<?=$item_detail[0]->unit_price*0.12;?></span>
                          <br>
                        </div>
                      </div>

                      <div class="">
                        
                        <?php if ($is_logged_in) { ?>
                          <button type="button" class="btn btn-success btn-md" id="btn_add_to_cart" upc="<?=$item_detail[0]->upc?>">Add to Cart</button>
                          <button type="button" class="btn btn-info btn-md" id="btn_add_to_wishlist" upc="<?=$item_detail[0]->upc?>">Add to Wishlist</button>
                          <button type="button" class="btn btn-danger btn-md" id="btn_buy" upc="<?=$item_detail[0]->upc?>">BUY NOW</button>
                        <?php } else { ?>
                          <div class="alert alert-danger alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>To purchase this item, you must first log in.</strong>
                          </div>
                        <?php } ?>

                      </div>

                      <div id="container1"></div>

<!--                       <div class="product_social">
                        <ul class="list-inline display-layout">
                          <li><a href="#"><i class="fa fa-facebook-square"></i></a>
                          </li>
                          <li><a href="#"><i class="fa fa-twitter-square"></i></a>
                          </li>
                          <li><a href="#"><i class="fa fa-envelope-square"></i></a>
                          </li>
                          <li><a href="#"><i class="fa fa-rss-square"></i></a>
                          </li>
                        </ul>
                      </div> -->

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
    
    //SWITCH COVER PHOTO IMAGES
    $(document).on('click','#item_thumb',function(e){
        e.preventDefault();
        var src = $(this).attr('img_url');
        $('#cover_photo').fadeOut('fast',function(){
            $('#cover_photo').attr('src',src);
            $('#cover_photo').fadeIn('fast');
        });
    });

    //ADD TO CART
    $('#btn_add_to_cart').on('click',function(){
        var upc = $(this).attr('upc');
        $.ajax({
          type: "POST",
          url: "<?=site_url('Cart/add')?>",
          data: {upc:upc},
          success: function(json_result){
              var res = $.parseJSON(json_result);
                // $(this).attr("disabled", 'disabled');
                $.toast({
                        text: '<b>'+res.upc+'<b><br>'+res.item_caption, 
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


    $('.toast').toast('show');
});




</script>



<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="..." class="rounded mr-2" alt="...">
    <strong class="mr-auto">Bootstrap</strong>
    <small class="text-muted">just now</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
    See? Just like this.
  </div>
</div>
