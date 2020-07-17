
    <!--Breadcrumb-->
    <div class="breadcrumb_wrapper" style="background: url(<?=base_url('assets/')?>images/demand-banner.jpg) no-repeat center; background-size: cover;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="breadcrumb_inner">
                        <h3>Your Demands</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb_block">
            <ul>
                <li><a href="index.html">home</a></li>
                <li>Your Demands</li>
            </ul>
        </div>
    </div>
    
    <!--Cart Single-->
    <div class="cart_single_wrapper clv_section">
        <div class="container">
            <div class="cart_table_section woocommerce-cart table-responsive">
                <div class="table_heading">
                    <h4>Total demands : <?=isset($demands)?sizeof($demands):'0'?></h4>
                </div>
                <?php if(!empty($demands)){?>
                    <table class="table-responsive cart_table woocommerce-cart-form__contents">
                        <tr>
                            <th>Demanded on</th>
                            <th>Total amount</th>
                            <th>Remarks</th>
                            <th>Status</th>
                            <th>Details</th>
                        </tr>
                        <?php foreach($demands as $row){    
                        ?>
                        <tr class="productRow">
                            <td>
                                <div class="pro_price">
                                    <h6><?=date('d-M-Y',strtotime($row->created))?></h6>
                                </div>
                            </td>
                            <td>
                                <div class="pro_price">
                                    <h6>₹<?=$row->demand_amount?>/-</h6>
                                </div>
                            </td>
                            <td>
                                <div class="pro_price">
                                    <h6><?=$row->admin_remarks?></h6>
                                </div>
                            </td>
                            <td>
                                <div class="pro_price">
                                    <?=$row->status=='PENDING'?'<h6 class="text-warning">Pending</h6>':'<h6 class="text-success">Approved</h6>'?></h6>
                                </div>
                            </td>
                            <td>
                                <a href="javascript:;" class="pro_remove demandDetails" data-id="<?=$row->id?>">
                                    <i class="fa fa-info-circle fa-lg"></i>
                                </a>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                <?php } else{?>
                    <h4>You haven't demanded anything yet!</h4>
                <?php }?>
            </div>
        </div>
    </div>

    <div class="modal fade " id="demandModal" tabindex="-1" role="dialog" aria-labelledby="Demand Modal" aria-modal="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-info-circle"></i> Demand details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body px-sm-4 px-2">

                </div>
            </div>
        </div>
    </div>

    <script>
        var loc="<?=base_url()?>"
    </script>

   