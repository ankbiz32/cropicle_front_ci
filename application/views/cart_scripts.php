<script>

	const Alert = Swal.mixin({
		toast: true,
		position: 'top-right',
		showConfirmButton: false,
		timer: 3000
	});

	
	function removeCartItem(product_id, short_unit){
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
        				$(".profile-drop sup").html(resp.data.totalItems);
						$(".clv_cart_box").html(resp.data.content);
						$(".productRow"+product_id).remove();
						$(".table_heading h4").html(resp.data.totalItems+' items in your cart');
						$(".pro_final_total h5").html('₹ '+resp.data.finalTotal);
        				$(".footer-cart span.finalTotal").html(resp.data.finalTotal);
						// $(".btnAddtoCart"+product_id).attr("onclick","addToCart("+product_id+",1,'"+short_unit+"')");
						// $(".btnAddtoCart"+product_id).attr("title","Add to demand");
						// $(".btnAddtoCart"+product_id).attr("href","javascript:;");
						// $(".btnAddtoCart"+product_id).addClass("toAdd");
						// $(".btnAddtoCart"+product_id).html("<i class='fa fa-plus'></i>&nbsp; Add");
						$("#remover"+product_id ).addClass('hidden');
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
        				$(".profile-drop sup").html(resp.data.totalItems);
						$(".table_heading h4").html(resp.data.totalItems+' items in your cart');
						$(".clv_cart_box").html(resp.data.content);
						$(".product_total"+product_id ).html('<small><span class=""><strong>Total:</strong> ₹'+resp.data.total+'/-</span></small>');
						$(".pro_final_total h5").html('₹ '+resp.data.finalTotal);
        				$(".footer-cart span.finalTotal").html(resp.data.finalTotal);
						$("#remover"+product_id ).removeClass('hidden');
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
	
	function addToCart(product_id, quantity, short_unit){
        // alert("Product ID : "+ product_id +", "+ "Quantity: "+ quantity+ "Unit: "+ short_unit);
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
        				$(".profile-drop sup").html(resp.data.totalItems);
        				$(".clv_cart_box").html(resp.data.content);
        				$(".footer-cart span.finalTotal").html(resp.data.finalTotal);
        				$(".clv_cart_box").css('height','350px');
        				$(".btnAddtoCart"+product_id).attr("onclick","");
        				$(".btnAddtoCart"+product_id).removeAttr("title");
						$(".btnAddtoCart"+product_id).removeClass("toAdd");
						var selection=`
									<select id="product_quantity`+product_id+`" name="product_quantity`+product_id+`" class="demand_quantity" data-product_id="`+product_id+`" data-unit="`+short_unit+`">
									<option value="0">0 `+short_unit+`</option>
								`;
								if(short_unit=='kg' || short_unit=='dzn'){
									if(short_unit=='kg'){
										selection+=`<option value="0.25">0.25 `+short_unit+`</option>`;
									}
									selection+=`<option value="0.5">0.5 `+short_unit+`</option>`;
									if(short_unit=='kg'){
										selection+=`<option value="0.75">0.75 `+short_unit+`</option>`;
									}
								}
								selection+=`
									<option value="1" selected>1 `+short_unit+`</option>
									<option value="2">2 `+short_unit+`</option>
									<option value="3">3 `+short_unit+`</option>
									<option value="4">4 `+short_unit+`</option>
									<option value="5">5 `+short_unit+`</option>
								`;
								
								if(short_unit=='pc'){
									selection+=`
										<option value="6">6 `+short_unit+`</option>
										<option value="7">7 `+short_unit+`</option>
										<option value="8">8 `+short_unit+`</option>
										<option value="9">9 `+short_unit+`</option>
										<option value="10">10 `+short_unit+`</option>
									`;
								}
						selection+=`</select>`;
						// remover=`
						// 		<a href="javascript:void(0);" id="remover`+product_id+`" class="remover bg-danger" onclick="removeCartItem(`+product_id+`);"><i class="fa fa-times"></i></a>>
						// 	`;
						$(selection).insertAfter( $( ".btnAddtoCart"+product_id) );
						// $(remover).insertAfter( $( ".btnAddtoCart"+product_id) );
						$(".btnAddtoCart"+product_id).hide();
						$('#product_quantity'+product_id).focus().click();
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
</script>