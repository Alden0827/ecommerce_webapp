
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
<!--             <div class="page-title">
              <div class="title_left">
                <h3>MY APP | Checouts</h3>
              </div>


            </div> -->
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>MY APP | <small>Checouts</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <!-- Smart Wizard -->
                    <p>Instruction here</p>
                    <div id="wizard" class="form_wizard wizard_verticle">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1<br />
                                              <small>Review Purchase Order</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br />
                                              <small>Delivery Options</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Step 3<br />
                                              <small>Payment Options</small>
                                          </span>
                          </a>
                        </li>
                      </ul>
                      <div id="step-1">



                      </div>
                      <div id="step-2">







                      </div>
                      <div id="step-3">

                          <div class="row justify-content-center">
                              <div class="col-md-9">
                                  <div class="card text-center justify-content-center shaodw-lg  card-1 border-0 bg-white px-sm-2">
                                      <div class="card-body show  ">
                                          <div class="row">
                                              <div class="col">
                                                  <h5><b>Mode of Payment</b></h5>
                                                  <p> Not my prefered delivery address ? <span class=" ml-1 cursor-pointer"> Change</span> </p>
                                              </div>
                                          </div>
                                          <div class="radio-group row justify-content-between px-3 text-center a">
                                              <div class="col-auto mr-sm-2 mx-1 card-block  py-0 text-center radio selected ">
                                                  <div class="flex-row">
                                                      <div class="col">
                                                          <div class="pic2">
                                                              <a href="aaa">
                                                                <img class="irc_mut img-fluid" src="<?=site_url('assets/images/stripe_secure.jpg')?>" width="200" height="200"> 
                                                              </a>
                                                          </div>
                                                          
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-auto ml-sm-2 mx-1 card-block  py-0 text-center radio  ">
                                                  <div class="flex-row">
                                                      <div class="col">
                                                          <div class="pic2"> 
                                                                <img class="irc_mut img-fluid" src="<?=site_url('assets/images/google_pay.jpg')?>" width="200" height="200"> 
                                                          </div>
                                                         
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-auto ml-sm-2 mx-1 card-block  py-0 text-center radio  ">
                                                  <div class="flex-row">
                                                      <div class="col">
                                                          <div class="pic2"> 
                                                                <img class="irc_mut img-fluid" src="<?=site_url('assets/images/paypal.jpg')?>" width="200" height="200"> 
                                                          </div>
                                                          
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row justify-content-center">
                                              <div class="col">
                                                  <p class="text-muted">Select your prefered payment option.</p>
                                              </div>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                          </div>




                      </div>


                    </div>
                    <!-- End SmartWizard Content -->





                    <h2>Example: Vertical Style</h2>
                    <!-- Tabs -->
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->



<style type="text/css">
  
body {
    letter-spacing: 0.7px;
    background-color: #eee;
}

/*.container {
    margin-top: 100px;
    margin-bottom: 100px;
}*/

p {
    font-size: 14px;
}

.btn-primary{
    background-color: #42A5F5 !important;
    border-color: #42A5F5 !important;
}

.cursor-pointer {
    cursor: pointer;
    color: #42A5F5;
}

.pic {
    margin-top: 30px;
    margin-bottom: 20px;
}

.pic2 {
    margin-top: 30px;
    margin-bottom: 20px;
}


.card-block {
    width: 200px;
    border: 1px solid lightgrey;
    border-radius: 5px !important;
    background-color: #FAFAFA;
    margin-bottom: 30px;
}

.card-body.show {
    display: block;
}

.card {
    padding-bottom: 20px;
    box-shadow: 2px 2px 6px 0px rgb(200, 167, 216);
}

.radio {
    display: inline-block;
    border-radius: 0;
    box-sizing: border-box;
    cursor: pointer;
    color: #000;
    font-weight: 500;
    -webkit-filter: grayscale(100%);
    -moz-filter: grayscale(100%);
    -o-filter: grayscale(100%);
    -ms-filter: grayscale(100%);
    filter: grayscale(100%);
}


.radio:hover {
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.1);
}

.radio.selected {
    box-shadow: 0px 8px 16px 0px #EEEEEE;
    -webkit-filter: grayscale(0%);
    -moz-filter: grayscale(0%);
    -o-filter: grayscale(0%);
    -ms-filter: grayscale(0%);
    filter: grayscale(0%);
}

.selected {
    background-color: #E0F2F1;
}

.a {
    justify-content: center !important;
}


.btn {
    border-radius: 0px;
}

.btn,
.btn:focus,
.btn:active {
    outline: none !important;
    box-shadow: none !important;
}

</style>

<script type="text/javascript">
  
$(document).ready(function () {
    $('.radio-group .radio').click(function () {
        $('.selected .fa').removeClass('fa-check');
        $('.radio').removeClass('selected');
        $(this).addClass('selected');
    });
});

</script>