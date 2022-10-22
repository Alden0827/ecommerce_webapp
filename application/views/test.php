

sadasd
sadasd
sadasd
sadasd
sadasd
sadasd
sadasd
sadasd
sadasd
sadasd
sadasd
sadasd
sadasd
sadasd
sadasd
sadasd
sadasd
sadasd
 <button class="btn btn-default" id="btn_place_order"><i class="fa fa-print"></i> Print</button>

 <script type="text/javascript">
 	
 	 $('#btn_place_order').on('click',function(){
 	 		
              $.ajax({
                  url:'<?=site_url('Test/returnjson')?>',
                  dataType:"json",
                  data: {
                      place_order:1
                  },
                  type: 'post',
                  success: function(response){
                  	console.log(response.order_id);

                  }


              })
            });
      

 </script>