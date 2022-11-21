
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
                  dataType:"json",
                  data: {
                      csv_cart_items:csv_cart_items,
                      shipment_id:shipment_id,
                      message:message,
                      place_order:1
                  },
                  type: 'post',
                  success: function(response){
                    console.log(response);
                    if (response.result === 'error') {
                      $.toast({
                              // text: '<b>'+res.upc+'<b><br>'+res.item_caption, 
                              text: 'Error!',
                              heading: response.error_message, 
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
                    }else if (response.result === 'success'){
                      //redirect with post
                      // $.redirect("<?=site_url('order/checkout');?>", {'order_id': response.order_id});
                      window.location.href = "<?=site_url('order/checkout/');?>" + response.order_id;
                    }
                  }


              })
            });
          });


 
        </script>

