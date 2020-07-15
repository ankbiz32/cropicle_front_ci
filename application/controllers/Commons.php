<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commons extends MY_Controller {

	public function __construct(){
		parent::__construct();
		/* $allowedActions = array("login", "logout", "register","account_verification","forgot_password","reset_password");
		$loggedIn = $this->session->userdata("vendor_logged_in");
		$action = $this->router->fetch_method();
		if(!in_array($action,$allowedActions)){
            if (empty($loggedIn)){
                  $this->session->set_flashdata('error_msg', 'Please login to your account');
                  redirect('/vendors/login');
            }
		} */
	}

	
	public function addToCart(){
        echo 'ff';exit;
		$cart = $this->session->userdata("cart");
		$cart = !empty($cart)?$cart:array();
		if($this->input->post()){
			$this->form_validation->set_rules('product_id', 'Product ID', 'required|numeric',array("required"=>"Please enter product ID","numeric"=>"Please enter valid product ID"));
			$this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric',array("required"=>"Please enter quantity","numeric"=>"Please enter valid quantity"));
			
			if ($this->form_validation->run() !== FALSE)
			{
				$product_id = $this->input->post("product_id");
				$quantity = $this->input->post("quantity");
				$productData = $this->product_model->get_product(array("id"=>$product_id, 'is_active'=>BOOL_TRUE,'is_deleted'=>BOOL_FALSE));
				if(!empty($productData)){
					if($productData["quantity"] > 0 and $productData["quantity"] >= $productData["min_selling_quantity"]){
						if($quantity < $productData["min_selling_quantity"]){
							$response = array("status"=>400,"msg"=>"Minimum Quantity to buy is ".$productData["min_selling_quantity"]);
							$this->output
							->set_status_header(200)
							->set_content_type('application/json', 'utf-8')
							->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
							->_display();				
							exit;
						}
						/* $quantity = (isset($cart[$product_id]["quantity"]) and !empty($cart[$product_id]["quantity"]))?$cart[$product_id]["quantity"] + $quantity:$quantity*/;
						//$quantity = ($quantity <= $productData["quantity"])?$quantity:$productData["quantity"]; 
						$quantity = ($quantity <= $productData["quantity"])?$quantity:$productData["quantity"];
						$price = $productData["price"];
						$actual_price = $price;
						
						if(!empty($productData["has_discount"])){
							$newPrice = 0;
							if($productData["discount_type"]==DISCOUNT_TYPE_FLAT){
								$dp = $productData["discount_rate"];
								$newPrice = $productData["price"] - $productData["discount_rate"];
							}
							else if($productData["discount_type"]==DISCOUNT_TYPE_PERCENT){
								$dp = ($productData["price"] / 100) * $productData["discount_rate"];
								$newPrice = $productData["price"] - $dp;
							}
							$price = $newPrice;
						}
						$total = ($quantity * $price);
						$cart[$productData["id"]] = array(
							"product_id" => $productData["id"],
							"name" => $productData["name"],
							"image" => $productData["primary_image"],
							"quantity" => $quantity,
							"actual_price"=>$actual_price,
							"discount_type"=>$productData["discount_type"],
							"discount_rate"=>$productData["discount_rate"],
							"discount"=>$dp,
							"price" => $price,
							"total" => $total,
						);
						$this->session->set_userdata("cart",$cart);
						$cartstr = "";
						$finalTotal = 0;
						$totalItems = count($cart);
						if(!empty($cart)){
							foreach($cart as $row){
								$cartstr.='
								<div class="cart_item">
								<div class="cart_img">
									<a href="#"><img src="'.base_url("/assets/images/products/thumbs/".$row["image"]).'" alt=""></a>
								</div>
								<div class="cart_info">
									<a href="#">'.$row["name"].'</a>
									<span class="quantity">Qty: '.$row["quantity"].'</span>
									<span class="price_cart"><i class="fa fa-inr"></i> '.$row["total"].'</span>
								</div>
								<div class="cart_remove">
									<a href="javascript:void(0);" onclick="removeCartItem('. $row["product_id"].');"><i class="ion-android-close"></i></a>
								</div>
								</div>
								';
								$finalTotal=$finalTotal+$row["total"];
							}
						}
						
						$cartstr.= '
						<div class="mini_cart_table">
						<div class="cart_total">
						<span>Sub total:</span>
						<span class="price"><i class="fa fa-inr"></i> '.$finalTotal.'</span>
						</div>
						<div class="cart_total mt-10">
						<span>total:</span>
						<span class="price"><i class="fa fa-inr"></i> '.$finalTotal.'</span>
						</div>
						</div>

						<div class="mini_cart_footer">
						<div class="cart_button">
						<a href="'.site_url("/products/cart").'">View cart</a>
						</div>
						<div class="cart_button">
						<a href="'.site_url("/products/checkout").'">Checkout</a>
						</div>

						</div>
						';
						$response = array("status"=>200,"msg"=>"Added to cart","data"=>array("content"=>$cartstr,"totalItems"=>$totalItems));
						$this->output
						->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
						->_display();				
						exit;
					}
					else{
						$response = array("status"=>400,"msg"=>"Stock not available");
						$this->output
						->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
						->_display();				
						exit;
					}
					
				}
				else{
					$response = array("status"=>404,"msg"=>"Product not found!");
					$this->output
					->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
					->_display();				
					exit;
				}
			}
			else{
				$response = array("status"=>400,"msg"=>"Invalid Data",'errors'=>$this->form_validation->error_array());
				$this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
				->_display();				
				exit;
			}
		}
	}
	
	public function removeCartItem(){
		$cart = $this->session->userdata("cart");
		$cart = !empty($cart)?$cart:array();
		if($this->input->post()){
			$this->form_validation->set_rules('product_id', 'Product ID', 'required|numeric',array("required"=>"Please enter product ID","numeric"=>"Please enter valid product ID"));
			
			if ($this->form_validation->run() !== FALSE)
			{
				$product_id = $this->input->post("product_id");
				$productData = $this->product_model->get_product(array("id"=>$product_id, 'is_active'=>BOOL_TRUE,'is_deleted'=>BOOL_FALSE));
				if(!empty($productData)){
					
					unset($cart[$product_id]);
					$this->session->set_userdata("cart",$cart);
					$cartstr = "";
					$finalTotal = 0;
					$totalItems = count($cart);
					if(!empty($cart)){
						foreach($cart as $row){
							$cartstr.='
							<div class="cart_item">
							<div class="cart_img">
								<a href="#"><img src="'.base_url("/assets/images/products/thumbs/".$row["image"]).'" alt=""></a>
							</div>
							<div class="cart_info">
								<a href="#">'.$row["name"].'</a>
								<span class="quantity">Qty: '.$row["quantity"].'</span>
								<span class="price_cart"><i class="fa fa-inr"></i> '.$row["total"].'</span>
							</div>
							<div class="cart_remove">
								<a href="javascript:void(0);" onclick="removeCartItem('. $row["product_id"].');"><i class="ion-android-close"></i></a>
							</div>
							</div>
							';
							$finalTotal=$finalTotal+$row["total"];
						}
					}
					
					$cartstr.= '
					<div class="mini_cart_table">
					<div class="cart_total">
					<span>Sub total:</span>
					<span class="price"><i class="fa fa-inr"></i> '.$finalTotal.'</span>
					</div>
					<div class="cart_total mt-10">
					<span>total:</span>
					<span class="price"><i class="fa fa-inr"></i> '.$finalTotal.'</span>
					</div>
					</div>

					<div class="mini_cart_footer">
					<div class="cart_button">
					<a href="'.site_url("/products/cart").'">View cart</a>
					</div>
					<div class="cart_button">
					<a href="'.site_url("/products/checkout").'">Checkout</a>
					</div>

					</div>
					';
					
					$shippingCharges = !empty($finalTotal)?$this->configuration_model->getShippingCharges():0;
					$finalTotal2 = !empty($finalTotal)?($finalTotal+$shippingCharges):0;
					$response = array("status"=>200,"msg"=>"Removed from cart","data"=>array("content"=>$cartstr,"totalItems"=>$totalItems,"subTotal"=>$finalTotal,"shippingCharges"=>$shippingCharges,"finalTotal"=>$finalTotal2));
					$this->output
					->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
					->_display();				
					exit;
				}
				else{
					$response = array("status"=>404,"msg"=>"Product not found!");
					$this->output
					->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
					->_display();				
					exit;
				}
			}
			else{
				$response = array("status"=>400,"msg"=>"Invalid Data",'errors'=>$this->form_validation->error_array());
				$this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
				->_display();				
				exit;
			}
		}
	}
	
	public function updateCart(){
		$cart = $this->session->userdata("cart");
		$cart = !empty($cart)?$cart:array();
		if($this->input->post()){
			$this->form_validation->set_rules('product_id', 'Product ID', 'required|numeric',array("required"=>"Please enter product ID","numeric"=>"Please enter valid product ID"));
			$this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric',array("required"=>"Please enter quantity","numeric"=>"Please enter valid quantity"));
			
			if ($this->form_validation->run() !== FALSE)
			{
				$product_id = $this->input->post("product_id");
				$quantity = $this->input->post("quantity");
				$productData = $this->product_model->get_product(array("id"=>$product_id, 'is_active'=>BOOL_TRUE,'is_deleted'=>BOOL_FALSE));
				if(!empty($productData)){
					if($productData["quantity"] > 0  and $productData["quantity"] >= $productData["min_selling_quantity"]){
						
						if($quantity < $productData["min_selling_quantity"]){
							$response = array("status"=>400,"msg"=>"Minimum Quantity to buy is ".$productData["min_selling_quantity"]);
							$this->output
							->set_status_header(200)
							->set_content_type('application/json', 'utf-8')
							->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
							->_display();				
							exit;
						}
						
						//$quantity = (isset($cart[$product_id]["quantity"]) and !empty($cart[$product_id]["quantity"]))?$quantity:1;
						$quantity = ($quantity <= $productData["quantity"])?$quantity:$productData["quantity"];
						$price = $productData["price"];
						$actual_price = $price;
						
						if(!empty($productData["has_discount"])){
							$newPrice = 0;
							if($productData["discount_type"]==DISCOUNT_TYPE_FLAT){
								$dp = $productData["discount_rate"];
								$newPrice = $productData["price"] - $productData["discount_rate"];
							}
							else if($productData["discount_type"]==DISCOUNT_TYPE_PERCENT){
								$dp = ($productData["price"] / 100) * $productData["discount_rate"];
								$newPrice = $productData["price"] - $dp;
							}
							$price = $newPrice;
						}
						$total = ($quantity * $price);
						$cart[$productData["id"]] = array(
							"product_id" => $productData["id"],
							"name" => $productData["name"],
							"image" => $productData["primary_image"],
							"quantity" => $quantity,
							"actual_price"=>$actual_price,
							"discount_type"=>$productData["discount_type"],
							"discount_rate"=>$productData["discount_rate"],
							"discount"=>$dp,
							"price" => $price,
							"total" => $total,
						);
						$this->session->set_userdata("cart",$cart);
						$cartstr = "";
						$finalTotal = 0;
						$totalItems = count($cart);
						if(!empty($cart)){
							foreach($cart as $row){
								$cartstr.='
								<div class="cart_item">
								<div class="cart_img">
									<a href="#"><img src="'.base_url("/assets/images/products/thumbs/".$row["image"]).'" alt=""></a>
								</div>
								<div class="cart_info">
									<a href="#">'.$row["name"].'</a>
									<span class="quantity">Qty: '.$row["quantity"].'</span>
									<span class="price_cart"><i class="fa fa-inr"></i> '.$row["total"].'</span>
								</div>
								<div class="cart_remove">
									<a href="javascript:void(0);" onclick="removeCartItem('. $row["product_id"].');"><i class="ion-android-close"></i></a>
								</div>
								</div>
								';
								$finalTotal=$finalTotal+$row["total"];
							}
						}
						
						$cartstr.= '
						<div class="mini_cart_table">
						<div class="cart_total">
						<span>Sub total:</span>
						<span class="price"><i class="fa fa-inr"></i> '.$finalTotal.'</span>
						</div>
						<div class="cart_total mt-10">
						<span>total:</span>
						<span class="price"><i class="fa fa-inr"></i> '.$finalTotal.'</span>
						</div>
						</div>

						<div class="mini_cart_footer">
						<div class="cart_button">
						<a href="'.site_url("/products/cart").'">View cart</a>
						</div>
						<div class="cart_button">
						<a href="'.site_url("/products/checkout").'">Checkout</a>
						</div>

						</div>
						';
						$response = array("status"=>200,"msg"=>"Cart Updated","data"=>array("content"=>$cartstr,"totalItems"=>$totalItems, "quantity"=>$quantity, "total"=>$total, "finalTotal"=>$finalTotal));
						$this->output
						->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
						->_display();				
						exit;
					}
					else{
						$response = array("status"=>400,"msg"=>"Stock not available");
						$this->output
						->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
						->_display();				
						exit;
					}
					
				}
				else{
					$response = array("status"=>404,"msg"=>"Product not found!");
					$this->output
					->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
					->_display();				
					exit;
				}
			}
			else{
				$response = array("status"=>400,"msg"=>"Invalid Data",'errors'=>$this->form_validation->error_array());
				$this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
				->_display();				
				exit;
			}
		}
	}
	
	public function productsAutocomplete(){

		/* echo "<pre>";
		print_r($_REQUEST);
		exit; */
		if(isset($_REQUEST["query"]) and !empty($_REQUEST["query"])){
			
			$query = trim($_REQUEST["query"]);
			$suggestArr = array();
			$categories = $this->category_model->categories_dropdown(array("is_active"=>BOOL_TRUE,"is_deleted"=>BOOL_FALSE,"name LIKE"=>"%".$query."%"));
			if(!empty($categories)){
				
				foreach($categories as $row){
					   $suggestArr[] = array("data"=>$row->id,"value"=>$row->full_name,"type"=>SUGGEST_TYPE_CATEGORY,"url"=>site_url("/category/".$row->id."/".$this->utility->cleanText($row->name)));
				}
			}
			
			$products = $this->product_model->products_dropdown(array("Product.is_active"=>BOOL_TRUE,"Product.is_deleted"=>BOOL_FALSE,"Product.name LIKE"=>"%".$query."%"),"Product.name","ASC");
			if(!empty($products)){
				
				foreach($products as $row){
					   $suggestArr[] = array("data"=>$row->id,"value"=>$row->name,"type"=>SUGGEST_TYPE_PRODUCT,"url"=>site_url("/products/detail/".$row->id));
				}
				
				/* if(!empty($suggestArr))	
				{
					asort($suggestArr);				
				} */
			}
			
			$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode(array('suggestions'=>$suggestArr), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();				
			exit;
		}
	}
	
	public function stateWiseCitiesList(){

		if($this->input->post()){
			$state_id = $this->input->post("state_id");
			$citiesList = $this->city_model->cities_dropdown(array("state_id"=>$state_id,"is_deleted"=>BOOL_FALSE));
			
			/* echo "<pre>";
			print_r($citiesList);
			exit; */
			if(!empty($citiesList)){
				$strOpts = "";
				foreach($citiesList as $row){
					$strOpts.=	'<option value="'.$row->id.'">'.$row->name.'</option>';
				}
				
				$response = array("status"=>200,"data"=>$strOpts);
				$this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
				->_display();				
				exit;
			}
		}
	}
	
	
	public function updateFinalPrice(){
		exit("UNAUTHORIZED");
		$data = array();
		$products = $this->product_model->products_dropdown();
		/* echo "<pre>";
		print_r($products);
		exit; */
		if(!empty($products)){
			
			foreach($products as $row){
				if(!empty($row->id)){
					
					

					$price = $row->price;
					$final_price = $row->price;
					$has_discount =$row->has_discount;
					$discount_type = $row->discount_type;
					$discount_rate = $row->discount_rate;

					$productArr = array(
						"final_price"=>$final_price,
					);

					if(!empty($has_discount)){
						$productArr["discount_type"] = $discount_type;
						$productArr["discount_rate"] = $discount_rate;
						if(!empty($has_discount)){
							$newPrice = 0;
							if($discount_type==DISCOUNT_TYPE_FLAT){
								$dp = $discount_rate;
								$newPrice = $price - $discount_rate;
							}
							else if($discount_type==DISCOUNT_TYPE_PERCENT){
								$dp = ($price / 100) * $discount_rate;
								$newPrice = $price - $dp;
							}
							$productArr["final_price"] = $newPrice;
						}
					}


					$productCond = array(
						"id" => $row->id
					);
					$productUpdated = $this->product_model->update_product($productArr,$productCond);
				
					
				}
			}
		}		
	}
	
}
