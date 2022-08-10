

<nav style='margin-left:10px'>
    <a href='./product_details.php'>Product Details</a> |
    <a href='./dashboard_add_prod.php'>Product Add</a> |
    <a id="seller_detials" href='./seller_details.php'>Seller Details</a>
 </nav>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#seller_detials").on("click",function(e){

e.preventDefault();
                $.ajax({
					url:"seller_details.php",
					type:"POST",
					success:function(data){
						$("#main_div").html(data);
					}
				});
			});
		});
</script>