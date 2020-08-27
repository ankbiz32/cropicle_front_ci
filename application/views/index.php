

	<!--Shop-->
	<?php if(!isset($this->session->location_id)){?>
	<div class="clv_shop_wrapper clv_section bg-light" id="prods">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="clv_heading">
						<h3>our shop</h3>
						<div class="clv_underline"><img src="<?=base_url('assets/')?>images/agri_underline2.png" alt="image" /></div>
						<h4 class="text my-4">Explore your area to see whats available !</h4>
						<a class="search_toggle tp-caption rev-btn clv_btn pt-0" href="javascript:;"> <i class="fa fa-map-marker fa-lg"></i>&nbsp; Select area</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } else{?>
	<div class="clv_shop_wrapper clv_section bg-light" id="prods">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="clv_heading">
						<h3>our shop</h3>
						<div class="clv_underline"><img src="<?=base_url('assets/')?>images/agri_underline2.png" alt="image" /></div>
						<h4 class="text text-sm-sm mt-4">
							<strong>
								<!-- <span id="hawker-count">
									<?=isset($hawker_count)?$hawker_count:'0'?><?=isset($hawker_count)?($hawker_count==1?' hawker':' hawkers'):' hawkers'?>
								</span> -->
								<span id="hawker-count">
									1 Hawker 
								</span>
							</strong> 
							available in&nbsp;
							<span id="area-name" class="search_toggle text-success"  data-toggle="popover" title="Edit Area" style="cursor:pointer"> <i class="fa fa-map-marker fa-sm"></i> <?=isset($location)?$location:''?>  &nbsp;<sup style="font-size:14px;" class="text-dark"><i class="fa fa-pencil" ></i></sup></span>
						</h4>
					</div>
					<?php if(isset($prods)){?>
					<div class="">
						<div class="sidebar_search">
							<input type="text" placeholder="Search for items">
							<a href="javascript:;"><i class="fa fa-search" aria-hidden="true"></i></a>
						</div>
					</div>
				<?php }?>
				</div>
			</div>
			<div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="product_list_section">
						<?php if(isset($prods)){?>
                        <div class="product_list_filter">
                            <ul class="d-flex">
                                <li>
                                    <p class="text-left">showing <span><?=sizeof($prods)?></span> items</p>
                                </li>
                                <!-- <li>
                                    <select id="sort-select">
                                        <option value="sort by popularity">Sort by popularity</option>
                                        <option value="sort by price">sort by price</option>
                                        <option value="sort by category">sort by category</option>
                                    </select>
                                </li> -->
                                <li>
                                    <ul class="list_view_toggle ml-auto">
                                        <li><span>view style</span></li>
                                        <li>
                                            <a href="javascript:;" class="active grid_view">
                                                <svg 
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="12px" height="12px">
                                                <path fill-rule="evenodd"  fill="rgb(112, 112, 112)"
                                                d="M6.861,12.000 L6.861,6.861 L12.000,6.861 L12.000,12.000 L6.861,12.000 ZM6.861,-0.000 L12.000,-0.000 L12.000,5.139 L6.861,5.139 L6.861,-0.000 ZM-0.000,6.861 L5.139,6.861 L5.139,12.000 L-0.000,12.000 L-0.000,6.861 ZM-0.000,-0.000 L5.139,-0.000 L5.139,5.139 L-0.000,5.139 L-0.000,-0.000 Z"/>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" class="list_view">
                                                <svg 
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="12px" height="10px">
                                                <path fill-rule="evenodd"  fill="rgb(112, 112, 112)"
                                                d="M3.847,10.000 L3.847,7.783 L12.000,7.783 L12.000,10.000 L3.847,10.000 ZM3.847,3.892 L12.000,3.892 L12.000,6.108 L3.847,6.108 L3.847,3.892 ZM3.847,-0.000 L12.000,-0.000 L12.000,2.216 L3.847,2.216 L3.847,-0.000 ZM-0.000,7.783 L2.297,7.783 L2.297,10.000 L-0.000,10.000 L-0.000,7.783 ZM-0.000,3.892 L2.297,3.892 L2.297,6.108 L-0.000,6.108 L-0.000,3.892 ZM-0.000,-0.000 L2.297,-0.000 L2.297,2.216 L-0.000,2.216 L-0.000,-0.000 Z"/>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
						<?php }?>
                        <div class="product_items_section">
                            <ul class="dynamic-products">
							<?php if(!empty($prods)){ 
								$cart = $this->session->userdata("cart");
								$cart = !empty($cart)?$cart:array();
								foreach($prods as $pr){
								?>
                                <li>
                                    <div class="product_item_block">
                                        <div class="org_product_block <?=$pr->is_active==0 ? ' noStock' : ''?>">
                                            <!-- <span class="product_label">30% off</span> -->
                                            <div class="org_product_image">
												<img src="<?=KART_DOMAIN?>assets/images/items/<?=$pr->item_img?>" alt="<?=$pr->item_name?>">
											</div>
                                            <h5><?=$pr->item_name?></h5>
											<h5>
												₹ &nbsp;<?=$pr->item_price_customer?>/<?=$pr->unit_short_name?>
												<!-- <small> <del><i class="fa fa-inr fa-xl"></i> 50/kg</del></small> -->
											</h5>
											<?php if($pr->is_active==0){?>
												<a href="javascript:;" class="bg-dark"><i class="fa fa-ban"></i>&nbsp; Out of stock</a>
											<?php } else {?>
												<?php if(isset($cart[$pr->id])){?>

														<!-- <a href="<?=base_url('cart')?>" class="bg-success btnAddtoCart<?php echo $pr->id; ?>"><i class='fa fa-check'></i>&nbsp; Added</a> -->
													
														<select id="product_quantity<?=$cart[$pr->id]['product_id'];?>" name="product_quantity<?=$cart[$pr->id]['product_id'];?>" class="demand_quantity" data-product_id="<?=$cart[$pr->id]['product_id'];?>" data-unit="<?=$pr->unit_short_name?>">
															<option value="0">0 <?=$pr->unit_short_name?></option>
															<?php if($pr->unit_short_name=='kg' OR $pr->unit_short_name=='dzn'){?>
															<?php if($pr->unit_short_name=='kg'){?>
															<option <?=$cart[$pr->id]['quantity']==0.25?'selected':''?> value="0.25">0.25 <?=$pr->unit_short_name?></option>
															<?php }?>
															<option <?=$cart[$pr->id]['quantity']==0.5?'selected':''?> value="0.5">0.5 <?=$pr->unit_short_name?></option>
															<?php if($pr->unit_short_name=='kg'){?>
															<option <?=$cart[$pr->id]['quantity']==0.75?'selected':''?> value="0.75">0.75 <?=$pr->unit_short_name?></option>
															<?php }?>
															<?php }?>
															<option <?=$cart[$pr->id]['quantity']==1?'selected':''?> value="1">1 <?=$pr->unit_short_name?></option>
															<option <?=$cart[$pr->id]['quantity']==2?'selected':''?> value="2">2 <?=$pr->unit_short_name?></option>
															<option <?=$cart[$pr->id]['quantity']==3?'selected':''?> value="3">3 <?=$pr->unit_short_name?></option>
															<option <?=$cart[$pr->id]['quantity']==4?'selected':''?> value="4">4 <?=$pr->unit_short_name?></option>
															<option <?=$cart[$pr->id]['quantity']==5?'selected':''?> value="5">5 <?=$pr->unit_short_name?></option>
															<?php if($pr->unit_short_name=='pc'){?>
															<option <?=$cart[$pr->id]['quantity']==6?'selected':''?> value="6">6 <?=$pr->unit_short_name?></option>
															<option <?=$cart[$pr->id]['quantity']==7?'selected':''?> value="7">7 <?=$pr->unit_short_name?></option>
															<option <?=$cart[$pr->id]['quantity']==8?'selected':''?> value="8">8 <?=$pr->unit_short_name?></option>
															<option <?=$cart[$pr->id]['quantity']==9?'selected':''?> value="9">9 <?=$pr->unit_short_name?></option>
															<option <?=$cart[$pr->id]['quantity']==10?'selected':''?> value="10">10 <?=$pr->unit_short_name?></option>
															<?php }?>
														</select>

														<!-- <a href="javascript:void(0);" id="remover<?=$pr->id?>" class="remover text-danger bg-white" onclick="removeCartItem(<?=$pr->id?>);"><i class="fa fa-times"></i> Remove</a> -->
														
													<?php }
													else{
													?>
														<a href="javascript:;" title="Add to demand" onclick="addToCart(<?=$pr->id?>, 1, '<?=$pr->unit_short_name?>')" class="btnAddtoCart<?php echo $pr->id; ?> toAdd"><i class="fa fa-plus"></i>&nbsp; Add</a>
												<?php }
											 }?>
                                        </div>
                                        <div class="content_block">
                                            <div class="product_price_box"> 
                                                <h5><?=$pr->item_name?></h5>            
                                                <h5><span>₹</span><?=$pr->item_price_customer?><small>/<?=$pr->unit_short_name?> </small></h5>   
                                            </div>
                                            <p>Fruits & Veggies</p>
                                             <!-- <div class="rating_section">
                                                <span>4.1</span>
                                                <ul>
                                                    <li><a class="active" href="javascript:;"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a class="active" href="javascript:;"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a class="active" href="javascript:;"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="javascript:;"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="javascript:;"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                </ul>
                                                <p>151 reviews</p>
                                            </div>
                                            <ul class="product_code">
                                                <li>
                                                    <p>product code: 12948</p>
                                                </li>
                                                <li>
                                                    <p>availability: <span>in stock</span></p>
                                                </li>
                                            </ul>
                                            <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt utte labore et dolore magna aliqua Ut enim ad minim</p> -->
                                        </div>
                                    </div>
                                </li>
							<?php }}?>
                            </ul>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
	<?php }?>

</div>
<div class="clv_main_wrapper gallery_page">
	
	<div class="clv_gallery_wrapper clv_section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 col-md-6">
						<div class="clv_heading">
							<h3>our gallery</h3>
							<div class="clv_underline"><img src="<?=base_url()?>assets/images/underline3.png" alt="image" /></div>
							<p>See the fresh veggies that are directly delivered to you from our farms.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="gallery_slide">
							<div class="gallery_grid">
								<div class="gallery_grid_item">
									<div class="gallery_image">
										<img src="<?=base_url('assets/')?>images/0gall.jpg" alt="image" />
										<div class="gallery_overlay">
											<a href="<?=base_url('assets/')?>images/0gall.jpg" class="view_image"><span><i class="fa fa-search" aria-hidden="true"></i></span></a>
										</div>
									</div>
								</div>
								<div class="gallery_grid_item">
									<div class="gallery_image">
										<img src="<?=base_url('assets/')?>images/3gall.jpg" alt="image" />
										<div class="gallery_overlay">
											<a href="<?=base_url('assets/')?>images/3gall.jpg" class="view_image"><span><i class="fa fa-search" aria-hidden="true"></i></span></a>
										</div>
									</div>
								</div>
								<div class="gallery_grid_item">
									<div class="gallery_image">
										<img src="<?=base_url('assets/')?>images/1gall.jpg" alt="image" />
										<div class="gallery_overlay">
											<a href="<?=base_url('assets/')?>images/1gall.jpg" class="view_image"><span><i class="fa fa-search" aria-hidden="true"></i></span></a>
										</div>
									</div>
								</div>
								<div class="gallery_grid_item">
									<div class="gallery_image">
										<img src="<?=base_url('assets/')?>images/2gall.jpg" alt="image" />
										<div class="gallery_overlay">
											<a href="<?=base_url('assets/')?>images/2gall.jpg" class="view_image"><span><i class="fa fa-search" aria-hidden="true"></i></span></a>
										</div>
									</div>
								</div>
								<div class="gallery_grid_item">
									<div class="gallery_image">
										<img src="<?=base_url('assets/')?>images/4gall.jpg" alt="image" />
										<div class="gallery_overlay">
											<a href="<?=base_url('assets/')?>images/4gall.jpg" class="view_image"><span><i class="fa fa-search" aria-hidden="true"></i></span></a>
										</div>
									</div>
								</div>
								<!-- <div class="gallery_grid_item">
									<div class="gallery_image">
										<img src="https://via.placeholder.com/370x310" alt="image" />
										<div class="gallery_overlay">
											<a href="https://via.placeholder.com/550x550" class="view_image"><span><i class="fa fa-search" aria-hidden="true"></i></span></a>
										</div>
									</div>
								</div>
								<div class="gallery_grid_item">
									<div class="gallery_image">
										<img src="https://via.placeholder.com/370x260" alt="image" />
										<div class="gallery_overlay">
											<a href="https://via.placeholder.com/550x550" class="view_image"><span><i class="fa fa-search" aria-hidden="true"></i></span></a>
										</div>
									</div>
								</div>
								<div class="gallery_grid_item">
									<div class="gallery_image">
										<img src="https://via.placeholder.com/370x260" alt="image" />
										<div class="gallery_overlay">	
											<a href="https://via.placeholder.com/550x550" class="view_image"><span><i class="fa fa-search" aria-hidden="true"></i></span></a>
										</div>
									</div>
								</div>  -->
							</div>
						</div>
						</div>
						<!-- <div class="col-md-12">
							<div class="load_more_btn">
								<a href="<?=base_url()?>gallery" class="clv_btn">view more</a>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>

		
		<script>
        var loc="<?=base_url()?>";
    </script>

