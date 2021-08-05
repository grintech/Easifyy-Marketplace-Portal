<?php
/**
 * Superadmin - Order Notes Summery
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

.msg-box .card {
    background-color: #f7f7f7;
    color: #656363;
    font-size: 14px;
}

.msg-box .card p {
    padding: 8px 8px 0px 8px;
}

</style>
<?php // echo '<pre>'; print_r($orders); echo '</pre>'; die();?>
<div class="orders view large-9 medium-8 columns content">
    <div class="row">
        <h4 class=" col-md-12 text-center">Order Notes Summery</h4>
    </div>    
        <div class="row">
            <?php 
                foreach ($orders as $order_note) {
                    $data=unserialize($order_note->message); ?>
                    <div class="col-md-12 msg-box">
                        <div class="col-md-6">
                            <div class="card w-75 p-3">
                            <p class="card-header py-1 px-2">PSP reply: <?= $data['status']; ?></p>
                                <p><?php echo $data['comment'];?></p>
                                <!--<iframe src="https://easifyy.com/order_docs/<?= $data['doc_name']; ?>" frameborder="0"></iframe>-->
                                <?php if($data['doc_name']!=""){?>
                                    <a class="px-2 mx-2" href="https://easifyy.com/order_docs/<?=$data['doc_name']?>" download>
                                        <i class="fa fa-download" aria-hidden="true"></i> <?php echo explode("_",$data['doc_name'])[1];?>
                                    </a>
                                <?php }?>
                                <p><b>PSP: </b><?php echo $order_note->merchant->store_name;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 msg-box">
                        <div class="col-md-6 float-right">
                            <div class="card w-75 p-3 float-right">
                                <p class="card-header py-1 px-2">User Reply : <?= $data['status']; ?></p>
                                <?php if($order_note->payment_reply!=""){?>
                                    <p><?php echo $order_note->payment_reply?></p>
                                    <?php if($order_note->link!=""){?>
                                        <a class="px-2 mx-2" href="https://easifyy.com/order_docs/<?=$order_note->link?>" download>
                                            <i class="fa fa-download" aria-hidden="true"></i> <?php echo explode("_",$order_note->link)[1];?>
                                        </a>
                                    <?php }?>
                                    <!--<iframe src="https://easifyy.com/order_docs/<?=$order_note->link; ?>" frameborder="0"></iframe>-->
                                    <p> <b>USER: </b><?php echo $order_note->user->first_name;?></p>
                                <?php }else{?>
                                    <p><b>Waiting for user reply </b></p>
                                <?php }?>
                            </div>
                        </div>
                    </div>
            <?php } ?>
        </div>
    <!-- </div> -->
</div>