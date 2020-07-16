<script>

function buyNow(product_id,quantity){
	//alert("Product ID : "+ product_id +", "+ "Quantity: "+ quantity);
	if(product_id && quantity > 0){
		$.ajax({
			type: "POST",
			url: '<?php echo site_url("/commons/addToCart"); ?>',
			data:{
				"<?php echo $this->security->get_csrf_token_name();?>":"<?php echo $this->security->get_csrf_hash();?>",
				"product_id":product_id,
				"quantity":quantity,
			},
			cache: false,
			success: function(resp) {
				if(resp.status == '200'){
					//alert("Added to cart");
					$(".cart_quantity").html(resp.data.totalItems);
					$(".mini_cart").html(resp.data.content);
					$(".btnAddtoCart"+product_id).attr("onclick","");
					$(".btnAddtoCart"+product_id).removeClass("btn-info");
					$(".btnAddtoCart"+product_id).addClass("btn-danger");
					$(".btnAddtoCart"+product_id).html("Added");
					//alert("Added to cart");
					//$.notify("Item added to cart", "success");
					window.location.href="<?php echo site_url("/products/cart"); ?>";
				}
				else{
					$.notify(resp.msg, "error");
				}
			},
			error: function(err) {
				$.notify("Unable to add item!", "error");
			}
		});
	}
	else{
		$.notify("Product and Quantity greater than 0 required!", "error");
		//alert("Product and Quantity greater than 0 required!");
	}
}
</script>