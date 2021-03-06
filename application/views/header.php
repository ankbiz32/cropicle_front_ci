<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zxx">
<!--<![endif]-->
<!-- Begin Head --> 
<head>
	<title>Cropicle | <?=isset($title)?$title:''?></title>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="MobileOptimized" content="320">
		<!--Start Style -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/font.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/layers.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/navigation.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/settings.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/range.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/nice-select.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/form-validation.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/select2.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/style.css">
	<!-- Favicon Link -->
	<link rel="shortcut icon" type="image/png" href="<?=base_url('assets/')?>images/fav-icon/favicon-32x32.png">
</head>
<script>
    var loc="<?=base_url()?>";
</script>
<!-- Begin Inspectlet Asynchronous Code -->
<script type="text/javascript">
(function() {
window.__insp = window.__insp || [];
__insp.push(['wid', 2074264038]);
var ldinsp = function(){
if(typeof window.__inspld != "undefined") return; window.__inspld = 1; var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js?wid=2074264038&r=' + Math.floor(new Date().getTime()/3600000); var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); };
setTimeout(ldinsp, 0);
})();
</script>
<!-- End Inspectlet Asynchronous Code -->
<body>
	<div class="preloader_wrapper">
		<div class="preloader_inner">
			<img src="<?=base_url('assets/')?>images/preloader.gif" alt="image" />
		</div>
	</div>
    <?php if(isset($this->session->user)) {
        if(isset($notif) && $notif==1) { ?>
        <div class="notification text-center bg-info text-white py-1 px-4">
            Your order status has been updated. Check status here &nbsp; <a href="<?=base_url('Home/seeNotif')?>" class="badge badge-pill bg-white">Details</a>
            <a href="<?=base_url('Home/closeNotif')?>" class="cross">&times;</a>
        </div>
        <?php }
     }?>
<div class="clv_main_wrapper index_v">
    <div class="clv_header" <?=$notice->is_active==1?'style="margin-bottom:-7px;"':''?>>
        <div class="container"> 
            <div class="row" style="align-items:center;">
                <div class="col-lg-4 col-sm-4">
                    <div class="clv_left_header py-0"> 
                        <div class="clv_logo">
                            <a href="<?=base_url()?>"><img src="<?=base_url('assets/')?>images/logo.png" alt="Cropicle" height="50" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="clv_right_header">
                        <div class="clv_address py-2 pb-3">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="address_block">
                                        <span class="addr_icon">
                                            <svg 
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="12px" height="16px">
                                                <defs>
                                                <filter id="Filter_0">
                                                    <feFlood flood-color="rgb(254, 192, 7)" flood-opacity="1" result="floodOut" />
                                                    <feComposite operator="atop" in="floodOut" in2="SourceGraphic" result="compOut" />
                                                    <feBlend mode="normal" in="compOut" in2="SourceGraphic" />
                                                </filter>

                                                </defs>
                                                <g filter="url(#Filter_0)">
                                                <path fill-rule="evenodd"  fill="rgb(83, 175, 30)"
                                                    d="M5.530,-0.004 C2.497,-0.004 0.029,2.434 0.029,5.431 C0.029,9.148 4.951,14.609 5.161,14.839 C5.358,15.055 5.702,15.054 5.898,14.839 C6.108,14.609 11.029,9.148 11.029,5.431 C11.029,2.434 8.562,-0.004 5.530,-0.004 ZM5.530,8.165 C4.004,8.165 2.762,6.937 2.762,5.431 C2.762,3.923 4.004,2.696 5.530,2.696 C7.055,2.696 8.297,3.923 8.297,5.431 C8.297,6.937 7.055,8.165 5.530,8.165 Z"/>
                                                </g>
                                            </svg>
                                            &nbsp;
                                        </span>
                                        <p>
                                            <a class="search_toggle" href="javascript:;" style="border-bottom:1px dashed #666">
                                                <?=isset($this->session->location_id)?(strlen($this->session->location_name)>25?substr($this->session->location_name,0,25).'... <sup style="font-size:10px;" class="text-dark"><i class="fa fa-pencil" ></i></sup>':$this->session->location_name).' <sup style="font-size:10px;" class="text-dark"><i class="fa fa-pencil" ></i></sup>':'Select area <sup style="font-size:10px;" class="text-dark"><i class="fa fa-pencil" ></i></sup>'?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="address_block">
                                        <span class="addr_icon">
                                            <svg 
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="20px" height="15px">
                                            <defs>
                                            <filter id="Filter_0">
                                                <feFlood flood-color="rgb(254, 192, 7)" flood-opacity="1" result="floodOut" />
                                                <feComposite operator="atop" in="floodOut" in2="SourceGraphic" result="compOut" />
                                                <feBlend mode="normal" in="compOut" in2="SourceGraphic" />
                                            </filter>

                                            </defs>
                                            <g filter="url(#Filter_0)">
                                            <path fill-rule="evenodd"  fill="rgb(0, 0, 0)"
                                                d="M14.468,8.297 C15.479,7.588 16.707,6.742 18.151,5.760 C18.554,5.483 18.907,5.174 19.211,4.833 L19.211,13.062 L14.468,8.297 ZM17.398,4.619 C15.683,5.816 14.388,6.719 13.509,7.333 C13.026,7.670 12.667,7.920 12.436,8.082 C12.402,8.106 12.349,8.146 12.278,8.196 C12.201,8.251 12.105,8.321 11.986,8.407 C11.756,8.574 11.565,8.709 11.413,8.811 C11.261,8.915 11.077,9.031 10.862,9.159 C10.646,9.286 10.443,9.382 10.252,9.445 C10.061,9.510 9.885,9.541 9.722,9.541 L9.711,9.541 L9.701,9.541 C9.538,9.541 9.362,9.510 9.171,9.445 C8.980,9.382 8.777,9.286 8.561,9.159 C8.345,9.031 8.161,8.915 8.010,8.811 C7.858,8.709 7.667,8.574 7.437,8.407 C7.318,8.321 7.221,8.251 7.145,8.196 C7.074,8.146 7.020,8.106 6.986,8.082 C6.690,7.872 6.332,7.622 5.916,7.329 C5.428,6.989 4.861,6.591 4.208,6.138 C3.000,5.297 2.275,4.791 2.035,4.619 C1.597,4.322 1.183,3.912 0.794,3.389 C0.406,2.868 0.211,2.382 0.211,1.937 C0.211,1.382 0.358,0.920 0.651,0.551 C0.945,0.181 1.363,-0.004 1.908,-0.004 L17.515,-0.004 C17.974,-0.004 18.372,0.164 18.708,0.498 C19.043,0.832 19.211,1.233 19.211,1.701 C19.211,2.262 19.038,2.798 18.692,3.310 C18.346,3.821 17.914,4.258 17.398,4.619 ZM4.956,8.295 L0.211,13.062 L0.211,4.833 C0.522,5.181 0.879,5.491 1.282,5.760 C2.783,6.784 4.006,7.629 4.956,8.295 ZM6.551,9.435 C6.954,9.732 7.281,9.965 7.532,10.132 C7.783,10.299 8.117,10.469 8.534,10.644 C8.951,10.817 9.340,10.903 9.700,10.903 L9.711,10.903 L9.721,10.903 C10.082,10.903 10.471,10.817 10.888,10.644 C11.305,10.469 11.639,10.299 11.890,10.132 C12.141,9.965 12.468,9.732 12.871,9.435 C12.989,9.348 13.114,9.258 13.243,9.165 L18.626,14.573 C18.312,14.853 17.942,14.995 17.515,14.995 L1.908,14.995 C1.481,14.995 1.110,14.853 0.796,14.573 L6.180,9.165 C6.314,9.262 6.439,9.352 6.551,9.435 Z"/>
                                            </g>
                                            </svg>
                                        </span>
                                        <p>info.cropicle@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($this->session->user)){?>
                        <div class="clv_menu col-sm-9 ml-auto px-sm-3 px-0">
                        <?php }else{?>
                        <div class="clv_menu col-sm-8 ml-auto px-sm-3 px-0">
                        <?php }?>
                            <div class="clv_menu_nav px-0">
                                <ul>
                                    <li class="py-1"><a href="<?=base_url()?>" class="">Home</a></li>
                                    <li class="py-1"><a href="<?=base_url()?>about">How it works ?</a></li>
                                    <li class="py-1"><a href="<?=base_url()?>contact">Contact us</a></li>
                                    <?php if(isset($this->session->user)){?>
                                    <li class="py-1">
                                        <a href="<?=base_url('profile')?>"><?=strlen($this->session->user->name)>6?substr($this->session->user->name,0,6).'...':$this->session->user->name?> <i class="fa fa-caret-down d-md-inline d-none"></i> </a>
                                        <ul>
                                            <li><a href="<?=base_url('cart')?>">Cart</a></li>
                                            <li><a href="<?=base_url('profile')?>">See profile</a></li>
                                            <li><a href="<?=base_url('demands')?>">My demands</a></li>
                                            <li><a href="<?=base_url('logout')?>">Logout</a></li>
                                        </ul>
                                    </li>
                                    <li class="py-1"><a href="<?=base_url()?>demands" class="d-md-none d-block">My demands</a></li>
                                    <li class="py-1"><a href="<?=base_url()?>logout" class="d-md-none d-block">Logout</a></li>
                                    <?php } else{?>
                                        <li class="ml-2 ml-sm-0 py-1">
                                            <a class="pop_signin" href="javascript:;">
                                                Login
                                            </a>
                                        </li> 
                                    <?php }?>
                                </ul>
                            </div>
                            <div class="cart_nav px-0">
                                <ul class="">
									<li class="menu_toggle ml-0 ml-sm-5" style="float:left">
										<span>
											<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 viewBox="0 0 53 53" style="enable-background:new 0 0 53 53;" xml:space="preserve" width="20px" height="20px">
                                                <g>
                                                    <g>
                                                        <path d="M2,13.5h49c1.104,0,2-0.896,2-2s-0.896-2-2-2H2c-1.104,0-2,0.896-2,2S0.896,13.5,2,13.5z"/>
                                                        <path d="M2,28.5h49c1.104,0,2-0.896,2-2s-0.896-2-2-2H2c-1.104,0-2,0.896-2,2S0.896,28.5,2,28.5z"/>
                                                        <path d="M2,43.5h49c1.104,0,2-0.896,2-2s-0.896-2-2-2H2c-1.104,0-2,0.896-2,2S0.896,43.5,2,43.5z"/>
                                                    </g>
                                                </g>
											</svg>
										</span>
									</li>
                                    <!-- <li class="ml-0 ml-sm-2 py-1">
                                        <a class="search_toggle" href="javascript:;">
                                            <i class="fa fa-map-marker fa-lg" aria-hidden="true"></i> 
                                            &nbsp;<?=isset($this->session->location_id)?(strlen($this->session->location_name)>10?substr($this->session->location_name,0,10).'...':$this->session->location_name):'Select area'?>
                                        </a>
                                    </li> -->
                                    <?php
                                        $cart = $this->session->userdata("cart");
                                            $cart = !empty($cart)?$cart:array();
                                        ?>
                                        <li class="pr-2 pr-sm-0 hide-sm">
                                            <a class="cart_toggle" href="javascript:;">
                                                <svg 
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    width="18px" height="20px">
                                                    <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                                                    d="M16.712,5.566 C16.682,5.244 16.404,4.997 16.071,4.997 L12.857,4.997 L12.857,3.747 C12.857,1.678 11.127,-0.004 9.000,-0.004 C6.873,-0.004 5.143,1.678 5.143,3.747 L5.143,4.997 L1.928,4.997 C1.595,4.997 1.318,5.244 1.288,5.566 L0.002,19.315 C-0.014,19.490 0.046,19.664 0.168,19.793 C0.290,19.923 0.462,19.997 0.643,19.997 L17.357,19.997 C17.538,19.997 17.710,19.923 17.832,19.793 C17.952,19.664 18.014,19.490 17.997,19.315 L16.712,5.566 ZM6.428,3.747 C6.428,2.367 7.582,1.247 9.000,1.247 C10.417,1.247 11.571,2.367 11.571,3.747 L11.571,4.997 L6.428,4.997 L6.428,3.747 ZM1.347,18.745 L2.515,6.247 L5.143,6.247 L5.143,7.670 C4.759,7.887 4.500,8.286 4.500,8.746 C4.500,9.436 5.076,9.996 5.786,9.996 C6.495,9.996 7.071,9.436 7.071,8.746 C7.071,8.286 6.812,7.887 6.428,7.670 L6.428,6.247 L11.571,6.247 L11.571,7.670 C11.188,7.887 10.928,8.284 10.928,8.746 C10.928,9.436 11.505,9.996 12.214,9.996 C12.924,9.996 13.500,9.436 13.500,8.746 C13.500,8.286 13.240,7.887 12.857,7.670 L12.857,6.247 L15.484,6.247 L16.653,18.745 L1.347,18.745 Z"/>
                                                </svg>
                                                <span><?=!empty($cart)?sizeof($cart):'0'?></span>
                                            </a>
                                            <div class="clv_cart_box">
                                                <?php
                                                    $finalTotal = 0;
                                                    if(!empty($cart)){?>
                                                    <div class="cart_section">
                                                        <p class="mb-2">you have <span><?=sizeof($cart)?></span> items in your cart</p>
                                                        <ul class="mini_cart_items">
                                                            <?php foreach($cart as $row){?>
                                                            <li>
                                                                <div class="cart_block">
                                                                    <img src="<?=KART_DOMAIN.'assets/images/items/'.$row['image']?>" alt="image" />
                                                                </div>
                                                                <div class="cart_block">
                                                                    <h5><?=$row['name']?></h5>
                                                                    <div class="item_quantity">
                                                                        <input type="text" value="<?=$row['quantity'].' '.$row['unit']?>" class="quantity" disabled />
                                                                    </div>
                                                                </div>
                                                                <div class="cart_block">
                                                                    <h4><span>₹</span> <?=$row['quantity']*$row['price']?></h4>
                                                                </div>
                                                                <div class="cart_block">
                                                                    <a href="javascript:void(0);" onclick='removeCartItem(<?=$row["product_id"]?>, "<?=$row["unit"]?>")'><i class="fa fa-times"></i></a>
                                                                </div>
                                                            </li>
                                                            <?php 
                                                                $finalTotal=$finalTotal+$row["total"];
                                                            }?>
                                                            <li>
                                                                <h3>total</h3>
                                                                <h4><span>₹</span> <?=$finalTotal?></h4>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a href="<?php echo site_url("/cart");?>" class="cart_action_btn">Go to cart</a>
                                                    <?php
                                                        $finalTotal=$finalTotal+$row["total"];
                                                    } else {
                                                    ?>
                                                    <div class="cart_section" style="height:50px">
                                                        <p>Your cart is empty !</p> 
                                                    </div>
                                                    <?php  }?>
                                            </div>
                                        </li>

                                        <li class="pr-2 pr-sm-0 profile-drop show-sm position-relative">
                                            <?php if($this->session->user){?>
                                                <a class="text-dark" href="javascript:;">
                                                    <i class="fa fa-user"></i> <?=strlen($this->session->user->name)>12?substr($this->session->user->name,0,12).'...':$this->session->user->name?> 
                                                    <i class="fa fa-caret-down"></i>
                                                </a> 
                                                <div class="profile-dropdown-menu position-absolute">
                                                    <a class="dropdown-item" href="<?=base_url('cart')?>">Cart</a>
                                                    <a class="dropdown-item" href="<?=base_url('profile')?>">Profile</a>
                                                    <a class="dropdown-item" href="<?=base_url('demands')?>">My demands</a>
                                                    <a class="dropdown-item text-danger" href="<?=base_url('logout')?>">Logout</a>
                                                </div>
                                                <a class="text-dark ml-3" href="<?=base_url('cart')?>">
                                                    <i class="fa fa-shopping-bag"></i> 
                                                    <sup class="badge badge-secondary badge-pill"><?=!empty($cart)?sizeof($cart):'0'?></sup>
                                                </a> 
                                            <?php } else{?>
                                                <a class="profile_toggle2 text-dark" href="javascript:;">
                                                    <i class="fa fa-user"></i> Login
                                                </a>
                                                <a class="text-dark ml-3" href="<?=base_url('cart')?>">
                                                    <i class="fa fa-shopping-bag"></i>  
                                                    <sup class="badge badge-secondary badge-pill"><?=!empty($cart)?sizeof($cart):'0'?></sup>
                                                </a> 
                                            <?php }?>
                                        </li>
                                    
                                </ul>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <?php if($notice->is_active==1){?>
            <marquee class="notice py-1">
                <?=$notice->text?>
            </marquee>
        <?php }?>
    </div>