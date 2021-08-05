<!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
<?php
    $order_id=base64_decode($_GET['order_id']);
    $partPayment=base64_decode($_GET['p']);
    $serviceName=base64_decode($_GET['s']);
?>
<style>
    ol {
        list-style: none;
    }

    .cmnt {
        border: solid 1px;
        height: 55px;
        line-height: 3;
    }

    .progtrckr {
        width:100%;
        display: flex;
        flex-wrap: wrap;
    }

    ul.progtrckr li {
        display: inline-block;
        text-align: center;
        line-height: 16px;
    }

    ul.progtrckr .progtrckr-todo {
        color: #000;
        border-bottom: 12px solid #8e43e7;
        padding: 8px 0;
    }

    ul.progtrckr .done:before {
        background-color: #8e43e7 !important;
    }

    ul.progtrckr .progtrckr-todo:before {
        position: relative;
        bottom: -2.5em;
        float: left;
        left: 50%;
        line-height: 1em;
    }

    ul.progtrckr .progtrckr-done:before {
        position: relative;
        bottom: -2.5em;
        float: left;
        left: 50%;
        line-height: 1em;
    }

    ul.progtrckr .progtrckr-done:before {
        content: "\2713";
        color: white;
        background-color: #8e43e7;
        height: 40px;
        width: 40px;
        line-height: 40px;
        border: none;
        border-radius: 50%;
        top: 48px;
    }

    ul.progtrckr .progtrckr-todo:before {
        content: "\2713";
        color: white;
        background-color: #d3baf1;
        height: 40px;
        width: 40px;
        line-height: 40px;
        border: none;
        border-radius: 50%;
        top: 48px;
        z-index: 999;
    }

    /* .bar-progress {

        color: #000;
        border-bottom: 12px solid #8e43e7;
        padding: 4px 0;
        position: absolute;
        z-index: 99;
        width: 43%;
    } */
    .step-content {
        padding: 55px 0px 0px 38px;
        opacity: 0;
    }

    .cmnt-show:hover .step-content {
        opacity: 9;
        transition: 1s;
    }

    .step-content:before {
        content: "\f0d8";
        font-family: 'FontAwesome';
        font-size: 32px;
        position: relative;
        top: 12px;
        color: #d4edda
    }

    .step-content .alert-success{
        border: none;
        display:block !important;
    }
    

    .top {
        padding-top: 40px;
        padding-left: 13% !important;
        padding-right: 13% !important
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: #455A64;
        padding-left: 0px;
        margin-top: 30px
    }

    #progressbar li {
        list-style-type: none;
        font-size: 13px;
        width: 25%;
        float: left;
        position: relative;
        font-weight: 400
    }

    #progressbar .step0:before {
        font-family: FontAwesome;
        content: "\f10c";
        color: #fff
    }

    #progressbar li:before {
        width: 40px;
        height: 40px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        background: #C5CAE9;
        border-radius: 50%;
        margin: auto;
        padding: 0px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 12px;
        background: #C5CAE9;
        position: absolute;
        left: 0;
        top: 16px;
        z-index: -1
    }

    #progressbar li:last-child:after {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        position: absolute;
        left: -50%
    }

    #progressbar li:nth-child(2):after,
    #progressbar li:nth-child(3):after {
        left: -50%
    }

    #progressbar li:first-child:after {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        position: absolute;
        left: 50%
    }

    #progressbar li:last-child:after {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px
    }

    #progressbar li:first-child:after {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #651FFF
    }

    #progressbar li.active:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    .icon {
        width: 60px;
        height: 60px;
        margin-right: 15px
    }

    .icon-content {
        padding-bottom: 20px
    }

    @media screen and (max-width: 992px) {
        .icon-content {
            width: 50%
        }
    }
    .breadcrumbs-trail li {
      float: left;
      padding-left: 10px;
      font-size: 15px;
    }
    .swal-button-container{
        display:none;
    }
</style>



<body>
    <div class="card card-tabs">
        <div class="card-content">
            <div class="row pb-1">
                <div class="col-md-8">
                    <?php
                        $this->Breadcrumbs->add(
                            'Home',
                        );
                        $this->Breadcrumbs->add([
                            ['title' => 'Dashboard', 'url' => ['controller' => 'users', 'action' => 'dashboard']],
                            ['title' => 'In Progress Order', 'url' => ['controller' => 'order', 'action' => 'inProgress']],
                        ]);
                        $this->Breadcrumbs->add(
                            'Summery',
                        );
                        echo $this->Breadcrumbs->render(
                            ['class' => 'breadcrumbs-trail'],
                            ['separator' => '<i class="fa fa-angle-right"></i>']
                        );
                    ?>
                </div>
                <?php if($partPayment!=0 && $status->coupon_id == Null){?>
                    <div class="col-md-4">
                        <a href="https://easifyy.com/order/partpayment?order=<?php echo base64_encode($order_id); ?>&p=<?= base64_encode($partPayment); ?>&s=<?= base64_encode($serviceName); ?>" class="btn btn col-12 p-0" id="completeStatus">
                            Pay Pending Amount
                        </a>
                    </div>
                <?php }?>
            </div>
        </div>
    </div> 
    <div class="container pt-md-2">

        <?php if(count($reviews)>0){?>
            <div class="card p-md-2">
                <div class="row mx-5">
                    <label for="post col-md-6">Order Marked As Completed by PSP</label>
                    <a class="col-md-3 btn mx-5" href="https://easifyy.com/order/review?user=<?= base64_encode($status->user_id); ?>&order=<?= base64_encode($status->id); ?>&psp=<?= base64_encode($status->merchant_id); ?>">Click here view</a>
                </div>
                <!--<div class="col-6">
                    <a class="btn btn col-12 p-0" id="beforeCompleteStatus" data-value="<?php echo $order->id; ?>">
                        Complete Order 
                    </a>
                </div>-->
            </div>
        <?php }?>
        <!-- comment started here-->
         <div class="row pt-md-3">
            <div class="col-md-12">
               <ul class="progtrckr" data-progtrckr-steps="5">
                    <?php $i=1; foreach ($order as $orders) : ?>
                        <?php $mesage= unserialize($orders->message); ?>
                        <li class="cmnt-show" data-count="" style="width:<?php echo (100/count($order));?>% !important;">
                            <div class="progtrckr-todo done">
                                <h5><?=$mesage['status']?></h5>
                                <!-- <div class="bar-progress"></div> -->
                            </div>
                            <div class="step-content">
                                <?//= $data['status']; ?>
                                <div class="alert alert-success">
                                    <?//=$data['comment']; ?>
                                    <?= $mesage['comment']; ?>
                                </div>
                            </div>
                        </li>
                    <?php $i++; endforeach; ?>
                </ul>
            </div>
        </div> 
        <!--<div class="row">
            <h5 class="col-md-12">Gallery</h5>
            <?php foreach ($order as $orders) {
                $mesage= unserialize($orders->message); ?>
                <?php if($mesage['doc_name']!=""){?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                        <a href="https://easifyy.com/order_docs/<?= $mesage['doc_name']; ?>" target="_blank">
                            <iframe class="col-md-12" src="https://easifyy.com/order_docs/<?=$mesage['doc_name'];?>" style="width:500px; height:300px;" frameborder="0">
                            </iframe>
                        </a>
                        <div class="caption">
                            <a class="px-2 mx-2" href="https://easifyy.com/order_docs/<?=$mesage['doc_name']?>" download>
                                <i class="fa fa-download" aria-hidden="true"></i> <?php echo explode("_",$mesage['doc_name'])[1];?>
                            </a>
                        </div>
                        </div>
                    </div>
                <?php } ?>
            <?php }?>
        </div>-->
        <!--<div class="row ">
            <span class="px-3">
                <h5><?php echo __('Invoice Id'); ?></h5>
            </span>
            <p style="color:#000" class="font-weight-bold py-3 my-0">
                <?= h($order->invoice_id) ?>
            </p>
        </div>-->
        <!-- comment ended here
        <div class="card card-tabs">
            <div class="card-content">
                <?php 
                    $order_status=$status->order_status->name; 
                    if($order_status=='Processing') {
                        $loop_count=1;
                    } elseif ($order_status=='In Progress') {
                        # code...
                        $loop_count=2;
                    } elseif ($order_status=='Pending') {
                        # code...
                        $loop_count=0;
                    } elseif ($order_status=='Cancel') {
                        # code...
                        $loop_count=5;
                    } elseif ($order_status=='Completed') {
                        # code...
                        $loop_count=3;
                    }

                ?>
                <span class="badge badge-dark"><?= $order_status; ?></span>
                <h4>Order Status</h4>
                <ul id="progressbar" class="text-center">
                    <?php
                        $total=3;
                        for ($i=0; $i <= $loop_count; $i++) { 
                            echo '<li class="active step0"></li>';
                            $total=$total-1;
                        }
                    ?>
                    <?php
                        //echo $total;
                        for ($j=0; $j < $total; $j++) { 
                            echo '<li class="step0"></li>';
                        }
                    ?>
                     <li class="step0"></li> 
                </ul>
                <div class="row justify-content-between top-s">
                    
                    <div class="row d-flex icon-content"> 
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Pending</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> 
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Processing</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> 
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">In Progress</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Completed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->

        <div class="card card-tabs">
            <div class="card-header justify-content-center row mx-0 text-white" >
                <h5 style="color:#fff">Conversation</h5>
            </div>
            <div class="card-content">
                <!--<div class="row pb-1">
                    <table class="responsive-table bordered">
                        <thead>
                            <tr>
                                <th>SNo.</th>
                                <th>Prefix</th>
                                <th>Comment</th>
                                <th>Documents</th>    
                                <th>Reply</th>    
                            </tr>    
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($order as $orders) : ?>
                                <?php $mesage= unserialize($orders->message); ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $mesage['status']; ?></td>
                                    <td width="20%"><?= $mesage['comment']; ?></td>
                                    <td>
                                        <?= $mesage['doc_name']; ?>
                                        <?php if($mesage['doc_name']!=""){?>
                                                <iframe class="col-md-12" src="https://easifyy.com/order_docs/<?= $mesage['doc_name']; ?>" frameborder="0">
                                                </iframe>
                                                <a class="px-2 mx-2" href="https://easifyy.com/order_docs/<?=$mesage['doc_name']?>" download>
                                                    <i class="fa fa-download" aria-hidden="true"></i> <?php echo explode("_",$mesage['doc_name'])[1];?>
                                                </a>
                                                <<?= $mesage['doc_name']; ?>
                                        <?php } ?>
                                    </td>
                                    <?php if($orders->payment_reply==""){?>
                                        <td width="28%">
                                            <textarea class="userReply-<?=$orders->id?>" name="comment" placeholder="Comment" cols="10" rows="5"></textarea>
                                            <input type="file" name="" class="orderNoteReply" >
                                            <input hidden tpye="hidden" value="" id="userReplyFile-<?=$orders->id?>" class="userReplyFile" />
                                            <button data-id="<?=$orders->id?>" class="btn-success col-md-12 userReplyNote" >Send</button>
                                        </td>    
                                    <?php }else{?>
                                        <td width="28%">
                                            <textarea class="userReply-<?=$orders->id?>" name="comment" placeholder="Comment" cols="10" rows="5"><?=$orders->payment_reply?></textarea>
                                            <?php if($orders->link!=""){?>
                                                <a class="px-2 mx-2" href="https://easifyy.com/order_docs/<?=$orders->link?>" download>
                                                    <i class="fa fa-download" aria-hidden="true"></i> <?php echo explode("_",$orders->link)[1];?>
                                                </a>
                                                <iframe src="https://easifyy.com/order_docs/<?=$orders->link?>" frameborder="0"></iframe>
                                            <?php }?>
                                        </td>
                                    <?php }?>
                                </tr>    
                            <?php $i++; endforeach; ?>
                        </tbody>
                    </table>
                </div>-->
            </div>
            <div class="row w-100">
                <?php $i=1;
                    foreach ($order as $orders) {
                        $data=unserialize($orders->message); ?>
                        <div class="col-md-12 msg-box">
                            <div class="col-md-6">
                                <div class="card w-75 p-3">
                                    <p class="card-header py-1 px-2">PSP Reply : Step <?= $i; ?></p>
                                    <p><?php echo $data['comment'];?></p>
                                    <!--<iframe src="https://easifyy.com/order_docs/<?= $data['doc_name']; ?>" frameborder="0"></iframe>-->
                                    <?php if($data['doc_name']!=""){?>
                                        <a class="px-2 mx-2" href="https://easifyy.com/order_docs/<?=$data['doc_name']?>" download>
                                            <i class="fa fa-download" aria-hidden="true"></i> <?php echo explode("_",$data['doc_name'])[1];?>
                                        </a>
                                    <?php } else { ?>
                                        <?php //echo 'test'; }
                                        } ?>
                                    <!--<p>PSP  <?php echo $orders->merchant->store_name;?></p>-->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 msg-box">
                            <div class="col-md-6 float-right">
                                <div class="card float-right p-3 w-75">
                                    <p class="card-header py-1 px-2">User Reply : Step <?= $i; ?></p>
                                    <?php if($orders->payment_reply!=""){?>
                                        <p><?php echo $orders->payment_reply?></p>
                                        <?php if($orders->link!=""){?>
                                            <a class="px-2 mx-2" href="https://easifyy.com/order_docs/<?=$orders->link?>" download>
                                                <i class="fa fa-download" aria-hidden="true"></i> <?php echo explode("_",$orders->link)[1];?>
                                            </a>
                                        <?php }?>
                                        <!--<iframe src="https://easifyy.com/order_docs/<?=$orders->link; ?>" frameborder="0"></iframe>-->
                                        <!--<p> USER: <?php echo $orders->user->first_name;?></p>-->
                                    <?php }else{?>
                                        <td width="28%">
                                            <textarea class="userReply-<?=$orders->id?>" name="comment" placeholder="Enter Reply to PSP" cols="10" rows="5"></textarea>
                                            <input type="file" name="" class="orderNoteReply" >
                                            <input hidden tpye="hidden" value="" id="userReplyFile-<?=$orders->id?>" class="userReplyFile" />
                                            <button data-id="<?=$orders->id?>" class="btn col-md-12 userReplyNote" >Send</button>
                                        </td>    
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                <?php $i++;} ?>
            </div>

        </div>           

    </div>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $("#beforeCompleteStatus").on('click',function(){
            const el = document.createElement('div')
            el.innerHTML = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br>"
            el.innerHTML =el.innerHTML +  '<a href="https://easifyy.com/orders/in-progress" target="_blank" class="btn btn col-12 p-0 my-2" id="completeStatus" data-value="<?php echo $order->id; ?>">Decline </a>';
            el.innerHTML =el.innerHTML +  '<a href="https://easifyy.com/order/review?user=<?= base64_encode($status->user_id); ?>&order=<?= base64_encode($status->id); ?>&psp=<?= base64_encode($status->merchant_id); ?>" class="btn btn col-12 p-0 my-2" id="completeStatus" data-value="<?php echo $order->id; ?>">Accept </a>';
            swal({
               showConfirmButton:false,
               title: "Dummy title !",
               content: el,
            })

         });
    </script>-->