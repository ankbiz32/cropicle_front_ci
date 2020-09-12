
	<div class="clv_rev_slider">
		<div id="rev_slider_1164_1_wrapper" class="rev_slider_wrapper" data-alias="exploration-header" data-source="gallery" style="background-color:transparent;padding:0px;">
			<div id="rev_slider_1164_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
				<ul>
				<?php if(!empty($banner)){ $i=0; foreach($banner as $b){?>
					<li data-index="rs-320<?=$i?>" data-transition="slideoververtical" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb=""  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="2000" data-fsslotamount="7" data-saveperformance="off"  data-title="" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
					
						<picture>
							<source media="(max-width: 480px)" srcset="<?=KART_DOMAIN.'assets/images/'.$b->img_src480w?>"  alt="Banner" data-lazyload="" data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>

							<img src="<?=KART_DOMAIN.'assets/images/'.$b->img_src?>" alt="Banner" data-lazyload="" data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina style="width: 100%; object-fit: cover; height: 100%;">
						</picture>
						
						<!-- <div class="tp-caption  " 
							id="slide-3204-layer-1" 
							data-x="['left','left','left','left']" data-hoffset="['90','90','76','30']" 
							data-y="['top','top','top','top']" data-voffset="['50','50','60','40']" 
							data-fontsize="['20','20','20','14']"
							data-lineheight="['22','22','22','22']"
							data-width="['700','700','700','700']"
							data-height="none"
							data-whitespace="normal"
					
							data-type="text" 
							data-basealign="slide" 
							data-responsive_offset="on" 
							data-responsive="off"
							data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
							data-textAlign="['left','left','left','left']"
							data-paddingtop="[0,0,0,0]"
							data-paddingright="[0,0,0,0]"
							data-paddingbottom="[0,0,0,0]"
							data-paddingleft="[0,0,0,0]"
				
							style="z-index: 5; white-space: nowrap; font-size: 20px; font-weight: 700; color: #1fa12e; display: inline-block;font-family:'Source Sans Pro', sans-serif;letter-spacing:3px;">
							Coming soon
						</div> -->
				
						<div class="tp-caption  " 
							id="slide-3204-layer-3" 
							data-x="['left','left','left','left']" data-hoffset="['80','80','66','30']" 
							data-y="['top','top','top','top']" data-voffset="['80','80','80','60']" 
							data-width="['100%','100%','100%','100%']"
							data-fontsize="['52','52','60','20']"
							data-lineheight="['82','82','60','60']"
							data-height="none"
							data-whitespace="normal"
				
							data-type="text" 
							data-basealign="slide" 
							data-responsive_offset="on" 
							data-responsive="off"
							data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":650,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
							data-textAlign="['left','left','left','left']"
							data-paddingtop="[0,0,0,0]"
							data-paddingright="[0,0,0,0]"
							data-paddingbottom="[0,0,0,0]"
							data-paddingleft="[0,0,0,0]"
				
							style="z-index: 7; font-size: 82px; line-height: 81px; font-weight: 500; color: rgba(255, 255, 255, 1); display: block;font-family:'Source Sans Pro', sans-serif;"><?=$b->text?>
						</div>
<!-- 
						<div class="tp-caption tp-shape tp-shapewrapper " 
							id="slide-3204-layer-2" 
							data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
											data-width="full"
								data-height="full"
								data-whitespace="normal"
					
								data-type="shape" 
								data-basealign="slide" 
								data-responsive_offset="off" 
								data-responsive="off"
								data-frames='[{"delay":10,"speed":2000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"

								style="z-index: 1;background-color:rgba(0,0,0,0.70);">
						</div> -->
					</li>
				<?php $i++; } } ?>
				</ul>
				<div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
			</div>
		</div>
	</div>

	<!--Shop-->
	<?php if(!isset($this->session->location_id)){?>
	<div class="clv_shop_wrapper py-5 py-sm-4 clv_section bg-dark" id="prods">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="search_boxs">
						<div class="search_block">
							<h3 class="mb-4">Order now to get fresh vegetables directly to your doorsteps </h3>
							<div class="search_field row">
								<i class="fa fa-map-marker fa-lg px-0 col"></i>
								<select id="loc-select" class="col">
									<option value="" hidden>Select you area</option>
									<?php foreach($loc as $l){?>
									<option value="<?=$l->id?>" <?=isset($this->session->location_id)?($l->id==$this->session->location_id?' selected':''):''?>><?=$l->area.', '.$l->city.', '.$l->state.' ('.$l->pin_code.')'?></option>
									<?php }?>
								</select>
								<a href="javascript:;" class="text-dark" id="loc-search">Go</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } else{?>
	<div class="clv_shop_wrapper py-5 py-sm-4 clv_section bg-dark">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="search_boxs">
						<div class="search_block">
							
							<div class="clv_heading mb-2">
								<h3 class="mb-2">Shop now</h3>
								<div class="clv_underline"><img src="<?=base_url('assets/')?>images/agri_underline2.png" alt="image" /></div>
							</div>
							<h6 class="mb-4">Our top categories in your area :</h6>
							<div class="cats d-flex align-items-center justify-content-center">
								<?php foreach($catm as $cat){?>
								<a href="?category=<?=$cat->id?>" class="cat text-center">
									<div class="image">
										<img src="<?=KART_DOMAIN.'assets/images/'.$cat->img_src?>" alt="img" style="height:100%; width:100%; object-fit:cover;">
									</div>
									<h6 class="text-white"><?=$cat->category_name?></h6>
								</a>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class=" py-2 clv_shop_wrapper clv_section bg-light" id="prods">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="clv_heading">
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
                                    <p class="text-left">showing <span><?=sizeof($prods)?></span> items <?php if(isset($_GET['category'])){?> from "<?=$prods['0']->category_name?>" <?php }?></p>
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
                                            <h6><?=$pr->item_name?></h6>
											<h6 class="text-dark">
												₹ <?=$pr->item_price_customer?>/<?=$pr->unit_short_name?>
												<!-- <small> <del><i class="fa fa-inr fa-xl"></i> 50/kg</del></small> -->
											</h6>
											<?php if($pr->is_active==0){?>
												<div class="adder">
													<select id="product_quantity<?=$pr->id?>" class="demand_quantity" data-product_id="<?=$pr->id?>" disabled readonly style="opacity:0; pointer-events:none;">
														<option></option>
													</select>
													<a href="javascript:;" title="Add to demand" id="btnAddtoCart<?=$pr->id?>" class="btnAddtoCart disabled" disabled  style="opacity:0.4; pointer-events:none;">Out of stock</a>
												</div>
											<?php } else {?>
											<div class="adder">
												<select id="product_quantity<?=$pr->id?>" class="demand_quantity" data-product_id="<?=$pr->id?>">
												<?php if($pr->unit_short_name=='kg' OR $pr->unit_short_name=='dzn'){?>
												<?php if($pr->unit_short_name=='kg'){?>
													<option <?=isset($cart[$pr->id])?($cart[$pr->id]['quantity']==0.25?'selected':''):''?> value="0.25">0.25 <?=$pr->unit_short_name?></option>
												<?php }?>
													<option <?=isset($cart[$pr->id])?($cart[$pr->id]['quantity']==0.5?'selected':''):''?> value="0.5">0.5 <?=$pr->unit_short_name?></option>
												<?php if($pr->unit_short_name=='kg'){?>
													<option <?=isset($cart[$pr->id])?($cart[$pr->id]['quantity']==0.75?'selected':''):''?> value="0.75">0.75 <?=$pr->unit_short_name?></option>
												<?php }?>
												<?php }?>
													<option <?=isset($cart[$pr->id])?($cart[$pr->id]['quantity']==1?'selected':''):' selected'?> value="1">1 <?=$pr->unit_short_name?></option>
													<option <?=isset($cart[$pr->id])?($cart[$pr->id]['quantity']==2?'selected':''):''?> value="2">2 <?=$pr->unit_short_name?></option>
													<option <?=isset($cart[$pr->id])?($cart[$pr->id]['quantity']==3?'selected':''):''?> value="3">3 <?=$pr->unit_short_name?></option>
													<option <?=isset($cart[$pr->id])?($cart[$pr->id]['quantity']==4?'selected':''):''?> value="4">4 <?=$pr->unit_short_name?></option>
													<option <?=isset($cart[$pr->id])?($cart[$pr->id]['quantity']==5?'selected':''):''?> value="5">5 <?=$pr->unit_short_name?></option>
												<?php if($pr->unit_short_name=='pc'){?>
													<option <?=isset($cart[$pr->id])?($cart[$pr->id]['quantity']==6?'selected':''):''?> value="6">6 <?=$pr->unit_short_name?></option>
													<option <?=isset($cart[$pr->id])?($cart[$pr->id]['quantity']==7?'selected':''):''?> value="7">7 <?=$pr->unit_short_name?></option>
													<option <?=isset($cart[$pr->id])?($cart[$pr->id]['quantity']==8?'selected':''):''?> value="8">8 <?=$pr->unit_short_name?></option>
													<option <?=isset($cart[$pr->id])?($cart[$pr->id]['quantity']==9?'selected':''):''?> value="9">9 <?=$pr->unit_short_name?></option>
													<option <?=isset($cart[$pr->id])?($cart[$pr->id]['quantity']==10?'selected':''):''?> value="10">10 <?=$pr->unit_short_name?></option>
												<?php }?>
												</select>
												
												<a href="javascript:;" title="Add to demand" id="btnAddtoCart<?=$pr->id?>" class="btnAddtoCart">Add</a>
											</div>
											<a href="javascript:;" class="remover <?=isset($cart[$pr->id])?'':' hidden'?>" id="remover<?=$pr->id?>" onclick="removeCartItem(<?=$pr->id?>, '<?=$pr->unit_short_name?>')">
												<i class="fa fa-times fa-lg text-danger"></i>
											</a>
											<?php }?>
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

