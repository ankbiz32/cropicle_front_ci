<script>
function addToCart(product_id,quantity){
	alert("Product ID : "+ product_id +", "+ "Quantity: "+ quantity);
	// if(product_id && quantity > 0){
	// 	$.ajax({
	// 		type: "POST",
	// 		url: '<?php echo site_url("/commons/addToCart"); ?>',
	// 		data:{
	// 			"<?php echo $this->security->get_csrf_token_name();?>":"<?php echo $this->security->get_csrf_hash();?>",
	// 			"product_id":product_id,
	// 			"quantity":quantity,
	// 		},
	// 		cache: false,
	// 		success: function(resp) {
	// 			if(resp.status == '200'){
	// 				//alert("Added to cart");
	// 				$(".cart_quantity").html(resp.data.totalItems);
	// 				$(".mini_cart").html(resp.data.content);
	// 				$(".btnAddtoCart"+product_id).attr("onclick","");
	// 				$(".btnAddtoCart"+product_id).removeClass("btn-info");
	// 				$(".btnAddtoCart"+product_id).addClass("btn-danger");
	// 				$(".btnAddtoCart"+product_id).html("Added");
	// 				alert("Added to cart");
	// 				// $.notify("Item added to cart", "success");
	// 			}
	// 			else{
	// 				alert(resp.msg);
	// 				// $.notify(resp.msg, "error");
	// 			}
	// 		},
	// 		error: function(err) {
	// 			alert("Unable to add item");
	// 			// $.notify("Unable to add item!", "error");
	// 		}
	// 	});
	// }
	// else{
	// 	// $.notify("Product and Quantity greater than 0 required!", "error");
	// 	alert("Product and Quantity greater than 0 required!");
	// }
}

function removeCartItem(product_id){
	//alert("Product ID : "+ product_id);
	if(product_id){
	var c = confirm("Are you sure?");
		if(c){
			$.ajax({
				type: "POST",
				url: '<?php echo site_url("/commons/removeCartItem"); ?>',
				data:{
					"<?php echo $this->security->get_csrf_token_name();?>":"<?php echo $this->security->get_csrf_hash();?>",
					"product_id":product_id,
				},
				cache: false,
				success: function(resp) {
					if(resp.status == '200'){
						//alert("Added to cart");
						$(".cart_quantity").html(resp.data.totalItems);
						$(".mini_cart").html(resp.data.content);
						$(".productRow"+product_id).remove();
						//alert("Added to cart");
						$(".lbl_subtotal").html(resp.data.subTotal);
						$(".lbl_shipping_charge").html(resp.data.shippingCharges);
						$(".lbl_final_total").html(resp.data.finalTotal);
						$.notify("Item removed from cart", "success");
					}
				},
				error: function(err) {
					$.notify("Unable to add item!", "error");
				} 
			});
		}
	}
	else{
		$.notify("Product required!", "error");
		//alert("Product and Quantity greater than 0 required!");
	}
}

function updateCart(product_id,quantity){
	//alert("Product ID : "+ product_id +", "+ "Quantity: "+ quantity);
	if(product_id && quantity > 0){
		$.ajax({
			type: "POST",
			url: '<?php echo site_url("/commons/updateCart"); ?>',
			data:{
				"<?php echo $this->security->get_csrf_token_name();?>":"<?php echo $this->security->get_csrf_hash();?>",
				"product_id":product_id,
				"quantity":quantity,
			},
			cache: false,
			success: function(resp) {
				if(resp.status == '200'){
					//alert("Added to cart");
					var shipping_charge = <?php echo $this->configuration_model->getShippingCharges();?>;
					$(".cart_quantity").html(resp.data.totalItems);
					$(".mini_cart").html(resp.data.content);
					$("#product_quantity"+product_id).val(resp.data.quantity);
					$(".product_total"+product_id).html(resp.data.total);
					$(".lbl_subtotal").html(resp.data.finalTotal);
					$(".lbl_shipping_charge").html(shipping_charge);
					$(".lbl_final_total").html(resp.data.finalTotal + shipping_charge);
					
					$("#product_quantity_dtl").val(resp.data.quantity);
					$.notify("Cart updated", "success");
				}
				else{
					$.notify(resp.msg, "error");
				}
			},
			error: function(err) {
				$.notify("Unable to update cart!", "error");
			}
		});
	}
	else{
		$.notify("Product and Quantity greater than 0 required!", "error");
		//alert("Product and Quantity greater than 0 required!");
	}
}

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