
        <script type="text/javascript">
          $(function() {
            var formatter = new Intl.NumberFormat('en-US', {
              style: 'currency',
              currency: 'USD',
            });

            $(document).on('click','#mop',function(e){
                e.preventDefault();

                var mop = $(this).attr('pid');
                var order_id = $(this).closest('div.card-services').attr('order_id');
                // alert(order_id);

                $.redirect("<?=site_url('order/payment');?>", {'mop': mop,'order_id':order_id});

            });
        })
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
  max-width: 1500px;
  margin: 0 auto;
  text-align: center;
  padding: 30px;
  border-style: solid;  
}
.payment-cards h3.header{
  font-size: 40px;
  margin: 0 0 30px 0;
  text-transform: uppercase;
  letter-spacing: 1px;
}
.card-services{
  display: flex;
  align-items: center;
}
.card-content{
  display: flex;
  flex-wrap: wrap;
  flex: 1 1 50%;
  /*flex: 1 0 5%;*/
  /*flex-shrink: 3*/
  margin: 20px;
  padding: 20px;
  border: 2px solid black;
  border-radius: 4px;
  transition: all .3s ease;
  width: 250px;
  height: 400px;

}
.card-content .fab{
  font-size: 90px;
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
  font-size: 12px;
  font-family: 'Poppins',sans-serif;

}
.card-content a{
  margin: 22px 0;
  background: black;
  color: white;
  text-decoration: none;
  text-transform: uppercase;
  border: 1px solid black;
  padding: 5px 0;
  border-radius: 25px;
  transition: .3s ease;
}
.card-content a:hover{
  border-radius: 4px;
}
@media (max-width: 1500px) {
  .card-services{
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
  }
}

</style>