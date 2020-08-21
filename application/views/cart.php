
    <!--Breadcrumb-->
    <div class="breadcrumb_wrapper" style="background: url(<?=base_url('assets/')?>images/cart-banner.jpg) no-repeat center; background-size: cover;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="breadcrumb_inner">
                        <h3>Demand cart</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb_block">
            <ul>
                <li><a href="index.html">home</a></li>
                <li>Demand cart</li>
            </ul>
        </div>
    </div>
    <?php
        $cart = $this->session->userdata("cart");
        $cart = !empty($cart)?$cart:array();
    ?>
    
    <!--Cart Single-->
    <div class="cart_single_wrapper clv_section">
        <div class="container">
            <div class="cart_table_section woocommerce-cart table-responsive">
                <div class="table_heading pl-sm-0 pl-3">
                    <h4><?=sizeof($cart)?> items in your cart</h4>
                </div>
                <?php if (!empty($cart)){ 
                    $finalTotal = 0;
                ?>
                <table class="table-responsive cart_table woocommerce-cart-form__contents">
                    <tr>
                        <th>items</th>
                        <!-- <th>price</th> -->
                        <th>quantity</th>
                        <!-- <th>total</th> -->
                        <th> </th>
                    </tr>
                    <?php foreach($cart as $row){    
                    ?>
                    <tr class="productRow<?=$row['product_id']?>">
                        <td>
                            <div class="product_img">
                                <img src="<?=KART_DOMAIN.'assets/images/items/'.$row['image']?>" alt="image" height="60" width="60" style="object-fit:cover;">
                                <div class="ml-2">
                                    <h6 class="mb-1 text-black"><?=$row['name']?></h6>
                                    <small><span class="text-secondary font-sm">₹<?=$row['price']?>/<?=$row['unit']?></span></small>
                                </div>
                            </div>
                        </td>
                        <!-- <td>
                            <div class="pro_price">
                                <h5>₹<?=$row['price']?> / <?=$row['unit']?></h5>
                            </div>
                        </td> -->
                        <!-- 
                        <td>
                            <div class="item_quantity">
                                <a href="javascript:;" class="quantity_minus">-</a>

                                <input type="text" 
                                        id="product_quantity<?=$row["product_id"];?>" 
                                        name="product_quantity<?=$row["product_id"];?>" 
                                        value="<?=$row['quantity']?>" 
                                        class="demand_quantity" 
                                        disabled=""
                                        data-product_id="<?=$row['product_id'];?>">

                                <a href="javascript:;" class="quantity_plus">+</a>
                            </div>
                            <span class="pav">1 Pav</span>
                            <span class="half">1/2</span>
                        </td> -->

                        <td class="d-flex flex-column">
                            <div class="item_quantity">
                                <select id="product_quantity<?=$row["product_id"];?>" 
                                    name="product_quantity<?=$row["product_id"];?>"
                                    class="demand_quantity"
                                    data-product_id="<?=$row['product_id'];?>">
                                    <?php if($row['unit']=='kg' OR $row['unit']=='dzn'){?>
                                    <?php if($row['unit']=='kg'){?>
                                    <option <?=$row['quantity']==0.25?'selected':''?> value="0.25">0.25 <?=$row['unit']?></option>
                                    <?php }?>
                                    <option <?=$row['quantity']==0.5?'selected':''?> value="0.5">0.5 <?=$row['unit']?></option>
                                    <?php if($row['unit']=='kg'){?>
                                    <option <?=$row['quantity']==0.75?'selected':''?> value="0.75">0.75 <?=$row['unit']?></option>
                                    <?php }?>
                                    <?php }?>
                                    <option <?=$row['quantity']==1?'selected':''?> value="1">1 <?=$row['unit']?></option>
                                    <option <?=$row['quantity']==2?'selected':''?> value="2">2 <?=$row['unit']?></option>
                                    <option <?=$row['quantity']==3?'selected':''?> value="3">3 <?=$row['unit']?></option>
                                    <option <?=$row['quantity']==4?'selected':''?> value="4">4 <?=$row['unit']?></option>
                                    <option <?=$row['quantity']==5?'selected':''?> value="5">5 <?=$row['unit']?></option>
                                    <?php if($row['unit']=='pc'){?>
                                    <option <?=$row['quantity']==6?'selected':''?> value="6">6 <?=$row['unit']?></option>
                                    <option <?=$row['quantity']==7?'selected':''?> value="7">7 <?=$row['unit']?></option>
                                    <option <?=$row['quantity']==8?'selected':''?> value="8">8 <?=$row['unit']?></option>
                                    <option <?=$row['quantity']==9?'selected':''?> value="9">9 <?=$row['unit']?></option>
                                    <option <?=$row['quantity']==10?'selected':''?> value="10">10 <?=$row['unit']?></option>
                                    <?php }?>
                                    
                                </select>
                            </div>
                            <div class="product_total<?=$row['product_id']?> pro_price mt-1">
                                <small><span class=""><strong>Total:</strong> ₹<?=$row['total']?>/-</span></small>
                            </div>
                        </td>
<!--                         
                        <td>
                            <div class="product_total<?=$row['product_id']?> pro_price">
                                <h5>₹<?=$row['total']?></h5>
                            </div>
                        </td> -->
                        <td class="pl-0">
                            <a href="javascript:;" class="pro_remove<?=$row['product_id']?> text-danger" onclick="removeCartItem(<?=$row['product_id']?>);">
                                <i class="fa fa-times fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                    <?php 
                        $finalTotal=$finalTotal+$row["total"];
                    }?>
                    <tr class="mt-4" style="border-top:2px solid #ddd">
                        <td>
                            <div class="pro_price">
                                <h5 class="pl-5 ml-4">Total:</h5>
                            </div>
                        </td>
                        <td>
                        <div class="pro_price pro_final_total">
                            <h5 style="whitespace:no-wrap;">₹<?=$finalTotal?>/-</h5>
                        </div>
                        </td>
                        <td></td>
                        
                    </tr>
                </table>
                    <?php if(isset($this->session->user)){?>
                        <div class="checkout_btn_block mt-3 ">
                            <a href="javascript:;" class="clv_btn checkout-button">Next</a>
                        </div>
                    <?php } else{?>
                        <div class="checkout_btn_block mt-3">
                            <a href="javascript:;" class="clv_btn pop_signin">Login to create demand</a>
                        </div>
                    <?php }
                 } else{?>
                    <h4>Cart is empty</h4>
                <?php }?>
            </div>
        </div>
    </div>
    <script>
        var loc="<?=base_url()?>";
    </script>

   