


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
                                  <td>$<?=number_format($item->discounted_unit_price,2);?></td>
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


                        <?=$action_container?>



                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


