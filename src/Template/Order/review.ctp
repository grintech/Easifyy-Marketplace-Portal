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

/*Star Rating css */

* {
  -webkit-box-sizing:border-box;
  -moz-box-sizing:border-box;
  box-sizing:border-box;
}

*:before, *:after {
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}

.clearfix {
  clear:both;
}

.text-center {text-align:center;}

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
  padding:20px 0;
  position:relative;
  margin-bottom:10px;
  
}

.header:after {
  content:"";
  display:block;
  height:1px;
  background:#eee;
  position:absolute; 
  left:30%; right:30%;
}

.header h2 {
  font-size:3em;
  font-weight:300;
  margin-bottom:0.2em;
}

.header p {
  font-size:14px;
}



#a-footer {
  margin: 20px 0;
}

.new-react-version {
  padding: 20px 20px;
  border: 1px solid #eee;
  border-radius: 20px;
  box-shadow: 0 2px 12px 0 rgba(0,0,0,0.1);
  
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
  margin:50px 0;
  padding:10px 10px;
  border:1px solid #eee;
  background:#f9f9f9;
}

.success-box img {
  margin-right:10px;
  display:inline-block;
  vertical-align:top;
}

.success-box > div {
  vertical-align:top;
  display:inline-block;
  color:#888;
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
  font-size:2.5em; /* Change the size of the stars */
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

/*Star rating css ends */
.colums-reves{
	flex-direction: column-reverse;
}
</style>
<div class="card card-tabs">
    <div class="card-content">
        <div class="row pb-1">
			<?php
				$this->Breadcrumbs->add(
				    'Home',
				);
				$this->Breadcrumbs->add([
				    ['title' => 'Dashboard', 'url' => ['controller' => 'users', 'action' => 'dashboard']],
				    ['title' => 'In Progress Order', 'url' => ['controller' => 'order', 'action' => 'inProgress']],
				    ['title' => 'Order', 'url' => ['controller' => 'order', 'action' => 'review', $_GET['order']]]
				]);
				$this->Breadcrumbs->add(
				    'Review and Complete',
				);
				echo $this->Breadcrumbs->render(
				    ['class' => 'breadcrumbs-trail'],
				    ['separator' => '<i class="fa fa-angle-right"></i>']
				);
			?>
		</div>
	</div>
</div>			
<?php 
	foreach($PSPreviews as $PSPreview) {
		$name=$PSPreview->user->first_name.' '.$PSPreview->user->last_name;
		$mname=$PSPreview->merchant->store_name.' '.$PSPreview->merchant->last_name;
	} 
?>
<div class="card card-tabs m-5">
	<div class="card-content">
		<div class="container">
			<div class="row pb-1 text-center mb-3">
				<h5 class="col-md-12">Review and Complete </h5>
			</div>
			<?php //print_r($reviews);?>
			<?php if(count($PSPreviews)>0){
				$totalReview=count($reviews);
				//dd($reviews);
				$i=0;
			?>
			<?php if(!is_null($order->psp_cancel_msg)){?>
				<div class="msg-content mb-2">
					<div class="row">
                        <h6 class="review-heading font-weight-bold">PSP: &nbsp;</h6>
                        <h6 class="review-heading"> <?=$mname?></h6>
                    </div>
						<div class="row">
							<h6 class="review-heading font-weight-bold">PSP Comment:&nbsp;</h6>
							<h6 class="review-heading"><?=$order->psp_cancel_msg?></h6>
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
			<?php if(!is_null($order->user_cancel_msg)){ ?>
				<div class="msg-content ml-auto">
				<div class="row">
						<h6 class="review-heading font-weight-bold">User:&nbsp;</h6>
						<h6 class="review-heading"><?= $name; ?></h6>
					</div>
					<div class="row">
						<h6 class="review-heading font-weight-bold">User Reply:&nbsp;</h6>
						<h6 class="review-heading"><?=$order->user_cancel_msg?></h6>
					</div>
					<div class="row">
						<h6 class="review-heading font-weight-bold">Cancelled At:&nbsp; </h6>
						<h6 class="review-heading"><?php echo date('d M Y h:i a',strtotime($order->user_canceled_at));?></h6>
					</div>
					<div class="row">
                        <h5 class="s">
                            <div class="alert alert-warning" role="alert">
                                Order Cancelled by User
                            </div>
                        </h5>
                    </div>	
				</div>
			<?php }?>
			<!-- Cancel Message to Easifyy Starts-->
				<?php if($totalReview>=3 && $reviews[0]->approved == -1 &&  is_null($order->user_cancel_msg) ){?>
					<div class="row mx-auto" style="padding-bottom:10px;">
						<button class="btn order-cancel-request-psp">
							Cancel Request To Easifyy
						</button>
						<div class="row py-2  order-cancel-form hide">
							<?= $this->Form->create('', array('url'=>'/order/cancelRequest','id' => 'review' ,'class'=>'row col-md-12','method'=>'POST')) ?>
								<div class="col-md-12 mx-auto">
									<input hidden name="orderId" value="<?php echo base64_decode($_GET['order']); ?>"/>
									<input hidden name="user" value="<?php echo base64_decode($_GET['user']); ?>"/>
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
					</div>
				<?php } ?>				
			<!-- Cancel Message to Easifyy Ends-->

			<!--<div class="row">
				<span class="col-md-6 review-heading text-center">Documents</span>
				<p class="col-md-6 review-text text-center">
					<?php
						$data=$PSPreviews->project_files;
						$projectFiles = unserialize($data);
						foreach($projectFiles as $file){
							echo '<a class="px-2 mx-2" href="https://easifyy.com/order_docs/'.$file.'" download>'.explode("_",$file)[1].'</a>';
						}
					?>
				</p>
			</div>-->
				<?php foreach($PSPreviews as $PSPreview){ ?>
					<div class="msg-content">
					<div class="row">
							<h6 class="review-heading font-weight-bold">PSP :&nbsp; &nbsp;</h6>
							<h6 class="review-heading"><?=$PSPreview->merchant['store_name'] ?>&nbsp;&nbsp;<?=$PSPreview->merchant['last_name'] ?></h6>
						</div>
						<div class="row">
							<h6 class="review-heading font-weight-bold">PSP Comment:&nbsp; &nbsp;</h6>
							<h6 class="review-heading"><?=$PSPreview->merchant_review?></h6>
						</div>
						<div class="row">
							<span class="review-heading font-weight-bold">Documents :&nbsp;</span>
							<div class=" row review-text m-0" >
								<?php
									$data=$PSPreview->project_files;
									$projectFiles = explode("|",$data);
									foreach($projectFiles as $file){
										if( $file!=""){
											//echo '<div class="col-5 colums-reves mb-2 mx-3"> <iframe src="https://easifyy.com/order_docs/'.$file.'"></iframe>';
											echo '<a class="px-2 mx-2" href="https://easifyy.com/order_docs/'.$file.'" download> <i class="fa fa-paperclip" aria-hidden="true"></i> '.$file.'</a>';
										}
									}
								?>
							</div>
						</div>
						<div class="row">
							<h6 class="review-heading font-weight-bold">Submitted At : &nbsp;&nbsp;</h6>
							<h6 class="review-heading">&nbsp;<?php echo date('d M Y h:i a', strtotime($PSPreview->created));?></h6>
						</div>
						<div class="space"></div>
						<br>
						<div class="row">
							<div class="s">
							<div class="alert alert-warning" role="alert">
								Order marked as completed by PSP
							</div>
							</div>
						</div>
					</div>

					<?php if($PSPreview->user_review == ""){?>
						<div class="row">
							<?= $this->Form->create('', array('url'=>'/order/review','id' => 'review' ,'class'=>'row col-md-6','method'=>'POST')) ?>
								<input type="hidden" name="user_id" id="user_id" value="<?php echo base64_decode($_GET['user']); ?>">
								<input type="hidden" value="<?= base64_decode($_GET['order']); ?>" name="order_id" id="order_id">
								<input type="hidden" value="<?=$PSPreview->id;?>" name="review_id" id="review_id">
								<input hidden type="text" name="approved" value="1" class="orderStatus approved"/>
								<div class="request-payment-1" style="width: 100%;">
									<div class="input-field row justify-content-center submit-buttons">
											<div>
												<span class="btn btn-view-profile mx-1" id="acceptCompletion">Accept</span>
											</div>
											<div>
												<span class="btn btn-view-profile mx-1" id="declineCompletion" >Reject</span>
											</div>
									</div>
									<div class="review-section hide">
										<!--<?php echo $this->Form->control('review', array('id'=>'review', 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Comment', 'div' => false )); ?>-->
										<label for="review" class="">Comment</label>
										<textarea class="form-control" rows="3" name="user_review" id="user_review" required></textarea>
									</div>
									<input type="hidden" name="rating" id="ratingValue" class="rating-value" value="0">
									<section class='rating-widget hide'>
										<!-- Rating Stars Box -->
										<div class='rating-stars text-center'>
											<ul id='stars'>
												<li class='star' title='Poor' data-value='1'>
													<i class='fa fa-star fa-fw'></i>
												</li>
												<li class='star' title='Fair' data-value='2'>
													<i class='fa fa-star fa-fw'></i>
												</li>
												<li class='star' title='Good' data-value='3'>
													<i class='fa fa-star fa-fw'></i>
												</li>
												<li class='star' title='Excellent' data-value='4'>
													<i class='fa fa-star fa-fw'></i>
												</li>
												<li class='star' title='WOW!!!' data-value='5'>
													<i class='fa fa-star fa-fw'></i>
												</li>
											</ul>
										</div>
										<div class='success-box'>
											<div class='clearfix'></div>
											<img alt='tick image' width='32' src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MjYuNjY3IDQyNi42NjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyNi42NjcgNDI2LjY2NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM2QUMyNTk7IiBkPSJNMjEzLjMzMywwQzk1LjUxOCwwLDAsOTUuNTE0LDAsMjEzLjMzM3M5NS41MTgsMjEzLjMzMywyMTMuMzMzLDIxMy4zMzMgIGMxMTcuODI4LDAsMjEzLjMzMy05NS41MTQsMjEzLjMzMy0yMTMuMzMzUzMzMS4xNTcsMCwyMTMuMzMzLDB6IE0xNzQuMTk5LDMyMi45MThsLTkzLjkzNS05My45MzFsMzEuMzA5LTMxLjMwOWw2Mi42MjYsNjIuNjIyICBsMTQwLjg5NC0xNDAuODk4bDMxLjMwOSwzMS4zMDlMMTc0LjE5OSwzMjIuOTE4eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K'/>
											<div class='text-message'>Thanks, for giving your valuable feedback.</div>
											<div class='clearfix'></div>
										</div>
									</section>
									<div class="input-field row justify-content-center hide submit-div">
										<button class="btn btn-view-profile mx-1" type="submit"> Submit</button>
									</div>
								</div>
							<?= $this->Form->end() ?>
						</div>
					<?php }else{ ?>
						<div class="msg-content ml-auto">
								<div class="row">
									<h6 class="review-heading font-weight-bold">User: &nbsp;</h6>
									<h6 class="review-heading"><?=$PSPreview->user->first_name;?> <?=$PSPreview->user->last_name;?></h6>
								</div>
								<div class="row">
									<h6 class="review-heading font-weight-bold">User Reply: &nbsp;</h6>
									<h6 class="review-heading"><?=$PSPreview->user_review?></h6>
								</div>
								<div class="row">
									<h6 class="review-heading font-weight-bold">Replied At : &nbsp;</h6>
									<h6 class="review-heading"> <?php echo date('d M Y h:i a', strtotime($PSPreview->updated));?></h6>
								</div>								
							<?php 
								if($PSPreview->approved == 1){
										$userRating=$PSPreview->rating;
										?>
									<div class="row">
										<h6 class="review-heading font-weight-bold">Rating</h6>
										<!--<p class="col-md-6 review-text"><?php echo($userRating)?></p>-->
										<div class='rating-stars'>
											<ul id='review-stars'>
												<li class='star <?php if($userRating==1 or $userRating>1){echo "selected";}?>' title='Poor' data-value='1'>
													<i class='fa fa-star fa-fw'></i>
												</li>
												<li class='star <?php if($userRating==2 or $userRating>2){echo "selected";}?>' title='Fair' data-value='2'>
													<i class='fa fa-star fa-fw'></i>
												</li>
												<li class='star <?php if($userRating==3 or $userRating>3){echo "selected";}?>' title='Good' data-value='3'>
													<i class='fa fa-star fa-fw'></i>
												</li>
												<li class='star <?php if($userRating==4 or $userRating>4){echo "selected";}?>' title='Excellent' data-value='4'>
													<i class='fa fa-star fa-fw'></i>
												</li>
												<li class='star <?php if($userRating==5 or $userRating>5){echo "selected";}?>' title='WOW!!!' data-value='5'>
													<i class='fa fa-star fa-fw'></i>
												</li>
											</ul>
										</div>
									</div>
							<?php }?>
						</div>
					<?php }?>
				<?php
					$i++;
					if($i>0){
						echo "<hr>";
					}
				}?>
			<?php } ?>

			<?php if(count($reviews)==0){?>
				<div class="row">
					<?= $this->Form->create('', array('url'=>'/order/review','id' => 'review' ,'class'=>'row col-md-6','method'=>'POST')) ?>
						<input type="hidden" name="merchant_id" value="<?php echo base64_decode($_GET['psp']); ?>">
						<input type="hidden" name="user_id" id="user_id" value="<?php echo base64_decode($_GET['user']); ?>">
						<input type="hidden" value="<?= base64_decode($_GET['order']); ?>" name="order_id" id="order_id">
						<input hidden type="text" name="approved" value="1" class="orderStatus approved"/>
						<div class="request-payment-1" style="width: 100%;">
							<div class="input-field row justify-content-center submit-buttons">
									<div>
										<span class="btn btn-view-profile mx-1" id="acceptCompletion">Accept</span>
									</div>
									<div>
										<span class="btn btn-view-profile mx-1" id="declineCompletion" >Reject</span>
									</div>
							</div>
							<div class="review-section hide">
								<!--<?php echo $this->Form->control('review', array('id'=>'review', 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Comment', 'div' => false )); ?>-->
								<label for="review" class="">Comment</label>
								<textarea class="form-control" rows="3" name="review" id="review" ></textarea>
							</div>
							<input type="hidden" name="rating" id="ratingValue" class="rating-value" value="0">
							<section class='rating-widget hide'>
								<!-- Rating Stars Box -->
								<div class='rating-stars text-center'>
									<ul id='stars'>
										<li class='star' title='Poor' data-value='1'>
											<i class='fa fa-star fa-fw'></i>
										</li>
										<li class='star' title='Fair' data-value='2'>
											<i class='fa fa-star fa-fw'></i>
										</li>
										<li class='star' title='Good' data-value='3'>
											<i class='fa fa-star fa-fw'></i>
										</li>
										<li class='star' title='Excellent' data-value='4'>
											<i class='fa fa-star fa-fw'></i>
										</li>
										<li class='star' title='WOW!!!' data-value='5'>
											<i class='fa fa-star fa-fw'></i>
										</li>
									</ul>
								</div>
								<div class='success-box'>
									<div class='clearfix'></div>
									<img alt='tick image' width='32' src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MjYuNjY3IDQyNi42NjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyNi42NjcgNDI2LjY2NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM2QUMyNTk7IiBkPSJNMjEzLjMzMywwQzk1LjUxOCwwLDAsOTUuNTE0LDAsMjEzLjMzM3M5NS41MTgsMjEzLjMzMywyMTMuMzMzLDIxMy4zMzMgIGMxMTcuODI4LDAsMjEzLjMzMy05NS41MTQsMjEzLjMzMy0yMTMuMzMzUzMzMS4xNTcsMCwyMTMuMzMzLDB6IE0xNzQuMTk5LDMyMi45MThsLTkzLjkzNS05My45MzFsMzEuMzA5LTMxLjMwOWw2Mi42MjYsNjIuNjIyICBsMTQwLjg5NC0xNDAuODk4bDMxLjMwOSwzMS4zMDlMMTc0LjE5OSwzMjIuOTE4eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K'/>
									<div class='text-message'>Thanks, for giving your valuable feedback.</div>
									<div class='clearfix'></div>
								</div>
							</section>
							<div class="input-field row justify-content-center hide submit-div">
								<button class="btn btn-view-profile mx-1" type="submit"> Submit</button>
							</div>
						</div>
					<?= $this->Form->end() ?>
				</div>
			<?php } ?>

		</div>
	</div>
</div>

                        