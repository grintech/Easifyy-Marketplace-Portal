<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<style>
   ul.statas-form {
    margin-top: 27px;
}
ul.statas-form li {
    margin-bottom: 20px;
}
.card.order-detail-table td {
    padding: 10px 19px;
}
.card.order-detail-table th {
    padding: 18px 21px;
}
.card.order-detail-table input.selectAllMerchant{
    width: 30px;
    margin: auto;
}
/* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  
}
/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:1.5em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
}
</style>
<?php //echo '<pre>'; print_r($merchants); echo '</pre>'; die();?>
<div class="orders view large-9 medium-8 columns content">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog py-5" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Invoice</h5>
        <button type="button" id="close1" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <iframe src="" class="pdf-Modal" > </iframe> -->
        <embed src="files/Brochure.pdf" class="pdf-Modal" type="application/pdf" width="100%" height="600px" />
      </div>
      <div class="modal-footer">
        <button type="button" id="close2" class="btn btn-secondary mx-2" data-dismiss="modal">Close</button>
        <a  class="btn btn-primary pdf-download mx-2" href="" download>download Pdf</a>
        <!-- <button type="button" data-type="" id="sendInvoice" data-value="<?php echo $order->id; ?>" class="btn btn-primary mx-2 hide">Send Pdf</button> -->
      </div>
    </div>
  </div>
</div>

    <?php echo $this->Form->create(); ?> 
    <div class="row">
        <div class="col-md-8">
            <div class="card  p-md-4">
                <div class="row mx-0">
                    <h5 class="pl-md-3 col-12 float-left pb-0 mb-1">Orders Details</h5>
                    <a class="btn col-4 p-0 mr-4" href="https://easifyy.com/superadmin/orders/summery/?order=<?php echo base64_encode($order->id)?>" >Conversation Summery</a>
                    <a class="btn col-4 p-0" title="Admin Notes" href="<?= $this->Url->build(['controller' => 'merchants', 'action' => 'notes', 'merchant_id' => base64_encode($order->merchant_id), 'order_id' => base64_encode($order->id)]) ?>" >
                        PSP Payment Request
                    </a>
                </div>
                <hr>
                <div class="row m-md-0">
                    <h5 class="col-md-12">Client's Details</h5>
                    <div class="col-md-12 row">
                        <p class="col-md-3">Name : <p>
                        <p class="col-md-3"><?php echo ucwords($order->user->first_name) ." ". ucwords($order->user->last_name)?></p>
                        <p class="col-md-3">Phone No : <p>
                        <p class="col-md-3"><?php echo $order->user->phone ;?></p>
                        <p class="col-md-3">Email address :</p>
                        <p class="col-md-6"><?=$order->user->username?></p>

                        <?php // print_r($order->user);?>
                    </div>
                    <h5 class="col-md-12">Billing Details</h5>
                    <div class="col-md-12">
                       <p class="col-md-12">Address:</p>
                       <?php  if($order->user->addresses[0]['user_id']){ ?>
                            <p class="col-md-12"><?=$order->user->addresses[0]['address_line_1']?>,<?php if($order->user->addresses[0]['address_line_2']!=""){echo $order->user->addresses[0]['address_line_2'].",";}?> <?=$userCity->name?>,<?=$userState->name?></p>
                        <?php }else{?>
                            <p>No billing address set</p>
                        <?php }?>
                    </div>
                    <?php if($order->gst_name!=""){?>
                        <h5 class="col-md-12">User GST Details </h5>
                        <div class="col-md-12 row">
                            <!--<p class="col-md-3 text-bold">GST No. : <p>
                            <p class="col-md-3"><?php echo $order->gst_no ?></p>
                            <p class="col-md-3">Company / Firm's Name : <p>
                            <p class="col-md-3"><?php echo $order->gst_name ;?></p>
                            <p class="col-md-3">Company / Firm Address</p>
                            <p class="col-md-3 px-1"><?=$order->gst_address?></p>
                            <p class="col-md-3">State </p>
                            <p class="col-md-3 px-1"><?=$order->gst_state?></p>-->
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>GST No. :</td>
                                        <td><?php echo $order->gst_no ?></td>
                                    </tr>
                                    <tr>
                                        <td>Company / Firm's Name :</td>
                                        <td><?php echo $order->gst_name ;?></td>
                                    </tr>
                                    <tr>
                                        <td>Company / Firm Address</td>
                                        <td><?=$order->gst_address?></td>
                                    </tr>
                                    <tr>
                                        <td>State</td>
                                        <td><?=$order->gst_state?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php }?>
                </div>
            </div>
            <?php if($order->merchant_id == 0) { ?>
                    <div class="card order-detail-table" style="">
                        <table>
                            <tr>
                                <th>
                                    PSP Name
                                </th>
                                <th>
                                    PSP Email address
                                </th>
                                <th class="d-flex">
                                    Select All <input type="checkbox" class="selectAllMerchant"  value="1">
                                </th>
                            </tr>
                            <tbody>
                            <?php //print_r($order->order_items);?>
                                <?php if (!empty($merchants)) : ?>
                                    <?php foreach ($merchants as $merchant) : ?>
                                        <?php if($merchant['merchants'][0]['store_name']!=""){?>
                                            <tr>
                                                <td class="merchantId" style="display:none"><?= h($merchant['merchants'][0]['id']) ?></td>
                                                <td><?php echo  h($merchant['merchants'][0]['store_name'])." ".h($merchant['merchants'][0]['last_name']) ?></td>
                                                <td><?= h($merchant['merchants'][0]['username']) ?></td>
                                                <td><input type="checkbox" class="selectMerchant"  name="<?= h($merchant['merchants'][0]['id']) ?>" value="1"></td>
                                            </tr>
                                        <?php }?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="p-md-3">
                            <input type="text" class="inviteforServicePSP" value="" hidden/>
                            <input  type="text" class="orderId" value="<?=$order->id?>" hidden/>
                            <button class="btn sendInvitetoPSP">
                                Send Request
                            </button>
                            <div class="spinner-border" role="status" style="visibility: hidden;">
                              <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
            <?php } else { ?> 
                <div class="card order-detail-table" style="">
                        <table>
                            <h6 class="card-header">Assigned Merchant Details</h6>
                            <tr>
                                <th>PSP Name </th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            <tbody>
                                <tr>
                                    <td><?= $order->merchant->name_prefix.' '.$order->merchant->store_name.' '.$order->merchant->last_name; ?></td>
                                    <td><?= $order->merchant->username; ?></td>
                                    <td><?= $order->merchant->phone_1; ?></td>
                                    <td><a href="https://easifyy.com/superadmin/merchants/view/<?= $order->merchant->id ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                       
                    </div>
            <?php } ?>
            

            <div class="card" style="">
                <table>
                    <tr>
                        <th>
                            Invitation Id 
                        </th>
                        <th>
                            PSP Name 
                        </th>
                        <th>
                            PSP Email
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Invitation Sent At
                        </th>
                    </tr>
                    <tbody>
                    <?php //print_r($order->order_items);?>
                        <?php if (!empty($order->order_invitation)) : ?>
                            <?php foreach ($order->order_invitation as $orderInv) : ?>
                                <tr>
                                    <td>#<?= h($orderInv->id) ?></td>
                                    <td><?= h($orderInv->user->first_name ." ".$orderInv->user->last_name ) ?></td>
                                    <td><?= h($orderInv->user->username) ?></td>
                                    <td><?php 
                                        switch ($orderInv->view_status) {
                                            case '0':
                                                echo "<span class='badge badge-pill badge-primary'>No Response</span>";
                                                break;
                                            case '1':
                                                echo '<span class="badge badge-pill badge-success my-2">Accepted</span>';
                                                break;                                            
                                            case '-1':
                                                echo '<span class="badge badge-pill badge-danger my-2">Rejected</span>';
                                                break;  
                                            case '2'://Canceled 
                                                echo '<span class="badge badge-pill badge-dark my-2">Canceled </span>';
                                                break;
                                        }
                                    ?></td>
                                    <td><?php echo date_format($orderInv->created,"d-M-Y h:i:s A "); ?></td>

                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php 
                if (!is_null($order->psp_cancel_msg) || !is_null($order->user_cancel_msg)) :
            ?>
                <div class="card">
                    <h6 class="card-header">
                        Order Cancel Reason
                    </h6>
                    <?php if (!is_null($order->psp_cancel_msg)){?>
                        <label for="post"  class="font-weight-bold px-2">PSP Reason to Cancel</label>
                        <div class="row mx-2">
                            <span class="review-label font-weight-bold col-4 p-0 m-0">PSP Reason</span>
                            <span class="review-text col-8 px-2 m-0"><?=$order->psp_cancel_msg?></span> 
                            <span class="review-label font-weight-bold col-4 p-0 m-0">Submitted At</span>
                            <span class="review-text col-8 px-2 m-0"><?=$order->psp_canceled_at?></span> 
                        </div>
                        <hr>
                    <?php }?>
                    <?php if (!is_null($order->user_cancel_msg)){?>
                        <label for="post"  class="font-weight-bold px-2">User Reason to Cancel</label>
                        <div class="row mx-2">
                            <span class="review-label font-weight-bold col-4 p-0 m-0">User Reason</span>
                            <span class="review-text col-8 px-2 m-0"><?=$order->user_cancel_msg?></span> 
                            <span class="review-label font-weight-bold col-4 p-0 m-0">Submitted At</span>
                            <span class="review-text col-8 px-2 m-0"><?=$order->user_canceled_at?></span> 
                        </div>
                    <?php }?>
                </div>
            <?php
                endif;
            ?>
            <div class="card order-detail-table" style="">
                
                    <h6 class="card-header">Transaction Details</h6>
            </div>
                    <?php $i=1; foreach($order->order_payments as $orderpayments): ?>
                        <table class="card order-detail-table">
                        <tr>
                            <th>Transaction</th>
                            <td><?= $i; ?></td>
                        </tr>
                        <tr>
                            <th>Razorpay order ID</th>
                            <td><?= $orderpayments->razorpay_order_id; ?></td>
                        </tr>
                        <tr>
                            <th>Razorpay payment ID</th>
                            <td><?= $orderpayments->razorpay_payment_id; ?></td>
                        </tr>
                        <tr>
                            <th>Razorpay Signature</th>
                            <td><?= $orderpayments->razorpay_signature; ?></td>
                        </tr>
                        <tr>
                            <th>Amount</th>
                            <td>₹<?= $orderpayments->amount; ?></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><?= $orderpayments->created; ?></td>
                        </tr>
                    </table>
                    <?php $i++; endforeach; ?>
            
        </div>

        <div class="col-md-4">
            <div class="card p-md-3 hide">
                <h4>
                    Order Status
                </h4>
                <select class="forn-control" name="action">
                    <option value="action">Select an action</option>
                    <option value="action">Action 2</option>
                    <option value="action">Action 3</option>
                    <option value="action">Action 4</option>
                </select>
                <div class="text-right">
                    <button class="btn">Save</button>
                </div>
            </div>
            <div class="card p-md-3" style="z-index:9;">
                <h4>Status</h4>
                <?php echo $this->Form->control('order_status_id', ['options' => $orderStatuses,'default'=>$order->order_status->id]);?>
                <?php if($order->order_status->id==7): ?>
                    <input type="text" name="refund_amount" class="refund_amount" id="_refund_amount" value="<?= $order->refund;?>" placeholder="Enter Refunded Amount">
                <?php else: ?>
                    <input type="text" name="refund_amount" class="refund_amount" id="_refund_amount" value="" placeholder="Enter Refunded Amount" style="display:none;">
                <?php endif; ?>
                
                <button class="btn">Update Status</button>
                <?php if($order->order_status->id==3) { ?>
                    <br><br><br>&nbsp;&nbsp;&nbsp;
                    <input type="hidden" value="<?php echo $token; ?>" id="_csrfToken">
                    <input type="text" value="" id="transactionFee" placeholder="Enter Transaction Fees in %">
                    <input type="text" value="" id="serviceFee" placeholder="Enter Service charges  in %">
                    <a type="button" class="btn btn-outline-success" id="generateinvoice" data-value="<?php echo $order->id; ?>">Generate PSP Invoice</a>
                    &nbsp;&nbsp;
                    <?php if($order->order_pdf !="") { ?>
                        <a class="btn btn-outline-success" target="_blank" href="https://easifyy.com/pdf/<?=$order->order_pdf?>">Download PSP Invoice</a>
                    <?php }?>
                    &nbsp;<a type="button" class="btn btn-outline-success" id="generateinvoicetocustomer" data-value="<?php echo $order->id; ?>">Generate User Invoice</a>
                    
                    &nbsp;
                    <div class="spinner-wrap" style="display: none;">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        Genrating Invoice...
                    </div>
                    
                <?php } ?>
            </div>
            <?php
                $atmptCount=0; 
                if(count($order->reviews)!=0){
                    foreach($order->reviews as $reviews){
                        if($reviews->delete_status==1){
                            $atmptCount++;
                            ?>
                            <div class="card p-md-3">
                                <div class="row"><h5 class="text-center">Attempt-<?=$atmptCount?></h5></div>
                                <label for="post"  class="font-weight-bold green-color">Order Marked As Completed by PSP</label>
                                <div class="row mx-0">
                                    <span class="review-label font-weight-bold col-4 p-0 m-0">PSP Cmt.</span>
                                    <span class="review-text col-8 px-2 m-0"><?=$reviews->merchant_review?></span> 
                                    <span class="review-label font-weight-bold col-4 p-0 m-0">Sub. At</span>
                                    <span class="review-text col-8 px-2 m-0"><?=$reviews->created?></span> 
                                </div>
                                <hr>
                                <?php if($reviews->user_review!=""){?>
                                    <label for="post" class="font-weight-bold">User Reply TO PSP</label>
                                    <div class="row mx-0">
                                        <span class="review-label font-weight-bold col-4 p-0 m-0">User Reply</span>
                                        <span class="review-text col-8 px-2 m-0"><?=$reviews->user_review?></span> 
                                        <span class="review-label font-weight-bold col-4 p-0 m-0">Replied At</span>
                                        <span class="review-text col-8 px-2 m-0"><?php echo $reviews->updated?></span> 
                                    </div>
                                    <?php if($reviews->approved==1){?>
                                        <span class="badge badge-success my-2">Approved By User</span>
                                    <?php }elseif($reviews->approved==-1){?>
                                        <span class="badge badge-danger my-2">Declined By User</span>
                                <?php }
                                }
                                ?>
                            </div>
            <?php       }
                    }
                ?>
                <!--<div class="card p-md-3">
                    <label for="post">Order Marked As Completed by PSP</label>
                    <div class="row mx-0">
                        <span class="review-label col-3">Review</span>
                        <span class="review-text col-9"><?=$order->reviews[0]->review?></span> 
                    </div>
                    <div class="row mx-0">
                        <span class="review-label col-3">Rating</span>
                        <span class="review-text"><?=$order->reviews[0]->rating?></span>
                        <div class="rating-stars col-9">
                            <ul id='review-stars'>
                                <?php $rating = $order->reviews[0]->rating;?>
                                <li class='star <?php if($rating==1 or $rating>1){echo "selected";}?>' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star <?php if($rating==2 or $rating>2){echo "selected";}?>' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star <?php if($rating==3 or $rating>3){echo "selected";}?>' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star <?php if($rating==4 or $rating>4){echo "selected";}?>' title='Excellent' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star <?php if($rating==5 or $rating>5){echo "selected";}?>' title='WOW!!!' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>-->
            <?php }?>
            <?php if($order->reviews[1]!=""){?>
                <!--<div class="card p-md-3">
                    <label for="post">Order Marked As Completed by User</label>
                    <span class="review-label">Review</span>
                    <span class="review-text"><?=$order->reviews[1]->review?></span> 
                    <div class="row mx-0">
                        <span class="review-label col-3">Review</span>
                        <span class="review-text col-9"><?=$order->reviews[1]->review?></span> 
                    </div>
                    <div class="row mx-0">
                        <span class="review-label col-3">Rating</span>
                        <!--<span class="review-text"><?=$order->reviews[1]->rating?></span> 
                        <div class="rating-stars col-9">
                            <ul id='review-stars'>
                                <?php $rating = $order->reviews[1]->rating;?>
                                <li class='star <?php if($rating==1 or $rating>1){echo "selected";}?>' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star <?php if($rating==2 or $rating>2){echo "selected";}?>' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star <?php if($rating==3 or $rating>3){echo "selected";}?>' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star <?php if($rating==4 or $rating>4){echo "selected";}?>' title='Excellent' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star <?php if($rating==5 or $rating>5){echo "selected";}?>' title='WOW!!!' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>-->
            <?php }?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#close1').click(function() {
            $('#exampleModal').css("display","none");
            $('#exampleModal').removeClass("open");
            $('#exampleModal').css("opacity","0");
            $('.modal-overlay').css("opacity","0");
            $('body').css("overflow","auto");
        });
        $('#close2').click(function() {
            $('#exampleModal').css("display","none");
            $('#exampleModal').removeClass("open");
            $('#exampleModal').css("opacity","0");
            $('.modal-overlay').css("opacity","0");
            $('body').css("overflow","auto");
        });

        console.log('Application Running !!!');
        setTimeout(function(){
            $(".dropdown-content li").on("click", function() {
                var value= $(this).text();
                if(value=='Refunded') {
                    $('.refund_amount').css("display","block");
                    // $(".refund_amount").prop('required',true);
                } else {
                    $('.refund_amount').css("display","none");
                    // $(".refund_amount").prop('required',true);
                }
            });
        }, 1000);
        
   
    });    
</script>