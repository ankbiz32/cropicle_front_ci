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
				beforeSend: function(){
        			$(".btnAddtoCart"+product_id).html("<i class='fa fa-spin fa-spinner'></i>&nbsp; Adding");
				},
        		success: function(resp) {
        			if(resp.status == '200'){
        				//alert("Added to cart");
        				$(".footer-cart").addClass('visible');
        				$(".cart_toggle span").html(resp.data.totalItems);
        				$(".cart_toggle_float span").html(resp.data.totalItems);
        				$(".clv_cart_box").html(resp.data.content);
        				$(".footer-cart span.finalTotal").html(resp.data.finalTotal);
        				$(".clv_cart_box").css('height','350px');
        				$(".btnAddtoCart"+product_id).attr("onclick","");
        				$(".btnAddtoCart"+product_id).attr("href","<?=base_url('cart')?>");
        				$(".btnAddtoCart"+product_id).removeAttr("title");
        				$(".btnAddtoCart"+product_id).addClass("bg-success");
        				$(".btnAddtoCart"+product_id).html("<i class='fa fa-check'></i>&nbsp; Added");
						Alert.fire({icon: 'success',title: 'Added to cart'});
        			}
        			else{
        				$(".btnAddtoCart"+product_id).html("<i class='fa fa-plus'></i>&nbsp; Add");
						Alert.fire({icon: 'error',title: resp.msg});
        				// alert(resp.msg);
        			}
        		},
        		error: function(err) {
        			$(".btnAddtoCart"+product_id).html("<i class='fa fa-plus'></i>&nbsp; Add");
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
				beforeSend:function(resp) {
						$(".pro_remove"+product_id).html(`<i class="fa fa-spinner fa-spin"></i>`);
				},
				success: function(resp) {
					if(resp.status == '200'){
						$(".cart_toggle span").html(resp.data.totalItems);
        				$(".cart_toggle_float span").html(resp.data.totalItems);
						$(".clv_cart_box").html(resp.data.content);
						$(".productRow"+product_id).remove();
						$(".table_heading h4").html(resp.data.totalItems+' items in your cart');
						$(".pro_final_total h5").html('₹ '+resp.data.finalTotal);
        				$(".footer-cart span.finalTotal").html(resp.data.finalTotal);
						$(".btnAddtoCart"+product_id).attr("onclick","addToCart("+product_id+",1)");
						$(".btnAddtoCart"+product_id).attr("title","Add to demand");
						$(".btnAddtoCart"+product_id).attr("href","javascript:;");
						$(".btnAddtoCart"+product_id).html("<i class='fa fa-plus'></i>&nbsp; Add");
						$(".btnAddtoCart"+product_id).removeClass("bg-success");
						if(!resp.data.totalItems){
							$('.checkout_btn_block').remove();
						}
						Alert.fire({icon: 'success',title: 'Item removed from cart'});
						// alert("Item removed from cart");
					}
				},
				error: function(err) {
					$(".pro_remove"+product_id).html(`<i class="fa fa-times fa-lg"></i>`);
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
				beforeSend: function(resp) {
					$(".product_total"+product_id ).html('<small><span class=""><strong>Total:</strong> <i class="fa fa-spinner fa-spin"></i></span></small>');
				},
				success: function(resp) {
					if(resp.status == '200'){
						//alert("Added to cart");
						$(".cart_toggle span").html(resp.data.totalItems);
        				$(".cart_toggle_float span").html(resp.data.totalItems);
						$(".table_heading h4").html(resp.data.totalItems+' items in your cart');
						$(".clv_cart_box").html(resp.data.content);
						$(".product_total"+product_id ).html('<small><span class=""><strong>Total:</strong> ₹'+resp.data.total+'/-</span></small>');
						$(".pro_final_total h5").html('₹ '+resp.data.finalTotal);
        				$(".footer-cart span.finalTotal").html(resp.data.finalTotal);
						Alert.fire({icon:'success',title: 'Cart updated'});
					}
					else{
						$.notify(resp.msg, "error");
					}
				},
				error: function(err) {
					$(".product_total"+product_id ).html('<small><span class="text-danger">Error !</span></small>');
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