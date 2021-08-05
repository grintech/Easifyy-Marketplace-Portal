<style>
.alert {
    position: sticky !important;
}    
input {
    padding: 5px !important;
}

.breadcrumbs-trail li {
    float: left;
    padding-left: 10px;
    font-size: 15px;
}
.alert-success {
    display:block !important;
}
/*Star Rating css */

* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

*:before,
*:after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.clearfix {
    clear: both;
}

.text-center {
    text-align: center;
}

pre {
    display: block;
    padding: 9.5px;
    margin: 0 0 10px;
    font-size: 13px;
    line-height: 1.42857143;
    color: #333;
    word-break: break-all;
    word-wrap: break-word;
    background-color: #F5F5F5;
    border: 1px solid #CCC;
    border-radius: 4px;
}

.header {
    padding: 20px 0;
    position: relative;
    margin-bottom: 10px;

}

.header:after {
    content: "";
    display: block;
    height: 1px;
    background: #eee;
    position: absolute;
    left: 30%;
    right: 30%;
}

.header h2 {
    font-size: 3em;
    font-weight: 300;
    margin-bottom: 0.2em;
}

.header p {
    font-size: 14px;
}



#a-footer {
    margin: 20px 0;
}

.new-react-version {
    padding: 20px 20px;
    border: 1px solid #eee;
    border-radius: 20px;
    box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.1);

    text-align: center;
    font-size: 14px;
    line-height: 1.7;
}

.new-react-version .react-svg-logo {
    text-align: center;
    max-width: 60px;
    margin: 20px auto;
    margin-top: 0;
}

.success-box {
    margin: 50px 0;
    padding: 10px 10px;
    border: 1px solid #eee;
    background: #f9f9f9;
}

.success-box img {
    margin-right: 10px;
    display: inline-block;
    vertical-align: top;
}

.success-box>div {
    vertical-align: top;
    display: inline-block;
    color: #888;
}

/* Rating Star Widgets Style */
.rating-stars ul {
    list-style-type: none;
    padding: 0;

    -moz-user-select: none;
    -webkit-user-select: none;
}

.rating-stars ul>li.star {
    display: inline-block;

}

/* Idle State of the stars */
.rating-stars ul>li.star>i.fa {
    font-size: 2.5em;
    /* Change the size of the stars */
    color: #ccc;
    /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul>li.star.hover>i.fa {
    color: #FFCC36;
}

/* Selected state of the stars */
.rating-stars ul>li.star.selected>i.fa {
    color: #FF912C;
}

/*Star rating css ends */
.colums-reves {
    flex-direction: column-reverse;
}
</style>
<?php 
	foreach($reviews as $PSPreview) { 
        //dd($PSPreview);
        $name=$PSPreview->user->first_name.' '.$PSPreview->user->last_name;
		$mname=$PSPreview->merchant->store_name.' '.$PSPreview->merchant->last_name;
	} 
?>
<div class="card card-tabs">
    <div class="card-content">
        <div class="row pb-1">
            <?php
				$this->Breadcrumbs->add(
				    'Home',
				);
				$this->Breadcrumbs->add([
				    ['title' => 'Dashboard', 'url' => ['controller' => 'users', 'action' => 'dashboard']],
				    ['title' => 'In Progress Order', 'url' => ['controller' => 'orders', 'action' => 'inProgress']],
				    ['title' => 'Order', 'url' => ['controller' => 'orders', 'action' => 'review', $_GET['order']]]
				]);
				$this->Breadcrumbs->add(
				    'Order Complete',
				);
				echo $this->Breadcrumbs->render(
				    ['class' => 'breadcrumbs-trail'],
				    ['separator' => '<i class="fa fa-angle-right"></i>']
				);
			?>
        </div>
    </div>
</div>
<?php //dd($order);?>
<div class="card card-tabs mx-md-5 my-5">
    <div class="card-content">
        <div class="row pb-1 text-center">
            <h5 class="col-md-12">Order Complete</h5>
        </div>
        <div class="container">
            <?php if(!is_null($order->psp_cancel_msg)){?>
				<div class="msg-content mb-2">
                    <div class="row">
                        <h6 class="review-heading font-weight-bold">PSP: &nbsp;</h6>
                        <h6 class="review-heading"> <?=$mname; ?></h6>
                    </div>
                    <div class="row">
                        <h6 class="review-heading font-weight-bold">PSP Comment: &nbsp;</h6>
                        <h6 class="review-heading"> <?=$order->psp_cancel_msg?></h6>
                    </div>
                    <div class="row">
                        <h6 class="review-heading font-weight-bold">Cancelled At: &nbsp;</h6>
                        <h6 class="review-heading"><?php echo date('d M Y h:i a',strtotime($order->psp_canceled_at));?></h6>
                    </div>
                    <div class="row">
                        <h5 class="s">
                            <div class="alert alert-warning" role="alert">
                                Order Cancelled by PSP
                            </div>
                        </h5>
                    </div>
                </div>
			<?php }?>
			<?php if(!is_null($order->user_cancel_msg)){?>
				<div class="msg-content ml-auto">
                <div class="row">
						<h6 class="review-heading font-weight-bold">User:&nbsp;</h6>
						<h6 class="review-heading"> <?= $name ?></h6>
					</div>
                    <div class="row">
						<h6 class="review-heading font-weight-bold">User Reply:&nbsp;</h6>
						<h6 class="review-heading"> <?=$order->user_cancel_msg?></h6>
					</div>	
                    <div class="row">
                        <h6 class="review-heading font-weight-bold">Cancelled At:&nbsp;</h6>
                        <h6 class="review-heading"><?php echo date('d M Y h:i a',strtotime($order->user_canceled_at));?></h6>
                    </div>
                    <div class="row">
                        <h5 class="">
                            <div class="alert alert-warning" role="alert">
                                Order Cancelled by User
                            </div>
                        </h5>
                    </div>
				</div>
			<?php }?>
            
            <?php if($_GET['again']==True){ ?>
            <div class="row pb-1 text-center">
                <h6 class="text-center">Please upload the documents Again according to Requirement</h4>
            </div>
            <?= $this->Form->create('', array('url'=>'/admin/orders/review','id' => 'review' ,'class'=>'row col-md-6','method'=>'POST')) ?>
            <input type="hidden" name="merchant_id" value="<?= $merchant_id; ?>">
            <input type="hidden" name="user_id" id="user_id" value="<?php echo base64_decode($_GET['user']); ?>">
            <input type="hidden" value="<?= base64_decode($_GET['order']); ?>" name="order_id" id="order_id">
            <input type="hidden" value="psp" name="user_type" id="user_type">
            <!--<input type="file" name="uploadProjectDoc"  multiple="multiple" class='uploadProjectDoc'/>-->
            <input type="hidden" name="project_files" id="project_files" />
            <div class="request-payment-1" style="width: 100%;">
                <div class="input text">
                    <label for="review">Upload documents</label>
                    <input type="file" name="uploadProjectDoc" multiple="multiple" class='uploadProjectDoc' />
                </div>
                <input class="field-count" value="0" hidden />
                <div class="docs-preview row">

                </div>
                <textarea name="merchant_review" class="form-control col-md-12" id="merchant_review" required></textarea>

                <?php //echo $this->Form->control('review', array('id'=>'review', 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Comment', 'div' => false )); ?>
                <input type="hidden" name="rating" id="ratingValue" class="rating-value" value="1">
                <div class="input-field col s2 d-flex">
                    <div>
                        <button class="btn btn-view-profile btn-request-payment" type="submit">Done</a>
                    </div>
                </div>
            </div>
            <?= $this->Form->end() ?>
            <h5 class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    Previously Uploaded documents
                </div>
            </h5>
            <?php }?>
            <?php 
				//dd($reviews);
            if(empty($reviews)){?>
            <div class="row">
                <?= $this->Form->create('', array('url'=>'/admin/orders/review','id' => 'review' ,'class'=>'row col-md-6','method'=>'POST')) ?>
                <input type="hidden" name="merchant_id" value="<?= $merchant_id; ?>">
                <input type="hidden" name="user_id" id="user_id" value="<?php echo base64_decode($_GET['user']); ?>">
                <input type="hidden" value="<?= base64_decode($_GET['order']); ?>" name="order_id" id="order_id">
                <!--<input type="file" name="uploadProjectDoc"  multiple="multiple" class='uploadProjectDoc'/>-->
                <input type="hidden" name="project_files" id="project_files" />
                <div class="request-payment-1" style="width: 100%;">
                    <div class="input text">
                        <label for="review">Upload documents</label>
                        <input type="file" name="uploadProjectDoc" multiple="multiple" class='uploadProjectDoc' required/>
                    </div>
                    <input class="field-count" value="0" hidden />
                    <div class="docs-preview row">

                    </div>
                    <?php //echo $this->Form->control('review', array('id'=>'review', 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Comment', 'div' => false )); ?>
                    <textarea name="merchant_review" class="form-control col-md-12" id="merchant_review" required></textarea>
                    <input type="hidden" name="rating" id="ratingValue" class="rating-value" value="1">


                    <div class="input-field col s2 d-flex">
                        <div>
                            <button class="btn btn-view-profile btn-request-payment" type="submit">Done</a>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
            <?php } elseif(count($reviews)>0) {
						$totalReview=count($reviews);
						//echo "<pre>";print_r($reviews);echo "</pre>";
						$i=0;
						foreach($reviews as $reviewArr){
							//$review->user->first_name;
							$i++;	
							?><div class="msg-content">
                
                <div class="row justify-content-left">
                    <h6 class="review-heading font-weight-bold">PSP  :&nbsp;</h6>
                    <p class="review-text py-2">
                        <?php echo $reviewArr->merchant->store_name ." ". $reviewArr->merchant->last_name ?></p>
                </div>
               
                <div class="row justify-content-left">
                    <?php // print_r($reviews) ?>
                    <h6 class="review-heading font-weight-bold">PSP Comment : &nbsp;</h6>
                    <p class="review-text py-2"><?php echo $reviewArr->merchant_review;?></p>
                </div>

                <div class="review-div">
                    <div class="row justify-content-left">
                        <h6 class="review-heading font-weight-bold">Documents : </h6>
                        <div class="review-text">
                            <?php
                                $data=$reviewArr->project_files;
                                $projectFiles = explode("|",$data);
                                foreach($projectFiles as $file){
                                    if( $file!=""){
                                        //echo '<div class="col-4 colums-reves mb-2 mx-3"> <iframe src="https://easifyy.com/order_docs/'.$file.'"></iframe>';
                                        echo '<a class="px-2 mx-2" href="https://easifyy.com/order_docs/'.$file.'" download>  <i class="fa fa-paperclip" aria-hidden="true"></i>'.$file.'</a>';
                                    }
                                }
                            ?>
                        </div>
                    </div>
				</div>
                <div class="row justify-content-left">
                    <?php // print_r($reviews) ?>
                    <h6 class="review-heading font-weight-bold">Submitted At :&nbsp;</h6>
                    <p class="review-text py-2">&nbsp;&nbsp;<?php echo date('d M Y h:i a', strtotime($reviewArr->created));?></p>
                </div>
            </div>

            <?php
                if($i==0){
                    echo "<hr>";
                }
            ?>
        <div class='msg-content pull-right ml-auto'>
        <?php 
        if($reviewArr->user_review!=""){
            if($reviewArr->approved==-1){	?>
            <div class="row">
                <h6 class="review-heading font-weight-bold">User :&nbsp; </h6>
                <p class="review-text py-2">
                    <?php echo $reviewArr->user->first_name ." ". $reviewArr->user->last_name ?>
                </p>
            </div>
            <div class="row">
                <h6 class="review-heading font-weight-bold">User Reply :&nbsp; </h6>
                <p class="review-text py-2">
                    <?php echo $reviewArr->user_review;?>
                </p>
            </div>
            <div class="row">
                <h6 class="review-heading font-weight-bold"> Replied At :&nbsp; </h6>
                <p class="review-text py-2">
                    <?php echo date('d M Y h:i a', strtotime($reviewArr->updated));?>
                </p>
            </div>
            <h5 class="row">
                <div class="alert alert-warning" role="alert">
                    Order marked as Incompleted by User
                </div>
            </h5>
        </div>
                
        <div class="col-md-12 d-flex justify-content-center pt-3">
            <?php
                if($totalReview==$i){ 
                    // if($totalReview<=3  && is_null($order->psp_cancel_msg) && $reviewArr->approved==1){ 
                    if($totalReview<=3  && is_null($order->psp_cancel_msg)){  ?>
                    <a href="https://easifyy.com/admin/orders/review/?user=<?php echo ($_GET['user']); ?>&order=<?php echo ($_GET['order']); ?>&again=true"
                        class="btn mx-2">Upload Again</a>
                    <?php }

                if($total_star!=0) {

                } elseif($totalReview>=3 && is_null($order->psp_cancel_msg)){ ?>
            <button class="btn order-cancel-request-psp mb-2 text-center">
                Cancel Request To Easifyy
            </button>
            
            <div class="row py-2  order-cancel-form hide">
                <?= $this->Form->create('', array('url'=>'/admin/orders/cancelRequest','id' => 'review' ,'class'=>'row col-md-12','method'=>'POST')) ?>
                <div class="col-md-12 mx-auto">
                    <input hidden name="orderId" value="<?php echo base64_decode($_GET['order']); ?>" />
                    <input hidden name="user" value="<?php echo base64_decode($_GET['user']); ?>" />
                    <h6 col-md-9 mx-auto>Please Explain that Why you Want to Cancel this Order </h6>
                    <hr>
                    <textarea name="cancel_request" id="cancel_request" required></textarea>
                    <div class="input-field row justify-content-center submit-div">
                        <button class="btn btn-view-profile mx-1" type="submit"> Submit</button>
                        <button class="btn close-cancel-div"> Cancel</button>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
        <?php }elseif($reviewArr->approved==0){
            echo "Waiting for Users Reply!!! test";
        }elseif($reviewArr->approved==1){?>
        <div class="row justify-content-left pl-5">
            <h6 class="review-heading font-weight-bold">User Comment : </h6>
            <p class="col-md-3 review-text py-2">
                <?php echo $reviewArr->user_review;?><?php //echo $reviewArr->user->first_name ." ". $reviewArr->user->last_name ?>
            </p>
        </div>
        <div class="row justify-content-left pl-5">
            <h6 class="review-heading font-weight-bold"> Replied At : </h6>
            <p class="review-text py-2">
                <?php echo date('d M Y h:i a', strtotime($reviewArr->updated));?>
            </p>
        </div>
        <div class="row justify-content-left pl-5">
            <!--<span class="col-md-6 review-heading text-center">Rating</span>-->
            <h6 class="review-heading font-weight-bold">Rating</h6>
            <div class='rating-stars'>
                <?php 
                    $UserReview->rating=$total_star;
                ?>
                <ul id='review-stars'>
                    <li class='star <?php if($UserReview->rating==1 or $UserReview->rating>1){echo "selected";}?>'
                        title='Poor' data-value='1'>
                        <i class='fa fa-star fa-fw'></i>
                    </li>
                    <li class='star <?php if($UserReview->rating==2 or $UserReview->rating>2){echo "selected";}?>'
                        title='Fair' data-value='2'>
                        <i class='fa fa-star fa-fw'></i>
                    </li>
                    <li class='star <?php if($UserReview->rating==3 or $UserReview->rating>3){echo "selected";}?>'
                        title='Good' data-value='3'>
                        <i class='fa fa-star fa-fw'></i>
                    </li>
                    <li class='star <?php if($UserReview->rating==4 or $UserReview->rating>4){echo "selected";}?>'
                        title='Excellent' data-value='4'>
                        <i class='fa fa-star fa-fw'></i>
                    </li>
                    <li class='star <?php if($UserReview->rating==5 or $UserReview->rating>5){echo "selected";}?>'
                        title='WOW!!!' data-value='5'>
                        <i class='fa fa-star fa-fw'></i>
                    </li>
                </ul>
            </div>
        </div>
        <h5 class="row pl-5">
            <div class="alert alert-success" role="alert" style="position: relative !important; display:block !important;">
                Order marked as Completed by User
            </div>
        </h5>
        <?php
            echo "</div>";
            echo '<div class="col-md-12 d-flex justify-content-center pt-3"></div>';
        ?>
        <?php }
									}elseif($reviewArr->user_review==""){
										echo '<h5 class="col-md-12">
										<div class="alert alert-warning" role="alert">
											Waiting for Users Reply!!!
										</div>
										</h5>';
										echo "</div>";
                                        echo '<div class="col-md-12 d-flex justify-content-center pt-3"></div>';
									}
								?>
        <?php }?>
        <!--<div class="row justify-content-center">
							<span class="review-heading font-weight-bold">User Email</span>
							<p class="review-text text-center font-weight-bold"><?php echo $reviews->user->username ?></p>
					</div>-->
        <?php }else{?>

        <div class="review-div">
            <div class="row">
                <span class="col-md-6 review-heading text-center">User Name</span>
                <p class="col-md-6 review-text text-center">
                    <?php echo $reviews->user->first_name .' '.$reviews->user->last_name ?></p>
            </div>
            <div class="row">
                <span class="col-md-6 review-heading text-center">User Email</span>
                <p class="col-md-6 review-text text-center"><?php echo $reviews->user->username ?></p>
            </div>
            <div class="row">
                <?php // print_r($reviews) ?>
                <span class="col-md-6 review-heading text-center">Review</span>
                <p class="col-md-6 review-text text-center"><?php echo($reviews->review)?></p>
            </div>
            <div class="row">
                <span class="col-md-6 review-heading text-center">Rating</span>
                <!--<p class="col-md-6 review-text"><?php echo($reviews->rating)?></p>-->
                <div class='col-md-6 rating-stars text-center'>
                    <ul id='review-stars'>
                        <li class='star <?php if($reviews->rating==1 or $reviews->rating>1){echo "selected";}?>'
                            title='Poor' data-value='1'>
                            <i class='fa fa-star fa-fw'></i>
                        </li>
                        <li class='star <?php if($reviews->rating==2 or $reviews->rating>2){echo "selected";}?>'
                            title='Fair' data-value='2'>
                            <i class='fa fa-star fa-fw'></i>
                        </li>
                        <li class='star <?php if($reviews->rating==3 or $reviews->rating>3){echo "selected";}?>'
                            title='Good' data-value='3'>
                            <i class='fa fa-star fa-fw'></i>
                        </li>
                        <li class='star <?php if($reviews->rating==4 or $reviews->rating>4){echo "selected";}?>'
                            title='Excellent' data-value='4'>
                            <i class='fa fa-star fa-fw'></i>
                        </li>
                        <li class='star <?php if($reviews->rating==5 or $reviews->rating>5){echo "selected";}?>'
                            title='WOW!!!' data-value='5'>
                            <i class='fa fa-star fa-fw'></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php }?>
        <!--<?php if ($UserReview!=""){?>
						<div class="row text-center">
							<?php if ($UserReview->approved==1){?>
								<hr>
								<h5 class="col-md-12">Order marked as completed by User</h5>
								<div class="row col-md-12">
									<span class="col-md-6 review-heading text-center">Review</span>
									<span class="col-md-6 review-heading text-center"><?php echo ($UserReview->review)?></span>
								</div>
								<div class="row col-md-12">
									<span class="col-md-6 review-heading text-center">Rating</span>
									<!--<p class="col-md-6 review-text"><?php echo($UserReview->rating)?></p>
									<div class='col-md-6 rating-stars text-center'>
										<ul id='review-stars'>
											<li class='star <?php if($UserReview->rating==1 or $UserReview->rating>1){echo "selected";}?>' title='Poor' data-value='1'>
												<i class='fa fa-star fa-fw'></i>
											</li>
											<li class='star <?php if($UserReview->rating==2 or $UserReview->rating>2){echo "selected";}?>' title='Fair' data-value='2'>
												<i class='fa fa-star fa-fw'></i>
											</li>
											<li class='star <?php if($UserReview->rating==3 or $UserReview->rating>3){echo "selected";}?>' title='Good' data-value='3'>
												<i class='fa fa-star fa-fw'></i>
											</li>
											<li class='star <?php if($UserReview->rating==4 or $UserReview->rating>4){echo "selected";}?>' title='Excellent' data-value='4'>
												<i class='fa fa-star fa-fw'></i>
											</li>
											<li class='star <?php if($UserReview->rating==5 or $UserReview->rating>5){echo "selected";}?>' title='WOW!!!' data-value='5'>
												<i class='fa fa-star fa-fw'></i>
											</li>
										</ul>
									</div>
								</div>
							<?php }else{ ?>
								<h5 class="col-md-12">
								<div class="alert alert-warning" role="alert">
									Order marked as Incompleted by User
								</div></h5>
								<a href="https://easifyy.com/admin/orders/review/?user=<?php echo ($_GET['user']); ?>&order=<?php echo ($_GET['order']); ?>&again=true" class="btn">Upload Again</a>
							<?php }?>
						</div>
				<?php }?>-->
    </div>
</div>
</div>