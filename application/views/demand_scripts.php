<script>
	var submitted=false;
    <?php if(isset($this->session->cart)){?>
			$('.checkout-button').click(function() {
				$(`
					<form class="row" id="demand-form"  method="POST" action="`+loc+`save-demand">
						<div class="col-md-6">
							<div class="form_block">
								<h6>Name</h6>
								<input type="text" class="form_field bg-light" value="<?=isset($this->session->user)?$this->session->user->name:''?>" readonly required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form_block">
								<h6>Contact no.</h6>
								<input type="text" name="mobile_no" value="<?=isset($this->session->user)?$this->session->user->mobile_no:''?>" minlength="10" maxlength="10" <?=$this->session->user->login_oauth_uid!=NULL?'class="form_field digits"':'class="form_field digits bg-light" readonly'?> required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form_block">
								<h6>Email</h6>
								<input type="email" value="<?=$this->session->user->email?>" name="email" <?=$this->session->user->login_oauth_uid!=NULL?'class="form_field bg-light" readonly':' class="form_field"'?>>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form_block">
								<h6>Area</h6>
								<select class="form_field" name="location_id" required>
									<option value="" hidden >-- Select your area --</option>
									<?php foreach($loc as $l){?>
									<option value="<?=$l->id?>" <?=$l->id==$this->session->location_id?' selected':''?>>
										<?=$l->area.', '.$l->city.', '.$l->state.' ('.$l->pin_code.')'?>
									</option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form_block">
								<h6>Address</h6>
								<textarea class="form_field" name="address" placeholder="Enter full address" required><?=$profile->address?></textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form_block">
								<h6>Remarks</h6>
								<textarea class="form_field" placeholder="Enter any additional requirements or message" maxlength="300" name="cust_remarks" row="5"></textarea>
							</div>
						</div>
						<div class="col mt-1 pr-0 text-center text-sm-left">
							<a class="back_btn mr-1 mr-sm-2 mb-sm-0 mb-2" href="cart">Back to cart</a>
							<button type="button" onclick="submit_handler()" class="clv_btn checkout-button" id="chkoutbtn">Send demand</button>
						</div>
					</form>
				`).insertBefore('.checkout_btn_block');

				$(this).remove();
				$(".cart_table").remove();
			});
	<?php } ?>

	function submit_handler(){
		if(!submitted){
			if($('#demand-form').valid()){
				submitted=true;
				$('#chkoutbtn').html('submitting &nbsp; <i class="fa fa-spinner fa-spin"></i>');
				$('#demand-form').submit();
			}
		}
	}

	// $('.checkout-button').click(function() {
	// 	$(`
	// 		<form method="POST" action="`+loc+`save-demand">
	// 			<div class="row mt-0 mb-0 pt-4 form_block pl-1" style="border-top:2px solid #ddd">
	// 				<textarea class="col-sm-6 form_field" placeholder="Enter any additional requirements or message" maxlength="300" name="cust_remarks" row="5"></textarea>
	// 			</div>
	// 			<div class="row mt-1 pr-0 form_block pl-1">
	// 				<p class="text-right col-sm-6 p-0" style="font-size:14px; color:#aaa">*Max 300 characs.</p>
	// 			</div>
	// 			<div class="row mt-1 pr-0">
	// 				<a class="clv_btn bg-white mr-2" href="cart">Back to cart</a>
	// 				<button type="submit" class="clv_btn checkout-button" id="chkoutbtn">Send demand</button>
	// 			</div>
	// 		</form>
	// 	`).insertBefore('.checkout_btn_block');

	// 	$(this).remove();
	// 	$(".cart_table").remove();
    // });
    
</script>