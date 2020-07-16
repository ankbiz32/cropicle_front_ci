<script>
	const Alert = Swal.mixin({
		toast: true,
		position: 'top-right',
		showConfirmButton: false,
		timer: 3000
	});

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
						Alert.fire({icon: 'success',title: 'Added to cart'});
        			}
        			else{
						Alert.fire({icon: 'error',title: resp.msg});
        				// alert(resp.msg);
        			}
        		},
        		error: function(err) {
					Alert.fire({icon: 'error',title:"Unable to add item"});
        			// alert("Unable to add item");
        		}
        	});
        }
        else{
			Alert.fire({icon: 'error',title:"Product and Quantity greater than 0 required!"});
        }
    }
	
	function removeCartItem(product_id){
		// alert("Product ID : "+ product_id);
		if(product_id){
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
						$(".table_heading h4").html(resp.data.totalItems+' items in your cart');
						$(".pro_final_total h5").html('₹ '+resp.data.finalTotal);
						$(".btnAddtoCart"+product_id).attr("onclick","addToCart("+product_id+",1)");
						$(".btnAddtoCart"+product_id).html("Add to demand");
						Alert.fire({icon: 'success',title: 'Item removed from cart'});
						// alert("Item removed from cart");
					}
				},
				error: function(err) {
					Alert.fire({icon: 'error',title: 'Unable to remove item!'});
					// alert("Unable to remove item!");
				} 
			});
		}
		else{
			Alert.fire({icon: 'error',title: 'Product and Quantity greater than 0 required!'});
			// alert("Product and Quantity greater than 0 required!");
		}
	}

	function updateCart(product_id,quantity){
		//alert("Product ID : "+ product_id +", "+ "Quantity: "+ quantity);
		if(product_id && quantity > 0){
			$.ajax({
				type: "POST",
				url: '<?php echo site_url("/Commons/updateCart"); ?>',
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
						$(".table_heading h4").html(resp.data.totalItems+' items in your cart');
						$(".clv_cart_box").html(resp.data.content);
						$(".product_total"+product_id ).html('<h5>₹ '+resp.data.total+'</h5>');
						$(".pro_final_total h5").html('₹ '+resp.data.finalTotal);
						Alert.fire({icon:'success',title: 'Cart updated'});
					}
					else{
						$.notify(resp.msg, "error");
					}
				},
				error: function(err) {
						Alert.fire({icon:'error',title: 'Unable to update cart!'});
				}
			});
		}
		else{
			Alert.fire({icon:'error',title: 'Product and Quantity greater than 0 required!'});
			//alert("Product and Quantity greater than 0 required!");
		}
	}


</script>