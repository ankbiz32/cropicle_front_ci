<script>

    function addToCart(product_id,quantity){
        // alert("Product ID : "+ product_id +", "+ "Quantity: "+ quantity);
        if(product_id && quantity > 0){
        	$.ajax({
        		type: "POST",
        		url: '<?php echo site_url("/Commons/addToCart"); ?>',
        		data:{
        			"<?php echo $this->security->get_csrf_token_name();?>":"<?php echo $this->security->get_csrf_hash();?>",
        			"product_id":product_id,
        			"quantity":quantity,
        		},
        		cache: false,
        		success: function(resp) {
        			if(resp.status == '200'){
        				//alert("Added to cart");
        				$(".cart_toggle span").html(resp.data.totalItems);
        				$(".clv_cart_box").html(resp.data.content);
        				$(".clv_cart_box").css('height','350px');
        				$(".btnAddtoCart"+product_id).attr("onclick","");
        				$(".btnAddtoCart"+product_id).html("Added");
        				alert("Added to cart");
        				// $.notify("Item added to cart", "success");
        			}
        			else{
        				alert(resp.msg);
        				// $.notify(resp.msg, "error");
        			}
        		},
        		error: function(err) {
        			alert("Unable to add item");
        			// $.notify("Unable to add item!", "error");
        		}
        	});
        }
        else{
        	// $.notify("Product and Quantity greater than 0 required!", "error");
        	alert("Product and Quantity greater than 0 required!");
        }
    }
	
	function removeCartItem(product_id){
		// alert("Product ID : "+ product_id);
		if(product_id){
		var c = confirm("Are you sure?");
			if(c){
				$.ajax({
					type: "POST",
					url: '<?php echo site_url("/Commons/removeCartItem"); ?>',
					data:{
						"<?php echo $this->security->get_csrf_token_name();?>":"<?php echo $this->security->get_csrf_hash();?>",
						"product_id":product_id,
					},
					cache: false,
					success: function(resp) {
						if(resp.status == '200'){
							$(".cart_toggle span").html(resp.data.totalItems);
							$(".clv_cart_box").html(resp.data.content);
							$(".productRow"+product_id).remove();
							$(".lbl_final_total").html(resp.data.finalTotal);
							$(".btnAddtoCart"+product_id).attr("onclick","addToCart("+product_id+",1)");
							$(".btnAddtoCart"+product_id).html("Add to demand");
							alert("Item removed from cart");
							// $.notify("Item removed from cart", "success");
						}
					},
					error: function(err) {
						alert("Unable to remove item!");
						// $.notify("Unable to add item!", "error");
					} 
				});
			}
		}
		else{
			// $.notify("Product required!", "error");
			alert("Product and Quantity greater than 0 required!");
		}
	}

</script>