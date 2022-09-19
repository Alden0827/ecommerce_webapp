<?php include_once("constantv.php") ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=app_name?> | Item Name</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-sm">
    <div class="container body">
      <div class="main_container">
        <?php include_once("sidebar.php");?>

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <BR>
                <h6>HOME | STORE | SIMILAR ITEMS</h6>
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
                              echo "<a href='#' id='item_thumb' img_url='$img_url'><img src=\"$img_url\" alt=\"...\" /></a>"; 
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
                        <button type="button" class="btn btn-success btn-lg">Add to Cart</button>
                        <button type="button" class="btn btn-info btn-lg">Add to Wishlist</button>
                      </div>

                      <div class="product_social">
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

    $(document).on('click','#item_thumb',function(){
        var src = $(this).attr('img_url');
        $('#cover_photo').fadeOut('fast',function(){
            $('#cover_photo').attr('src',src);
            $('#cover_photo').fadeIn('fast');
        });
        // $('#cover_photo').attr('src',src);
        // alert(src);


    });


</script>