<style>
input {
	padding: 5px !important;
}
.breadcrumbs-trail li {
	float: left;
	padding-left: 10px;
	font-size: 15px;
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
				    ['title' => 'In Progress Order', 'url' => ['controller' => 'orders', 'action' => 'inProgress']],
				    ['title' => 'Order', 'url' => ['controller' => 'orders', 'action' => 'view', $_GET['order']]]
				]);
				$this->Breadcrumbs->add(
				    'Request Payment',
				);
				echo $this->Breadcrumbs->render(
				    ['class' => 'breadcrumbs-trail'],
				    ['separator' => '<i class="fa fa-angle-right"></i>']
				);
			?>
		</div>
	</div>
</div>			

<div class="card card-tabs">
    <div class="card-content">
        <div class="row pb-1">
            <h5>Request Payment</h5>
        </div>
		<div class="container">
			<div class="row">
				<input type="hidden" value="<?= $merchant_id; ?>">
               	<input type="hidden" value="<?= $_GET['user']; ?>" id="_user_id">
               	<input type="hidden" value="<?= $_GET['order']; ?>" id="_order_id">
               	<input type="hidden" value="<?= $token; ?>" name="_csrfToken" id="_csrfToken">
			   <div class="request-payment-1" style="width: 100%;">
			      <!--<div class="input-field col s3 summery-prefix">
			         <input id="prefix" type="text" class="">
			         <label for="first_name">Payment Reason</label>
			      </div>
			      <div class="input-field col s3 summery-amount">
			         <input id="amount" type="text" class="validate">
			         <label for="website">Amount</label>
			      </div>-->
						<div class="form-group col s3">
							<label for="prefix">Payment Reason:</label>
							<input type="text" class="form-control" id="prefix">
						</div>
						<div class="form-group col s3">
							<label for="amount">Amount:</label>
							<input type="text" class="form-control validate" id="amount">
						</div>
			      <div class="input-field col s2 d-flex mt-2">
			         <div>
			            <a class="btn btn-view-profile btn-request-payment">Send</a>
			         </div>
					 <div class="spinner-wrap" style="display:none;">
						 &nbsp;&nbsp;
					 	<img src="https://easifyy.com/images/loader-orange.gif" height="50" width="50">
					</div>
			      </div>
			      <div class="input-field col s3 d-flex">
			      		<!-- <span><b>Payment Status</b></span>
			            <span class="badge badge-danger">Pending</span> -->
			      </div>
			   </div>
			</div>
		</div>
		<table class="responsive-table bordered">
        <h5>Requested Payments Against Order #<?= base64_decode($_GET['order']); ?> </h5>
        <thead>
            <tr class="row-bg">
                <th scope="col">SNo.</th>
                <th>Payment Reason</th>
                <th>Amount</th>
                <th>Date Applied ON</th>
				<th>Comment</th>
				<th>Approved/Declined On</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
		<?php $i=1; foreach ($order as $orders) { ?>
				<?php
					//echo '<pre>'; print_r($orders); echo '</pre>';
					$data=unserialize($orders->message);
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo strtoupper($data['prefix']); ?></td>
					<td>₹<?php echo $data['amount']; ?></td>
					<td><?php echo date_format($orders->created,"d M Y h:i a"); ?></td>
					<td>
							<?php if($orders->payment_status==""){?>
									-
							<?php }else{?>
									<span><?=$orders->payment_reply?></span>
							<?php }?>
					</td> 
					<td>
							<?php if($orders->payment_status==""){?>
									-
							<?php }else{?>
									<span><?= date_format($orders->modified, "d/m/Y h:i:A"); ?></span>
							<?php }?>
					</td>
					<td>
						<?php if($orders->payment_status==1) { ?>
							<span class="badge badge-success">Approved</span>	
						<?php } elseif($orders->payment_status=="") { ?>
							Pending
						<?php } elseif($orders->payment_status==0) { ?>
							<span class="badge badge-danger">Rejected</span>
						<?php } ?>	
					</td>	
				</tr>
		<?php $i++; } ?>
		</tbody>
	</table>
	</div>

</div>

                        