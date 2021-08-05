<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

// dd($user);
?>
<?php
// echo '<pre>'; print_r($merchant); echo '</pre>';
 //die();
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
.emp-profile {
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}

.profile-img {
    text-align: center;
}

.profile-img img {
    width: 70%;
    height: 100%;
}

.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}

.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}

.profile-head h5 {
    color: #333;
}

.profile-edit-btn {
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}

.proile-rating {
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}

.proile-rating span {
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}

.profile-head .nav-tabs {
    margin-bottom: 5%;
}

.profile-head .nav-tabs .nav-link {
    font-weight: 600;
    border: none;
    color: #495057;
}

.profile-head .nav-tabs .nav-link.active {
    border: none;
    border-bottom: 2px solid #8e43e7;
    color: #8e43e7;
}

/* .profile-work {
        padding: 14%;
        margin-top: -15%;
    } */

.profile-work p {
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}

.profile-work a {
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}

.profile-work ul {
    list-style: none;
}

.profile-tab label {
    font-weight: 600;
}

.profile-tab p {
    font-weight: 600;
}

.psp-tabs {}
</style>
<div class="container emp-profile">
    <br>
    <h3 class="text-center">User's Detail</h3><br>
    <form method="post">
        <div class="row">
            <div class="col-md-3">
                <div class="profile-img">
                    <?php $vName= substr( $user->first_name,0,1) ."".substr( $user->last_name,0,1)?>
                    <img src="https://dummyimage.com/200x200/000/fff&text=<?=$vName?>" alt="" />
                    <!--<div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file" />
                    </div>-->
                </div>
                <div class="text-center">
                    <a style="width:70%;" href="<?php BASE_URL; ?>/superadmin/users/edit/<?= $user->id; ?>"
                        class="btn" name="btnAddMore" /> Edit Profile</a>
                </div>
                <div class="row">
                    <div class="profile-work col-md-9 mx-auto pt-md-4">
                        <div>
                            <!--<h5>SKILLS</h5>
                            <a href=""><?=$merchant->service_profession;?></a><br>
                            <a href="">Web Developer</a><br>
                    <a href="">WordPress</a><br>
                    <a href="">WooCommerce</a><br>
                    <a href="">PHP, .Net</a><br>-->

                            <!--<h5 class="pt-md-3">WORK LINK</h5>
                    <a href="">Website</a><br>
                    <a href="">Facebook</a><br>
                    <a href="">Twitter</a><br>
                    <a href="">Phone</a><br>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-head row m-0">
                    <div class="col-md-8">
                        <h5>
                            <?=  h($user->first_name) . ' ' . h($user->last_name)  ; ?>
                        </h5>
                    </div>
                    <div class="col-md-4">
                        <?php if ($user->status == 1) : ?>
                        <p class="proile-rating">STATUS : <span class="badge badge-success"
                                style="float: inherit;color: #fff;">Active</span></p>
                        <?php else : ?>
                        <p class="proile-rating">STATUS : <span class="badge badge-danger"
                                style="float: inherit;color: #fff;">In Active</span></p>
                        <?php endif; ?>
                    </div>


                    <ul class="nav nav-tabs col-md-12" id="myTab" role="tablist">
                        <li class="nav-item psp-tabs">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item psp-tabs">
                            <a class="nav-link" id="kyc-tab" data-toggle="tab" href="#kyc" role="tab"
                                aria-controls="kyc" aria-selected="false">Addresses</a>
                        </li>
                        <li class="nav-item psp-tabs">
                            <a class="nav-link" id="service-tab" data-toggle="tab" href="#service" role="tab"
                                aria-controls="service" aria-selected="false">Orders</a>
                        </li>
                        <!--<li class="nav-item psp-tabs">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Order Details</a>
                        </li>-->
                    </ul>
                    <?php //dd($merchant->merchant_kycs[0]->govt_Id);?>
                    <div class="col-md-12">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= h($user->first_name); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>last Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= h($user->last_name); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>User Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= h($user->username); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $user->phone; ?></p>
                                    </div>
                                </div>
                                <!--<div class="row">
                                    <div class="col-md-6">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->service_profession; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Account Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->bank_accounts[0]['account_number']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Account Holder Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->bank_accounts[0]['account_holder']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Account Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->bank_accounts[0]['account_type']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Bank Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->bank_accounts[0]['bank_name']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Bank Branch</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->bank_accounts[0]['bank_branch']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>IFSC Code</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->bank_accounts[0]['ifsc_code']; ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>MICR Code</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->bank_accounts[0]['micr_code']; ?></p>
                                    </div>
                                </div>-->
                            </div>
                            <div class="tab-pane fade" id="kyc" role="tabpanel" aria-labelledby="kyc-tab">
                                <div class="row">
                                    <table class="responsive-table bordered data-table" id="kyc-tbl-PSP">
                                    <?php foreach ($user->addresses as $addresses): ?>
                                        <tr>
                                            <th scope="row"><?= __('Name') ?></th>
                                            <td><?= h($addresses->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __(' Address line 1') ?></th>
                                            <td><?= h($addresses->address_line_1) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __('Address line 2') ?></th>
                                            <td><?= h($addresses->address_line_2) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __('City') ?></th>
                                            <td><?= h($addresses->city->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __('State') ?></th>
                                            <td><?= h($addresses->state->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __('PIN Code') ?></th>
                                            <td><?= h($addresses->zip_code) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __('Pan Number') ?></th>
                                            <td><?= h($addresses->pan_number) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __('Gst Number') ?></th>
                                            <td><?= h($addresses->gst_number) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="service" role="tabpanel" aria-labelledby="service-tab">
                                <div class="row">
                                    <table class="responsive-table bordered data-table" id="products-tbl-PSP">
                                        <tr class="row-bg">
                                            <th scope="col">Order ID</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Merchant Name</th>
                                            <th scope="col">Service name</th>
                                            <th scope="col">Service Price</th>
                                            <th scope="col">Service Delivery Time</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col" width="14%" class="actions"><?= __('View') ?></th>
                                        </tr>
                                        <?php foreach ($user->orders as $orders): ?>
                                            <tr>
                                                <td><?= h($orders->id) ?></td>
                                                <td><?= h($user->first_name) . ' ' . h($user->last_name);?></td>
                                                <td><?php echo $this->Site->get_merchant_name($orders->merchant_id) ;?></td>
                                                <td><?= h($orders->product->title) ;?></td>
                                                <td><?= h($orders->gross_total)?></td>
                                                <td><?= h($orders->delivery_time)?></td>
                                                <td><?= h($orders->created)?></td>
                                                <td><a title="View" href="/superadmin/orders/view/<?= h($orders->id)?>" class="btn">
                                                        <i class="material-icons">remove_red_eye</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $i++; endforeach; ?>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <?php //echo "<pre>";print_r($merchant->orders);echo "</pre>"; ?>
                                <?php $inProgress=0;$completed=0; ?>
                                <?php foreach ($merchant->orders as $order) : ?>
                                <?php // echo "<hr>"; print_r($order);
                                            if($order->order_status_id==2){
                                                $inProgress=$inProgress+1;
                                            }elseif($order->order_status_id==3){
                                                $completed=$completed+1;
                                            }
                                        ?>

                                <?php endforeach; ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Order</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo count($merchant->orders); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Success</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?=$completed?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>In Progress</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?=$inProgress?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>On Hold</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>0</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!--<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Profile Image') ?></th>
            <td><?= h($user->user_profile_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reset Password Token') ?></th>
            <td><?= h($user->reset_password_token) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Verification Token') ?></th>
            <td><?= h($user->email_verification_token) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Device Token') ?></th>
            <td><?= h($user->device_token) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fcm Token') ?></th>
            <td><?= h($user->fcm_token) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Verify Status') ?></th>
            <td><?= $this->Number->format($user->email_verify_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($user->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Token Created At') ?></th>
            <td><?= h($user->token_created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Token Created At') ?></th>
            <td><?= h($user->email_token_created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Addresses') ?></h4>
        <?php if (!empty($user->addresses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Address Line 1') ?></th>
                <th scope="col"><?= __('Address Line 2') ?></th>
                <th scope="col"><?= __('Latitude') ?></th>
                <th scope="col"><?= __('Longitude') ?></th>
                <th scope="col"><?= __('Zip Code') ?></th>
                <th scope="col"><?= __('Phone 1') ?></th>
                <th scope="col"><?= __('Default Address') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->addresses as $addresses): ?>
            <tr>
                <td><?= h($addresses->id) ?></td>
                <td><?= h($addresses->user_id) ?></td>
                <td><?= h($addresses->city_id) ?></td>
                <td><?= h($addresses->state_id) ?></td>
                <td><?= h($addresses->name) ?></td>
                <td><?= h($addresses->address_line_1) ?></td>
                <td><?= h($addresses->address_line_2) ?></td>
                <td><?= h($addresses->latitude) ?></td>
                <td><?= h($addresses->longitude) ?></td>
                <td><?= h($addresses->zip_code) ?></td>
                <td><?= h($addresses->phone_1) ?></td>
                <td><?= h($addresses->default_address) ?></td>
                <td><?= h($addresses->created) ?></td>
                <td><?= h($addresses->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addresses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Cart Items') ?></h4>
        <?php if (!empty($user->cart_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('SessionID') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Tax Details') ?></th>
                <th scope="col"><?= __('Subtotal') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->cart_items as $cartItems): ?>
            <tr>
                <td><?= h($cartItems->id) ?></td>
                <td><?= h($cartItems->merchant_id) ?></td>
                <td><?= h($cartItems->user_id) ?></td>
                <td><?= h($cartItems->product_id) ?></td>
                <td><?= h($cartItems->sessionID) ?></td>
                <td><?= h($cartItems->title) ?></td>
                <td><?= h($cartItems->price) ?></td>
                <td><?= h($cartItems->quantity) ?></td>
                <td><?= h($cartItems->tax_details) ?></td>
                <td><?= h($cartItems->subtotal) ?></td>
                <td><?= h($cartItems->created) ?></td>
                <td><?= h($cartItems->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CartItems', 'action' => 'view', $cartItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CartItems', 'action' => 'edit', $cartItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CartItems', 'action' => 'delete', $cartItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Coupon Redeems') ?></h4>
        <?php if (!empty($user->coupon_redeems)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Coupon Code') ?></th>
                <th scope="col"><?= __('Usage Count') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->coupon_redeems as $couponRedeems): ?>
            <tr>
                <td><?= h($couponRedeems->id) ?></td>
                <td><?= h($couponRedeems->user_id) ?></td>
                <td><?= h($couponRedeems->coupon_code) ?></td>
                <td><?= h($couponRedeems->usage_count) ?></td>
                <td><?= h($couponRedeems->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CouponRedeems', 'action' => 'view', $couponRedeems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CouponRedeems', 'action' => 'edit', $couponRedeems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CouponRedeems', 'action' => 'delete', $couponRedeems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $couponRedeems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Merchants') ?></h4>
        <?php if (!empty($user->merchants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Store Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('Gst Number') ?></th>
                <th scope="col"><?= __('Pan Number') ?></th>
                <th scope="col"><?= __('License Number') ?></th>
                <th scope="col"><?= __('Address Line 1') ?></th>
                <th scope="col"><?= __('Address Line 2') ?></th>
                <th scope="col"><?= __('Locality') ?></th>
                <th scope="col"><?= __('Zip Code') ?></th>
                <th scope="col"><?= __('Latitude') ?></th>
                <th scope="col"><?= __('Longitude') ?></th>
                <th scope="col"><?= __('Store Pic') ?></th>
                <th scope="col"><?= __('Phone 1') ?></th>
                <th scope="col"><?= __('Phone 2') ?></th>
                <th scope="col"><?= __('Phone 3') ?></th>
                <th scope="col"><?= __('Fax') ?></th>
                <th scope="col"><?= __('Open Time') ?></th>
                <th scope="col"><?= __('Close Time') ?></th>
                <th scope="col"><?= __('Minimum Order') ?></th>
                <th scope="col"><?= __('Delivery Charges') ?></th>
                <th scope="col"><?= __('Deliver Time') ?></th>
                <th scope="col"><?= __('Deliver Radius') ?></th>
                <th scope="col"><?= __('Payment Method') ?></th>
                <th scope="col"><?= __('Commission') ?></th>
                <th scope="col"><?= __('Delivery Type') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->merchants as $merchants): ?>
            <tr>
                <td><?= h($merchants->id) ?></td>
                <td><?= h($merchants->user_id) ?></td>
                <td><?= h($merchants->store_name) ?></td>
                <td><?= h($merchants->slug) ?></td>
                <td><?= h($merchants->state_id) ?></td>
                <td><?= h($merchants->city_id) ?></td>
                <td><?= h($merchants->gst_number) ?></td>
                <td><?= h($merchants->pan_number) ?></td>
                <td><?= h($merchants->license_number) ?></td>
                <td><?= h($merchants->address_line_1) ?></td>
                <td><?= h($merchants->address_line_2) ?></td>
                <td><?= h($merchants->locality) ?></td>
                <td><?= h($merchants->zip_code) ?></td>
                <td><?= h($merchants->latitude) ?></td>
                <td><?= h($merchants->longitude) ?></td>
                <td><?= h($merchants->store_pic) ?></td>
                <td><?= h($merchants->phone_1) ?></td>
                <td><?= h($merchants->phone_2) ?></td>
                <td><?= h($merchants->phone_3) ?></td>
                <td><?= h($merchants->fax) ?></td>
                <td><?= h($merchants->open_time) ?></td>
                <td><?= h($merchants->close_time) ?></td>
                <td><?= h($merchants->minimum_order) ?></td>
                <td><?= h($merchants->delivery_charges) ?></td>
                <td><?= h($merchants->deliver_time) ?></td>
                <td><?= h($merchants->deliver_radius) ?></td>
                <td><?= h($merchants->payment_method) ?></td>
                <td><?= h($merchants->commission) ?></td>
                <td><?= h($merchants->delivery_type) ?></td>
                <td><?= h($merchants->status) ?></td>
                <td><?= h($merchants->created) ?></td>
                <td><?= h($merchants->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Merchants', 'action' => 'view', $merchants->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Merchants', 'action' => 'edit', $merchants->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Merchants', 'action' => 'delete', $merchants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchants->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Order Notifications') ?></h4>
        <?php if (!empty($user->order_notifications)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('User Type') ?></th>
                <th scope="col"><?= __('Link') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->order_notifications as $orderNotifications): ?>
            <tr>
                <td><?= h($orderNotifications->id) ?></td>
                <td><?= h($orderNotifications->user_id) ?></td>
                <td><?= h($orderNotifications->order_id) ?></td>
                <td><?= h($orderNotifications->type) ?></td>
                <td><?= h($orderNotifications->message) ?></td>
                <td><?= h($orderNotifications->user_type) ?></td>
                <td><?= h($orderNotifications->link) ?></td>
                <td><?= h($orderNotifications->status) ?></td>
                <td><?= h($orderNotifications->created) ?></td>
                <td><?= h($orderNotifications->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrderNotifications', 'action' => 'view', $orderNotifications->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrderNotifications', 'action' => 'edit', $orderNotifications->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderNotifications', 'action' => 'delete', $orderNotifications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderNotifications->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Order Payments') ?></h4>
        <?php if (!empty($user->order_payments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
                <th scope="col"><?= __('TransactionId') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Transaction Date') ?></th>
                <th scope="col"><?= __('Transaction Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->order_payments as $orderPayments): ?>
            <tr>
                <td><?= h($orderPayments->id) ?></td>
                <td><?= h($orderPayments->order_id) ?></td>
                <td><?= h($orderPayments->user_id) ?></td>
                <td><?= h($orderPayments->merchant_id) ?></td>
                <td><?= h($orderPayments->transactionId) ?></td>
                <td><?= h($orderPayments->amount) ?></td>
                <td><?= h($orderPayments->transaction_date) ?></td>
                <td><?= h($orderPayments->transaction_status) ?></td>
                <td><?= h($orderPayments->created) ?></td>
                <td><?= h($orderPayments->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrderPayments', 'action' => 'view', $orderPayments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrderPayments', 'action' => 'edit', $orderPayments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderPayments', 'action' => 'delete', $orderPayments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderPayments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Orders') ?></h4>
        <?php if (!empty($user->orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Address Id') ?></th>
                <th scope="col"><?= __('Coupon Id') ?></th>
                <th scope="col"><?= __('Runner Id') ?></th>
                <th scope="col"><?= __('Order Mode Id') ?></th>
                <th scope="col"><?= __('Order Status Id') ?></th>
                <th scope="col"><?= __('Igst') ?></th>
                <th scope="col"><?= __('Cgst') ?></th>
                <th scope="col"><?= __('Sgst') ?></th>
                <th scope="col"><?= __('Shipping') ?></th>
                <th scope="col"><?= __('Delivery Time') ?></th>
                <th scope="col"><?= __('Gross Total') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col"><?= __('Order Notes') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->orders as $orders): ?>
            <tr>
                <td><?= h($orders->id) ?></td>
                <td><?= h($orders->merchant_id) ?></td>
                <td><?= h($orders->user_id) ?></td>
                <td><?= h($orders->address_id) ?></td>
                <td><?= h($orders->coupon_id) ?></td>
                <td><?= h($orders->runner_id) ?></td>
                <td><?= h($orders->order_mode_id) ?></td>
                <td><?= h($orders->order_status_id) ?></td>
                <td><?= h($orders->igst) ?></td>
                <td><?= h($orders->cgst) ?></td>
                <td><?= h($orders->sgst) ?></td>
                <td><?= h($orders->shipping) ?></td>
                <td><?= h($orders->delivery_time) ?></td>
                <td><?= h($orders->gross_total) ?></td>
                <td><?= h($orders->total) ?></td>
                <td><?= h($orders->order_notes) ?></td>
                <td><?= h($orders->created) ?></td>
                <td><?= h($orders->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reviews') ?></h4>
        <?php if (!empty($user->reviews)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Rating') ?></th>
                <th scope="col"><?= __('Review') ?></th>
                <th scope="col"><?= __('Reviewer Name') ?></th>
                <th scope="col"><?= __('Reviewer Email') ?></th>
                <th scope="col"><?= __('Approved') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->reviews as $reviews): ?>
            <tr>
                <td><?= h($reviews->id) ?></td>
                <td><?= h($reviews->merchant_id) ?></td>
                <td><?= h($reviews->user_id) ?></td>
                <td><?= h($reviews->rating) ?></td>
                <td><?= h($reviews->review) ?></td>
                <td><?= h($reviews->reviewer_name) ?></td>
                <td><?= h($reviews->reviewer_email) ?></td>
                <td><?= h($reviews->approved) ?></td>
                <td><?= h($reviews->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reviews', 'action' => 'view', $reviews->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reviews', 'action' => 'edit', $reviews->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reviews', 'action' => 'delete', $reviews->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reviews->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reward Points') ?></h4>
        <?php if (!empty($user->reward_points)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Coins') ?></th>
                <th scope="col"><?= __('Date Last Change') ?></th>
                <th scope="col"><?= __('Date Added') ?></th>
                <th scope="col"><?= __('Date Expire') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->reward_points as $rewardPoints): ?>
            <tr>
                <td><?= h($rewardPoints->id) ?></td>
                <td><?= h($rewardPoints->user_id) ?></td>
                <td><?= h($rewardPoints->coins) ?></td>
                <td><?= h($rewardPoints->date_last_change) ?></td>
                <td><?= h($rewardPoints->date_added) ?></td>
                <td><?= h($rewardPoints->date_expire) ?></td>
                <td><?= h($rewardPoints->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RewardPoints', 'action' => 'view', $rewardPoints->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RewardPoints', 'action' => 'edit', $rewardPoints->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RewardPoints', 'action' => 'delete', $rewardPoints->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rewardPoints->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Runners') ?></h4>
        <?php if (!empty($user->runners)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Dob') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Phone No') ?></th>
                <th scope="col"><?= __('Vehicle No') ?></th>
                <th scope="col"><?= __('Current Locatioin') ?></th>
                <th scope="col"><?= __('Loc Lat') ?></th>
                <th scope="col"><?= __('Loc Long') ?></th>
                <th scope="col"><?= __('Profile Pic') ?></th>
                <th scope="col"><?= __('Last Login') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->runners as $runners): ?>
            <tr>
                <td><?= h($runners->id) ?></td>
                <td><?= h($runners->user_id) ?></td>
                <td><?= h($runners->gender) ?></td>
                <td><?= h($runners->dob) ?></td>
                <td><?= h($runners->address) ?></td>
                <td><?= h($runners->phone_no) ?></td>
                <td><?= h($runners->vehicle_no) ?></td>
                <td><?= h($runners->current_locatioin) ?></td>
                <td><?= h($runners->loc_lat) ?></td>
                <td><?= h($runners->loc_long) ?></td>
                <td><?= h($runners->profile_pic) ?></td>
                <td><?= h($runners->last_login) ?></td>
                <td><?= h($runners->status) ?></td>
                <td><?= h($runners->created) ?></td>
                <td><?= h($runners->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Runners', 'action' => 'view', $runners->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Runners', 'action' => 'edit', $runners->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Runners', 'action' => 'delete', $runners->id], ['confirm' => __('Are you sure you want to delete # {0}?', $runners->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Suppliers') ?></h4>
        <?php if (!empty($user->suppliers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __(' Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Gst No') ?></th>
                <th scope="col"><?= __('License Number') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Pan') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->suppliers as $suppliers): ?>
            <tr>
                <td><?= h($suppliers->id) ?></td>
                <td><?= h($suppliers->user_id) ?></td>
                <td><?= h($suppliers->state_id) ?></td>
                <td><?= h($suppliers->city_id) ?></td>
                <td><?= h($suppliers->_name) ?></td>
                <td><?= h($suppliers->email) ?></td>
                <td><?= h($suppliers->gst_no) ?></td>
                <td><?= h($suppliers->license_number) ?></td>
                <td><?= h($suppliers->address) ?></td>
                <td><?= h($suppliers->pan) ?></td>
                <td><?= h($suppliers->status) ?></td>
                <td><?= h($suppliers->created) ?></td>
                <td><?= h($suppliers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Suppliers', 'action' => 'view', $suppliers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Suppliers', 'action' => 'edit', $suppliers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Suppliers', 'action' => 'delete', $suppliers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suppliers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Supports') ?></h4>
        <?php if (!empty($user->supports)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Ticket Type') ?></th>
                <th scope="col"><?= __('Subject') ?></th>
                <th scope="col"><?= __('Reason') ?></th>
                <th scope="col"><?= __('Comments') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->supports as $supports): ?>
            <tr>
                <td><?= h($supports->id) ?></td>
                <td><?= h($supports->user_id) ?></td>
                <td><?= h($supports->order_id) ?></td>
                <td><?= h($supports->ticket_type) ?></td>
                <td><?= h($supports->subject) ?></td>
                <td><?= h($supports->reason) ?></td>
                <td><?= h($supports->comments) ?></td>
                <td><?= h($supports->status) ?></td>
                <td><?= h($supports->created) ?></td>
                <td><?= h($supports->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Supports', 'action' => 'view', $supports->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Supports', 'action' => 'edit', $supports->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Supports', 'action' => 'delete', $supports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supports->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Logs') ?></h4>
        <?php if (!empty($user->user_logs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Ip') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_logs as $userLogs): ?>
            <tr>
                <td><?= h($userLogs->id) ?></td>
                <td><?= h($userLogs->user_id) ?></td>
                <td><?= h($userLogs->ip) ?></td>
                <td><?= h($userLogs->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserLogs', 'action' => 'view', $userLogs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserLogs', 'action' => 'edit', $userLogs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserLogs', 'action' => 'delete', $userLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userLogs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Social Profiles') ?></h4>
        <?php if (!empty($user->user_social_profiles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Social Network Name') ?></th>
                <th scope="col"><?= __('Social NetworkID') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Display Name') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Link') ?></th>
                <th scope="col"><?= __('Picture') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_social_profiles as $userSocialProfiles): ?>
            <tr>
                <td><?= h($userSocialProfiles->id) ?></td>
                <td><?= h($userSocialProfiles->user_id) ?></td>
                <td><?= h($userSocialProfiles->social_network_name) ?></td>
                <td><?= h($userSocialProfiles->social_networkID) ?></td>
                <td><?= h($userSocialProfiles->email) ?></td>
                <td><?= h($userSocialProfiles->display_name) ?></td>
                <td><?= h($userSocialProfiles->first_name) ?></td>
                <td><?= h($userSocialProfiles->last_name) ?></td>
                <td><?= h($userSocialProfiles->link) ?></td>
                <td><?= h($userSocialProfiles->picture) ?></td>
                <td><?= h($userSocialProfiles->status) ?></td>
                <td><?= h($userSocialProfiles->created) ?></td>
                <td><?= h($userSocialProfiles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserSocialProfiles', 'action' => 'view', $userSocialProfiles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserSocialProfiles', 'action' => 'edit', $userSocialProfiles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserSocialProfiles', 'action' => 'delete', $userSocialProfiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSocialProfiles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>-->
