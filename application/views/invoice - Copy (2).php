


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
<!--             <div class="page-title">
              <div class="title_left">
                <h3>Invoice </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
 -->
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Order Chechout </h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="invoice-header" style="width: 100%;" >
                          <h1>
                              &nbsp;&nbsp;<i class="fa fa-globe"></i> Invoice.
                              <span class="pull-right"><small>Date: <?=date('m/d/Y');?>&nbsp;&nbsp;</small></span>
                          </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          <strong>SHIPMENT INFORMATION</strong> 
                          <span><a href="#" class="btn-info btn-sm"> Change </a>
                          <address>
                              <strong><i><?=$shipment_info->fullname?></i></strong></span>
                              <br><?=$shipment_info->address1?>
                              <br><?=$shipment_info->address2?>
                              <br>Phone 1: <?=$shipment_info->phone1?>
                              <br>Phone 2: <?=$shipment_info->phone2?>
                              <br>Email: <?=$shipment_info->email?>
                          </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">

                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <!-- <b>Invoice #007612</b>
                          <br>
                          <br>
                          <b>Order ID:</b> 4F3S8J
                          <br>
                          <b>Payment Due:</b> 2/22/2014
                          <br>
                          <b>Account:</b> 968-34567 -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="  table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Qty</th>
                                <th>Product</th>
                                <th style="width: 59%">Description</th>
                                <th>Unit Cost</th>
                                <th>Shipping Charge</th>
                                <th>Subtotal</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($cart_entries as $item) { ?>
                                <tr>
                                  <td><?=$item->qnt;?></td>
                                  <td><?=$item->item_caption;?></td>
                                  <td><?=$item->item_desc;?></td>
                                  <td>$<?=number_format($item->unit_price,2);?></td>
                                  <td>$<?=number_format($item->courier_fee,2)?></td>
                                  <td>$<?=number_format($item->sub_total,2);?></td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-md-8">
                          <p class="lead">Payment Methods:</p>
                          <img src="<?=site_url();?>/assets/images/visa.png" alt="Visa">
                          <img src="<?=site_url();?>/assets/images/mastercard.png" alt="Mastercard">
                          <img src="<?=site_url();?>/assets/images/american-express.png" alt="American Express">
                          <img src="<?=site_url();?>/assets/images/paypal.png" alt="Paypal">
   <!--                        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                          </p>
 -->    

                          <br><br><label for="message">:Leave Message to Seller :</label><textarea id="message" required="required" class="form-control text-muted well well-sm no-shadow" name="message" data-parsley-trigger="keyup" data-parsley-minlength="0" data-parsley-maxlength="255" data-parsley-minlength-message="" data-parsley-validation-threshold="10" data-gramm="false" wt-ignore-input="true" data-quillbot-element="gweYF26Tnw6CS5nPsFfCs" id="message"></textarea>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                          <p class="lead">Amount Due <?=date('m/d/Y', strtotime(date('Y-m-d'). ' + 1 days'))?></p>
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%">Subtotal:</th>
                                  <td>$<?=$totals->sub_total?></td>
                                </tr>
                                <tr>
                                  <th>Tax (<?=$totals->ex_tax_rate?>)</th>
                                  <td>$<?=$totals->ex_tax_charge?></td>
                                </tr>
                                <tr>
                                  <th>Shipping Fee:</th>
                                  <td>$<?=$totals->shipment_cost?></td>
                                </tr>
                                <tr>
                                  <th><h6><strong>Total:</strong></h6></th>
                                  <td><h6><strong>$<?=$totals->total_amount?></strong></h6></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print" id="place_order_controller">
                        <input type="hidden" name="" id="csv_cart_items" value="<?=$csv_cart_items;?>">
                        <input type="hidden" name="" id="shipment_id" value="<?=$shipment_info->id;?>">

                        <div class=" ">
                          &nbsp;&nbsp;&nbsp;<button class="btn btn-success pull-right" id="btn_place_order"><i class="fa fa-credit-card"></i> PLACE ORDER</button>
                        </div>
                      </div>
                      <div class="row no-print invisible" id="post_payment_controller">
                        <div class=" ">
                          <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                          <button 
                            class="btn btn-success pull-right" 
                            data-toggle="modal" 
                            data-target=".payment_modal"
                            data-backdrop="static" 
                            data-keyboard="false"
                            >
                            <i class="fa fa-credit-card" id="submit_payment"></i> Submit Payment
                          </button>
                          <button class="btn btn-primary pull-right" style="margin-right: 5px;" id="gen_pdf"><i class="fa fa-download"></i> Generate PDF</button>
                          <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".payment_modal">Large modal</button> -->
                          <!-- Payment modal -->
                          <div class="modal fade payment_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">PAYMENT OPTION</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">


       <div class="payment-cards">
         <h2 class="header">
            SELECT PAYMENT OPTIONS
         </h2>
         <div class="card-services">


            <div class="card-content card-content-1">
               <div class="fab fa-cc-amex"></div>
               <h2>
                  American Express
               </h2>
               <p>
                  Don't Leave Home Without Them
               </p>
               <a href="#">Pay with American Express</a>
            </div>

            <div class="card-content card-content-1">
               <div class="fab fa-cc-discover"></div>
               <h2>
                  Discover
               </h2>
               <p>
                  It pays to Discover
               </p>
               <a href="#">Pay with Discord</a>
            </div>

            <div class="card-content card-content-1">
               <div class="fab fa-cc-visa"></div>
               <h2>
                  Visa
               </h2>
               <p>
                  Trust, Security, Acceptance, and Inclusion.
               </p>
               <a href="#">Pay with Visa</a>
            </div>
            <div class="card-content card-content-2">
               <div class="fab fa-cc-mastercard"></div>
               <h2>
                  Mastercard
               </h2>
               <p>
                  There are some things money can't buy. For everything else there's Mastercard.
               </p>
               <a href="#">Pay with Mastercard</a>
            </div>
            <div class="card-content card-content-3">
               <div class="fab fa-cc-paypal"></div>
               <h2>
                  PAYPAL
               </h2>
               <p>
                  We put people at the center of everything we do.
               </p>
               <a href="#">Pay with Paypal</a>
            </div>
         </div>
      </div>


                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>

                              </div>
                            </div>
                          </div> <!-- payment modal -->


                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->



        <script type="text/javascript">
          $(function() {
            var formatter = new Intl.NumberFormat('en-US', {
              style: 'currency',
              currency: 'USD',
            });

         $('#gen_pdf').on('click',function(){
              var HTML_Width = $(".x_panel").width();
              var HTML_Height = $(".x_panel").height();
              var top_left_margin = 15;
              var PDF_Width = HTML_Width + (top_left_margin * 2);
              var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
              var canvas_image_width = HTML_Width;
              var canvas_image_height = HTML_Height;

              var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

              html2canvas($(".x_panel")[0]).then(function (canvas) {
                  var imgData = canvas.toDataURL("image/jpeg", 1.0);
                  var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
                  pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
                  for (var i = 1; i <= totalPDFPages; i++) { 
                      pdf.addPage(PDF_Width, PDF_Height);
                      pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
                  }
                  pdf.save("Your_PDF_Name.pdf");
                  // $(".x_panel").hide();
              });
          });



            //PLACE ORDER
            $('#btn_place_order').on('click',function(){
              var csv_cart_items = $('#csv_cart_items').val();
              var shipment_id = $('#shipment_id').val();
              var message = $('#message').val();
             
              $.ajax({
                  url:'<?=site_url('Order/place_order')?>',
                  data: {
                      csv_cart_items:csv_cart_items,
                      shipment_id:shipment_id,
                      message:message,
                      place_order:1
                  },
                  type: 'post',
                  success: function(data){
                    if (data.includes('cust-msg: Success')) {
                      //loads
                      $('#place_order_controller').addClass('invisible');
                      $('#post_payment_controller').removeClass('invisible');
                      $.toast({
                              // text: '<b>'+res.upc+'<b><br>'+res.item_caption, 
                              text: 'Success!',
                              heading: 'msg', 
                              icon: 'success', 
                              showHideTransition: 'slide',
                              allowToastClose: true, 
                              hideAfter: 10000, 
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
                    }else{
                      var msg = data.replace('cust-error:','');
                      $.toast({
                              // text: '<b>'+res.upc+'<b><br>'+res.item_caption, 
                              text: 'Error!',
                              heading: msg, 
                              icon: 'danger', 
                              showHideTransition: 'slide',
                              allowToastClose: true, 
                              hideAfter: 10000, 
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
                    }
                  }


              })
            });
          });


 
        </script>

<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800|Poppins&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Montserrat',sans-serif;
}
.payment-cards{
  max-width: 1100px;
  margin: 0 auto;
  text-align: center;
  padding: 30px;
}
.payment-cards h2.header{
  font-size: 40px;
  margin: 0 0 30px 0;
  text-transform: uppercase;
  letter-spacing: 1px;
}
.services{
  display: flex;
  align-items: center;
}
.card-content{
  display: flex;
  flex-wrap: wrap;
  flex: 1;
  margin: 20px;
  padding: 20px;
  border: 2px solid black;
  border-radius: 4px;
  transition: all .3s ease;
}
.card-content .fab{
  font-size: 70px;
  margin: 16px 0;
}
.card-content > *{
  flex: 1 1 100%;
}
.card-content:hover{
  color: white;
}
.card-content:hover a{
  border-color: white;
  background: white;
}
.card-content-1:hover{
  border-color: #1DA1F2;
  background: #1DA1F2;
}
.card-content-1:hover a{
  color: #1DA1F2;
}
.card-content-2:hover{
  border-color: #E1306C;
  background: #E1306C;
}
.card-content-2:hover a{
  color: #E1306C;
}
.card-content-3:hover{
  border-color: #ff0000;
  background: #ff0000;
}
.card-content-3:hover a{
  color: #ff0000;
}
.card-content h2{
  font-size: 30px;
  margin: 16px 0;
  letter-spacing: 1px;
  text-transform: uppercase;
}
.card-content p{
  font-size: 17px;
  font-family: 'Poppins',sans-serif;
}
.card-content a{
  margin: 22px 0;
  background: black;
  color: white;
  text-decoration: none;
  text-transform: uppercase;
  border: 1px solid black;
  padding: 15px 0;
  border-radius: 25px;
  transition: .3s ease;
}
.card-content a:hover{
  border-radius: 4px;
}
@media (max-width: 900px) {
  .services{
    display: flex;
    flex-direction: column;
  }
}

</style>