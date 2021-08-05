<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cart Items'), ['controller' => 'CartItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart Item'), ['controller' => 'CartItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Coupon Redeems'), ['controller' => 'CouponRedeems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Coupon Redeem'), ['controller' => 'CouponRedeems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Order Notifications'), ['controller' => 'OrderNotifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Notification'), ['controller' => 'OrderNotifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Order Payments'), ['controller' => 'OrderPayments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Payment'), ['controller' => 'OrderPayments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reward Points'), ['controller' => 'RewardPoints', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reward Point'), ['controller' => 'RewardPoints', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Runners'), ['controller' => 'Runners', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Runner'), ['controller' => 'Runners', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Supports'), ['controller' => 'Supports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Support'), ['controller' => 'Supports', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Logs'), ['controller' => 'UserLogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Log'), ['controller' => 'UserLogs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Social Profiles'), ['controller' => 'UserSocialProfiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Social Profile'), ['controller' => 'UserSocialProfiles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
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
                <th scope="col"><?= __('Coupon Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Coupon Code') ?></th>
                <th scope="col"><?= __('Usage Count') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->coupon_redeems as $couponRedeems): ?>
            <tr>
                <td><?= h($couponRedeems->id) ?></td>
                <td><?= h($couponRedeems->user_id) ?></td>
                <td><?= h($couponRedeems->coupon_id) ?></td>
                <td><?= h($couponRedeems->order_id) ?></td>
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
                <th scope="col"><?= __('Delivery Slot') ?></th>
                <th scope="col"><?= __('Delivery Type') ?></th>
                <th scope="col"><?= __('Commission') ?></th>
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
                <td><?= h($merchants->delivery_slot) ?></td>
                <td><?= h($merchants->delivery_type) ?></td>
                <td><?= h($merchants->commission) ?></td>
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
</div>
