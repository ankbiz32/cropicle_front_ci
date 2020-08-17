 <!--Footer-->
 <div class="clv_footer_wrapper clv_section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-3">
                    <div class="footer_block">
                        <div class="footer_logo"><a href="javascript:;"><img src="<?=base_url('assets/')?>images/badge_logo.png" height="55" alt="image" /></a></div>
                        <p>Cropicle shows you all the available fruits & veggies available in your area with our special pricing.</p>
                        <h6>call now</h6>
                        <h3><a href="tel:919021073372" class="text-white">+91 9021073372</a></h3>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="footer_block">
                        <div class="footer_heading">
                            <h4>Links</h4>
                            <img src="<?=base_url('assets/')?>images/footer_underline.png" alt="image" />
                        </div>
                        <ul class="useful_links">
                            <li><a href="about"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span>About Us</a></li>
                            <li><a href="about"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span>How it works ?</a></li>
                            <li><a href="javascript:;"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span>Privacy Policy</a></li>
                            <li><a href="javascript:;"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span>Terms And Conditions</a></li>
                            <li><a href="contact"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span>Support 24/7</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="footer_block">
                        <div class="footer_heading">
                            <h4>Contact Us</h4>
                            <img src="<?=base_url('assets/')?>images/footer_underline.png" alt="image" />
                        </div>
                        <ul class="useful_links">
                            <li><a href="tel:919021073372"><span><i class="fa fa-phone" aria-hidden="true"></i></span>+919021073372</a></li>
                            <li><a href="mailto:info.cropicle@gmail.com"><span><i class="fa fa-envelope" aria-hidden="true"></i></span>info.cropicle@gmail.com</a></li>
                            <li><a href="mailto:cropicle@gmail.com"><span><i class="fa fa-envelope" aria-hidden="true"></i></span>cropicle@gmail.com</a></li>
                            <li><a href="https://www.facebook.com/Cropicle" target="_blank"><span><i class="fa fa-facebook-square" aria-hidden="true"></i></span>Facebook</a></li>
                            <li><a href="https://www.instagram.com/_cropicle" target="_blank"><span><i class="fa fa-instagram" aria-hidden="true"></i></span>Instagram</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="footer_block">
                        <div class="footer_heading">
                            <h4>instagram</h4>
                            <img src="<?=base_url('assets/')?>images/footer_underline.png" alt="image" />
                        </div>
                        <ul class="instagram_links">
                            <li><a href="javascript:;"><img src="https://via.placeholder.com/83x83" alt="image" /></a></li>
                            <li><a href="javascript:;"><img src="https://via.placeholder.com/83x83" alt="image" /></a></li>
                            <li><a href="javascript:;"><img src="https://via.placeholder.com/83x83" alt="image" /></a></li>
                            <li><a href="javascript:;"><img src="https://via.placeholder.com/83x83" alt="image" /></a></li>
                            <li><a href="javascript:;"><img src="https://via.placeholder.com/83x83" alt="image" /></a></li>
                            <li><a href="javascript:;"><img src="https://via.placeholder.com/83x83" alt="image" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- <img class="foot_girl" src="https://via.placeholder.com/398x529" alt="image"> -->
    </div>
    <!--Copyright-->
    <div class="clv_copyright_wrapper">
        <p>copyright &copy; 2020 <a href="javascript:;">Cropicle.</a> all right reserved.</p>
    </div>
	<!--Popup-->
	<div class="search_box">
		<div class="search_block">
			<h3>Explore more with us</h3>
			<div class="search_field row">
                
				<i class="fa fa-map-marker fa-lg px-0 col"></i>
				<select id="loc-select" class="col">
					<option value="" hidden>Select you area</option>
                    <?php foreach($loc as $l){?>
					<option value="<?=$l->id?>" <?=isset($this->session->location_id)?($l->id==$this->session->location_id?' selected':''):''?>><?=$l->area.', '.$l->city.', '.$l->state.' ('.$l->pin_code.')'?></option>
                    <?php }?>
				</select>
                <a href="javascript:;" id="loc-search">search</a>
			</div>
		</div>
		<span class="search_close">
			<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 47.971 47.971" style="enable-background:new 0 0 47.971 47.971;" xml:space="preserve"  width="30px" height="30px">
			<g>
				<path style="fill:#1fa12e;" d="M28.228,23.986L47.092,5.122c1.172-1.171,1.172-3.071,0-4.242c-1.172-1.172-3.07-1.172-4.242,0L23.986,19.744L5.121,0.88
					c-1.172-1.172-3.07-1.172-4.242,0c-1.172,1.171-1.172,3.071,0,4.242l18.865,18.864L0.879,42.85c-1.172,1.171-1.172,3.071,0,4.242
					C1.465,47.677,2.233,47.97,3,47.97s1.535-0.293,2.121-0.879l18.865-18.864L42.85,47.091c0.586,0.586,1.354,0.879,2.121,0.879
					s1.535-0.293,2.121-0.879c1.172-1.171,1.172-3.071,0-4.242L28.228,23.986z"/>
			</g>
			</svg>
		</span>
	</div>
    
    <!--SignUp Popup-->
    <div class="signup_wrapper">
        <div class="signup_inner">
            <div class="signup_details">
                <div class="site_logo">
                    <a href="#"> <img src="<?=base_url('assets/')?>images/logo_white.png" height="40" alt="image"></a>
                </div>
                <h3>welcome to Cropicle!</h3>
                <p>Cropicle shows you all the available fruits & veggies available in your area with our special pricing.</p>
                <a href="javascript:;" class="clv_btn white_btn pop_signin">sign in</a>
                <ul>
                    <li><a href="https://www.facebook.com/Cropicle" target="_blank"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
                    <li><a href="https://www.instagram.com/_cropicle" target="_blank"><span><i class="fa fa-instagram" aria-hidden="true"></i></span></a></li>
                    <!-- <li><a href="javascript:;"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>
                    <li><a href="javascript:;"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a></li> -->
                </ul>
            </div>
            <form class="signup_form_section regForm" action="register">
                <h4>create account</h4>
                <img src="<?=base_url('assets/')?>images/clv_underline.png" alt="image">
                <p class="text-center mt-3">Sign up with</p>
                <div class="social_button_section mt-1">
                    <a href="<?=$auth_url?>" class="google_btn mx-auto">
                        <span><img src="<?=base_url('assets/')?>images/google.png" alt="image"></span>
                        <span>google</span>
                    </a>
                </div>
                <span class="success_close">
                    <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 212.982 212.982" style="enable-background:new 0 0 212.982 212.982;" xml:space="preserve" width="11px" height="11px" >
                    <g>
                        <path fill="#fec007" style="fill-rule:evenodd;clip-rule:evenodd;" d="M131.804,106.491l75.936-75.936c6.99-6.99,6.99-18.323,0-25.312
                        c-6.99-6.99-18.322-6.99-25.312,0l-75.937,75.937L30.554,5.242c-6.99-6.99-18.322-6.99-25.312,0c-6.989,6.99-6.989,18.323,0,25.312
                        l75.937,75.936L5.242,182.427c-6.989,6.99-6.989,18.323,0,25.312c6.99,6.99,18.322,6.99,25.312,0l75.937-75.937l75.937,75.937
                        c6.989,6.99,18.322,6.99,25.312,0c6.99-6.99,6.99-18.322,0-25.312L131.804,106.491z"/>
                    </g>
                    </svg>
                </span>
            </form>
        </div>
    </div>
    <!--SignIn Popup-->
    <div class="signin_wrapper">
        <div class="signup_inner">
            <div class="signup_details">
                <div class="site_logo">
                    <a href="<?=base_url()?>"> <img src="<?=base_url('assets/')?>images/logo_white.png" height="40" alt="image"></a>
                </div>
                <h3>welcome to Cropicle!</h3>
                <p>Cropicle shows you all the available fruits & veggies available in your area with our special pricing.</p>
                <a href="javascript:;" class="clv_btn white_btn pop_signup">sign up</a>
                <ul>
                    <li><a href="https://www.facebook.com/Cropicle" target="_blank"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
                    <li><a href="https://www.instagram.com/_cropicle" target="_blank"><span><i class="fa fa-instagram" aria-hidden="true"></i></span></a></li>
                    <!-- <li><a href="javascript:;"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>
                    <li><a href="javascript:;"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a></li> -->
                </ul>
            </div>
            <div class="signup_form_section">
                <h4>sign in account</h4>
                <img src="<?=base_url('assets/')?>images/clv_underline.png" alt="image">
                <!-- <form action="<?=base_url('Login/authenticate')?>" method="POST">
                    <div class="form_block">
                        <input type="text" maxlength="10" minlength="10" class="form_field" name="mob" placeholder="Mobile no">
                    </div>
                    <div class="form_block">
                        <input type="password" class="form_field" name="pwd" placeholder="Password">
                    </div>
                    <button type="submit" class="clv_btn">sign in</button>
                </form> -->
                <p class="text-center mt-3">Sign in with</p>
                <div class="social_button_section mt-1">
                    <!-- <a href="javascript:;" class="fb_btn">
                        <span><img src="<?=base_url('assets/')?>images/fb.png" alt="image"></span>
                        <span>facebook</span>
                    </a> -->
                    <a href="<?=$auth_url?>" class="google_btn mx-auto">
                        <span><img src="<?=base_url('assets/')?>images/google.png" alt="image"></span>
                        <span>google</span>
                    </a>
                </div>
                <span class="success_close">
                    <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 212.982 212.982" style="enable-background:new 0 0 212.982 212.982;" xml:space="preserve" width="11px" height="11px" >
                    <g>
                        <path fill="#fec007" style="fill-rule:evenodd;clip-rule:evenodd;" d="M131.804,106.491l75.936-75.936c6.99-6.99,6.99-18.323,0-25.312
                        c-6.99-6.99-18.322-6.99-25.312,0l-75.937,75.937L30.554,5.242c-6.99-6.99-18.322-6.99-25.312,0c-6.989,6.99-6.989,18.323,0,25.312
                        l75.937,75.936L5.242,182.427c-6.989,6.99-6.989,18.323,0,25.312c6.99,6.99,18.322,6.99,25.312,0l75.937-75.937l75.937,75.937
                        c6.989,6.99,18.322,6.99,25.312,0c6.99-6.99,6.99-18.322,0-25.312L131.804,106.491z"/>
                    </g>
                    </svg>
                </span>
            </div>
        </div>
    </div>

     <!--Success Popup-->
     <div class="success_wrapper">
        <div class="success_inner">
            <div class="success_img"><img src="<?=base_url('assets/')?>images/success.png" alt=""></div>
            <h3>Login success</h3>
            <img src="<?=base_url('assets/')?>images/clv_underline.png" alt="">
            <p>Your order has been successfully processed! Please direct any questions you have to the store owner. Thanks for shopping</p>
            <a href="javascript:;" class="clv_btn">continue browsing</a>
            <span class="success_close">
                <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 212.982 212.982" style="enable-background:new 0 0 212.982 212.982;" xml:space="preserve" width="11px" height="11px" >
                <g>
                    <path fill="#fec007" style="fill-rule:evenodd;clip-rule:evenodd;" d="M131.804,106.491l75.936-75.936c6.99-6.99,6.99-18.323,0-25.312
                        c-6.99-6.99-18.322-6.99-25.312,0l-75.937,75.937L30.554,5.242c-6.99-6.99-18.322-6.99-25.312,0c-6.989,6.99-6.989,18.323,0,25.312
                        l75.937,75.936L5.242,182.427c-6.989,6.99-6.989,18.323,0,25.312c6.99,6.99,18.322,6.99,25.312,0l75.937-75.937l75.937,75.937
                        c6.989,6.99,18.322,6.99,25.312,0c6.99-6.99,6.99-18.322,0-25.312L131.804,106.491z"/>
                </g>
                </svg>
            </span>
        </div>
    </div>

    <?php if(isset($this->session->user)){
        $cart = $this->session->userdata("cart");
        $cart = !empty($cart)?$cart:array();
    }?>
        <!-- <div class="profile_toggle"><a href="javascript:;"><img src="<?=base_url('assets/')?>images/login.gif" alt=""></a></div> -->
        <div class="cart_toggle_float">
            <a href="<?=base_url('cart')?>">
                <i class="fa fa-shopping-bag fa-lg"></i>
                
                <?php
                    $cart = $this->session->userdata("cart");
                    $cart = !empty($cart)?$cart:array();
                ?>
                <span><?=!empty($cart)?sizeof($cart):'0'?></span>
            </a>
        </div>
</div>
<!--Main js file Style-->
<script src="<?=base_url('assets/')?>js/jquery.js"></script>
<script src="<?=base_url('assets/')?>js/bootstrap.min.js"></script>
<script src="<?=base_url('assets/')?>js/swiper.min.js"></script>
<script src="<?=base_url('assets/')?>js/magnific-popup.min.js"></script>
<script src="<?=base_url('assets/')?>js/jquery.themepunch.tools.min.js"></script>
<script src="<?=base_url('assets/')?>js/jquery.themepunch.revolution.min.js"></script>
<script src="<?=base_url('assets/')?>js/jquery.appear.js"></script>
<script src="<?=base_url('assets/')?>js/jquery.countTo.js"></script>
<script src="<?=base_url('assets/')?>js/isotope.min.js"></script>
<script src="<?=base_url('assets/')?>js/nice-select.min.js"></script>
<script src="<?=base_url('assets/')?>js/range.js"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->	
<script src="<?=base_url('assets/')?>js/revolution.extension.actions.min.js"></script>
<script src="<?=base_url('assets/')?>js/revolution.extension.kenburn.min.js"></script>
<script src="<?=base_url('assets/')?>js/revolution.extension.layeranimation.min.js"></script>
<script src="<?=base_url('assets/')?>js/revolution.extension.migration.min.js"></script>
<script src="<?=base_url('assets/')?>js/revolution.extension.parallax.min.js"></script>
<script src="<?=base_url('assets/')?>js/revolution.extension.slideanims.min.js"></script>
<script src="<?=base_url('assets/')?>js/revolution.extension.video.min.js"></script>
<script src="<?=base_url('assets/')?>js/custom.js"></script>
<script src="<?=base_url('assets/')?>js/jquery.validate.min.js"></script>
<script src="<?=base_url('assets/')?>js/select2.min.js"></script>
<script src="<?=base_url('assets/')?>js/app.js"></script>
<!-- Sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


<script>

    $(document).ready(function() {
        $('#loc-select').select2();
    });

  //  Sweet alert for normal response
    var base_url = '<?=base_url()?>';
      $(document).ready(function(){
        const Toast = Swal.mixin({
              toast: false,
              position: 'center',
              showConfirmButton: false,
              timer: 3000
          });

          

          <?php if($this->session->flashdata('success') || $message = $this->session->flashdata('failed')):
              $class = $this->session->flashdata('success') ? 'success' : 'error';
          ?>
              
              Toast.fire({
                  icon: '<?=$class?>',
                  title: '<?= $this->session->flashdata('success'); ?>
                          <?= $this->session->flashdata('failed'); ?>'
              });
          <?php 
              endif;
          ?>
      });


  //  Sweet alert for delete
    function confirmation(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href'); 

        Swal.fire({
          title: 'Are you sure?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            window.location = urlToRedirect;
          }
        })

  }

  
    $('.quantity_plus').on('click', function(e){
        e.preventDefault();
        var quantity = parseFloat($(this).siblings('.demand_quantity').val());
        var product_id = $(this).siblings('.demand_quantity').attr("data-product_id");
        $(this).siblings('.demand_quantity').val(quantity + 0.25);  
        var quantity = parseFloat($(this).siblings('.demand_quantity').val());
        if(quantity==0.5){
            $(this).parent().siblings("span.half").css('visibility','visible');
            $(this).parent().siblings("span.pav").css('visibility','hidden');
        }
        else if(quantity==0.25){
            $(this).parent().siblings("span.half").css('visibility','hidden');
            $(this).parent().siblings("span.pav").css('visibility','visible');
        }
        else{
            $(this).parent().siblings("span.half").css('visibility','hidden');
            $(this).parent().siblings("span.pav").css('visibility','hidden');
        }
        if(product_id && quantity > 0){
            // alert(quantity+", "+product_id);
            updateCart(product_id, quantity);
        }          

    });

    $('.quantity_minus').on('click', function(e){
        e.preventDefault();
        var quantity = parseFloat($(this).siblings('.demand_quantity').val());
        var product_id = $(this).siblings('.demand_quantity').attr("data-product_id");
        if(quantity>0.25){
            $(this).siblings('.demand_quantity').val(quantity - 0.25);
            var quantity = parseFloat($(this).siblings('.demand_quantity').val()); 
            if(quantity==0.5){
                $(this).parent().siblings("span.half").css('visibility','visible');
                $(this).parent().siblings("span.pav").css('visibility','hidden');
            }
            else if(quantity==0.25){
                $(this).parent().siblings("span.half").css('visibility','hidden');
                $(this).parent().siblings("span.pav").css('visibility','visible');
            }
            else{
                $(this).parent().siblings("span.half").css('visibility','hidden');
                $(this).parent().siblings("span.pav").css('visibility','hidden');
            }
            if(product_id && quantity > 0){
                // alert(quantity+", "+product_id);
                updateCart(product_id, quantity);
            } 
        }
    });	


    $("select.demand_quantity").change(function(){
        var quantity = $(this).children("option:selected").val();
        var product_id = $(this).data("product_id");
        if(product_id && quantity > 0){
            // alert(quantity+", "+product_id);
            updateCart(product_id, quantity);
        }
    });
    $("select.demand_quantity").niceSelect();
</script>


<?php if(isset($prods)){?>
    <script>
        var elmnt = document.getElementById("prods");
        elmnt.scrollIntoView();
    </script>
<?php }?>


</body>
</html>