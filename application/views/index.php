

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
							<span id="area-name" class="search_toggle text-success" style="cursor:pointer"> <i class="fa fa-map-marker fa-sm"></i> <?=isset($location)?$location:''?></span>
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
                            <ul>
                                <li>
                                    <p>showing <span><?=sizeof($prods)?></span> items</p>
                                </li>
                                <!-- <li>
                                    <select id="sort-select">
                                        <option value="sort by popularity">Sort by popularity</option>
                                        <option value="sort by price">sort by price</option>
                                        <option value="sort by category">sort by category</option>
                                    </select>
                                </li> -->
                                <li>
                                    <ul class="list_view_toggle">
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
                                        <div class="org_product_block">
                                            <!-- <span class="product_label">30% off</span> -->
                                            <div class="org_product_image">
												<img src="<?=KART_DOMAIN?>assets/images/items/<?=$pr->item_img?>" alt="<?=$pr->item_name?>">
											</div>
                                            <h5><?=$pr->item_name?></h5>
											<h5>
												₹ &nbsp;<?=$pr->item_price_customer?>/kg
												<!-- <small> <del><i class="fa fa-inr fa-xl"></i> 50/kg</del></small> -->
											</h5>
											<?php if(isset($cart[$pr->id])){?>
													<a href="<?=base_url('cart')?>" class="bg-success btnAddtoCart<?php echo $pr->id; ?>"><i class='fa fa-check'></i>&nbsp; Added</a>
												<?php }
												else{
												?>
													<a href="javascript:;" title="Add to demand" onclick="addToCart(<?=$pr->id?>, 1);" class="btnAddtoCart<?php echo $pr->id; ?>"><i class="fa fa-plus"></i>&nbsp; Add</a>
											<?php }?>
                                        </div>
                                        <div class="content_block">
                                            <div class="product_price_box"> 
                                                <h5><?=$pr->item_name?></h5>            
                                                <h5><span>₹</span><?=$pr->item_price_customer?><small>/kg </small></h5>   
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
                        <!-- <div class="blog_pagination_section">
                            <ul>
                                <li class="blog_page_arrow">
                                    <a href="javascript:;">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="15px">
                                        <path fill-rule="evenodd" fill="rgb(112, 112, 112)" d="M0.324,8.222 L7.117,14.685 C7.549,15.097 8.249,15.097 8.681,14.685 C9.113,14.273 9.113,13.608 8.681,13.197 L2.670,7.478 L8.681,1.760 C9.113,1.348 9.113,0.682 8.681,0.270 C8.249,-0.139 7.548,-0.139 7.116,0.270 L0.323,6.735 C0.107,6.940 -0.000,7.209 -0.000,7.478 C-0.000,7.747 0.108,8.017 0.324,8.222 Z"></path>
                                        </svg>
                                        <span>prev</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">01</a></li>
                                <li><a href="javascript:;">02</a></li>
                                <li><a href="javascript:;">....</a></li>
                                <li><a href="javascript:;">12</a></li>
                                <li><a href="javascript:;">13</a></li>
                                <li class="blog_page_arrow">
                                    <a href="javascript:;">
                                        <span>next</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="19px" height="25px">
                                        <path fill-rule="evenodd" fill="rgb(112, 112, 112)" d="M13.676,13.222 L6.883,19.685 C6.451,20.097 5.751,20.097 5.319,19.685 C4.887,19.273 4.887,18.608 5.319,18.197 L11.329,12.478 L5.319,6.760 C4.887,6.348 4.887,5.682 5.319,5.270 C5.751,4.861 6.451,4.861 6.884,5.270 L13.676,11.735 C13.892,11.940 14.000,12.209 14.000,12.478 C14.000,12.747 13.892,13.017 13.676,13.222 Z"></path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div> -->
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
							<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dole magna aliqua. Ut enim ad minim veniam quis nostrud exercitation.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="gallery_slide">
							<div class="gallery_grid">
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
										<img src="https://via.placeholder.com/370x500" alt="image" />
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
								</div> 
							</div>
						</div>
						</div>
						<div class="col-md-12">
							<div class="load_more_btn">
								<a href="<?=base_url()?>gallery" class="clv_btn">view more</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

