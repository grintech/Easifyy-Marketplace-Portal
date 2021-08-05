<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merchant $merchant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Merchant'), ['action' => 'edit', $merchant->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Merchant'), ['action' => 'delete', $merchant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchant->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Merchants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bank Accounts'), ['controller' => 'BankAccounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank Account'), ['controller' => 'BankAccounts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cart Items'), ['controller' => 'CartItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart Item'), ['controller' => 'CartItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Coupons'), ['controller' => 'Coupons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Coupon'), ['controller' => 'Coupons', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Payouts'), ['controller' => 'MerchantPayouts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Payout'), ['controller' => 'MerchantPayouts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Transactions'), ['controller' => 'MerchantTransactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Transaction'), ['controller' => 'MerchantTransactions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Order Payments'), ['controller' => 'OrderPayments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Payment'), ['controller' => 'OrderPayments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="merchants view large-9 medium-8 columns content">
    <h3><?= h($merchant->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $merchant->has('user') ? $this->Html->link($merchant->user->id, ['controller' => 'Users', 'action' => 'view', $merchant->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Store Name') ?></th>
            <td><?= h($merchant->store_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($merchant->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $merchant->has('state') ? $this->Html->link($merchant->state->name, ['controller' => 'States', 'action' => 'view', $merchant->state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $merchant->has('city') ? $this->Html->link($merchant->city->name, ['controller' => 'Cities', 'action' => 'view', $merchant->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gst Number') ?></th>
            <td><?= h($merchant->gst_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pan Number') ?></th>
            <td><?= h($merchant->pan_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('License Number') ?></th>
            <td><?= h($merchant->license_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address Line 1') ?></th>
            <td><?= h($merchant->address_line_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address Line 2') ?></th>
            <td><?= h($merchant->address_line_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Locality') ?></th>
            <td><?= h($merchant->locality) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zip Code') ?></th>
            <td><?= h($merchant->zip_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= h($merchant->latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= h($merchant->longitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Store Pic') ?></th>
            <td><?= h($merchant->store_pic) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone 1') ?></th>
            <td><?= h($merchant->phone_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone 2') ?></th>
            <td><?= h($merchant->phone_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone 3') ?></th>
            <td><?= h($merchant->phone_3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fax') ?></th>
            <td><?= h($merchant->fax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Open Time') ?></th>
            <td><?= h($merchant->open_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Close Time') ?></th>
            <td><?= h($merchant->close_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deliver Time') ?></th>
            <td><?= h($merchant->deliver_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Method') ?></th>
            <td><?= h($merchant->payment_method) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delivery Type') ?></th>
            <td><?= h($merchant->delivery_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($merchant->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Minimum Order') ?></th>
            <td><?= $this->Number->format($merchant->minimum_order) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delivery Charges') ?></th>
            <td><?= $this->Number->format($merchant->delivery_charges) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deliver Radius') ?></th>
            <td><?= $this->Number->format($merchant->deliver_radius) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Commission') ?></th>
            <td><?= $this->Number->format($merchant->commission) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($merchant->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($merchant->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $merchant->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bank Accounts') ?></h4>
        <?php if (!empty($merchant->bank_accounts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
                <th scope="col"><?= __('Account Number') ?></th>
                <th scope="col"><?= __('Account Type') ?></th>
                <th scope="col"><?= __('Bank Name') ?></th>
                <th scope="col"><?= __('Bank Branch') ?></th>
                <th scope="col"><?= __('Ifsc Code') ?></th>
                <th scope="col"><?= __('Micr Code') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($merchant->bank_accounts as $bankAccounts): ?>
            <tr>
                <td><?= h($bankAccounts->id) ?></td>
                <td><?= h($bankAccounts->merchant_id) ?></td>
                <td><?= h($bankAccounts->account_number) ?></td>
                <td><?= h($bankAccounts->account_type) ?></td>
                <td><?= h($bankAccounts->bank_name) ?></td>
                <td><?= h($bankAccounts->bank_branch) ?></td>
                <td><?= h($bankAccounts->ifsc_code) ?></td>
                <td><?= h($bankAccounts->micr_code) ?></td>
                <td><?= h($bankAccounts->created) ?></td>
                <td><?= h($bankAccounts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BankAccounts', 'action' => 'view', $bankAccounts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BankAccounts', 'action' => 'edit', $bankAccounts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BankAccounts', 'action' => 'delete', $bankAccounts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankAccounts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Cart Items') ?></h4>
        <?php if (!empty($merchant->cart_items)): ?>
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
            <?php foreach ($merchant->cart_items as $cartItems): ?>
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
        <h4><?= __('Related Coupons') ?></h4>
        <?php if (!empty($merchant->coupons)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
                <th scope="col"><?= __('Coupon Code') ?></th>
                <th scope="col"><?= __('Discount') ?></th>
                <th scope="col"><?= __('Discount Type') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Expire') ?></th>
                <th scope="col"><?= __('User Usage Limit') ?></th>
                <th scope="col"><?= __('Usage Limit') ?></th>
                <th scope="col"><?= __('Minimum Spend') ?></th>
                <th scope="col"><?= __('Maximum Spend') ?></th>
                <th scope="col"><?= __('Max Amount') ?></th>
                <th scope="col"><?= __('Usage Count') ?></th>
                <th scope="col"><?= __('Coupon Applicable') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($merchant->coupons as $coupons): ?>
            <tr>
                <td><?= h($coupons->id) ?></td>
                <td><?= h($coupons->merchant_id) ?></td>
                <td><?= h($coupons->coupon_code) ?></td>
                <td><?= h($coupons->discount) ?></td>
                <td><?= h($coupons->discount_type) ?></td>
                <td><?= h($coupons->description) ?></td>
                <td><?= h($coupons->expire) ?></td>
                <td><?= h($coupons->user_usage_limit) ?></td>
                <td><?= h($coupons->usage_limit) ?></td>
                <td><?= h($coupons->minimum_spend) ?></td>
                <td><?= h($coupons->maximum_spend) ?></td>
                <td><?= h($coupons->max_amount) ?></td>
                <td><?= h($coupons->usage_count) ?></td>
                <td><?= h($coupons->coupon_applicable) ?></td>
                <td><?= h($coupons->status) ?></td>
                <td><?= h($coupons->created) ?></td>
                <td><?= h($coupons->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Coupons', 'action' => 'view', $coupons->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Coupons', 'action' => 'edit', $coupons->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Coupons', 'action' => 'delete', $coupons->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coupons->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Merchant Payouts') ?></h4>
        <?php if (!empty($merchant->merchant_payouts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Transaction Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Is Admin Copoun') ?></th>
                <th scope="col"><?= __('Coupon Discount') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($merchant->merchant_payouts as $merchantPayouts): ?>
            <tr>
                <td><?= h($merchantPayouts->id) ?></td>
                <td><?= h($merchantPayouts->merchant_transaction_id) ?></td>
                <td><?= h($merchantPayouts->merchant_id) ?></td>
                <td><?= h($merchantPayouts->order_id) ?></td>
                <td><?= h($merchantPayouts->is_admin_copoun) ?></td>
                <td><?= h($merchantPayouts->coupon_discount) ?></td>
                <td><?= h($merchantPayouts->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MerchantPayouts', 'action' => 'view', $merchantPayouts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MerchantPayouts', 'action' => 'edit', $merchantPayouts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MerchantPayouts', 'action' => 'delete', $merchantPayouts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantPayouts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Merchant Products') ?></h4>
        <?php if (!empty($merchant->merchant_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Product Type Id') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __(' Price') ?></th>
                <th scope="col"><?= __(' Sale Price') ?></th>
                <th scope="col"><?= __(' Weight') ?></th>
                <th scope="col"><?= __(' Unit') ?></th>
                <th scope="col"><?= __(' Stock') ?></th>
                <th scope="col"><?= __(' Bar Code') ?></th>
                <th scope="col"><?= __(' Item Code') ?></th>
                <th scope="col"><?= __(' Sku') ?></th>
                <th scope="col"><?= __(' Cgst') ?></th>
                <th scope="col"><?= __(' Igst') ?></th>
                <th scope="col"><?= __(' Sgst') ?></th>
                <th scope="col"><?= __(' Tax Inclusive') ?></th>
                <th scope="col"><?= __(' Is Taxable') ?></th>
                <th scope="col"><?= __('Published On') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($merchant->merchant_products as $merchantProducts): ?>
            <tr>
                <td><?= h($merchantProducts->id) ?></td>
                <td><?= h($merchantProducts->merchant_id) ?></td>
                <td><?= h($merchantProducts->product_id) ?></td>
                <td><?= h($merchantProducts->product_type_id) ?></td>
                <td><?= h($merchantProducts->parent_id) ?></td>
                <td><?= h($merchantProducts->title) ?></td>
                <td><?= h($merchantProducts->slug) ?></td>
                <td><?= h($merchantProducts->description) ?></td>
                <td><?= h($merchantProducts->_price) ?></td>
                <td><?= h($merchantProducts->_sale_price) ?></td>
                <td><?= h($merchantProducts->_weight) ?></td>
                <td><?= h($merchantProducts->_unit) ?></td>
                <td><?= h($merchantProducts->_stock) ?></td>
                <td><?= h($merchantProducts->_bar_code) ?></td>
                <td><?= h($merchantProducts->_item_code) ?></td>
                <td><?= h($merchantProducts->_sku) ?></td>
                <td><?= h($merchantProducts->_cgst) ?></td>
                <td><?= h($merchantProducts->_igst) ?></td>
                <td><?= h($merchantProducts->_sgst) ?></td>
                <td><?= h($merchantProducts->_tax_inclusive) ?></td>
                <td><?= h($merchantProducts->_is_taxable) ?></td>
                <td><?= h($merchantProducts->published_on) ?></td>
                <td><?= h($merchantProducts->status) ?></td>
                <td><?= h($merchantProducts->created) ?></td>
                <td><?= h($merchantProducts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MerchantProducts', 'action' => 'view', $merchantProducts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MerchantProducts', 'action' => 'edit', $merchantProducts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MerchantProducts', 'action' => 'delete', $merchantProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProducts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Merchant Transactions') ?></h4>
        <?php if (!empty($merchant->merchant_transactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
                <th scope="col"><?= __('Bank Account Id') ?></th>
                <th scope="col"><?= __('Total Orders Amount') ?></th>
                <th scope="col"><?= __('Admin Coupon Discount') ?></th>
                <th scope="col"><?= __('Merchant Coupon Discount') ?></th>
                <th scope="col"><?= __('Commission') ?></th>
                <th scope="col"><?= __('Amount Payable') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Transaction Status Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($merchant->merchant_transactions as $merchantTransactions): ?>
            <tr>
                <td><?= h($merchantTransactions->id) ?></td>
                <td><?= h($merchantTransactions->merchant_id) ?></td>
                <td><?= h($merchantTransactions->bank_account_id) ?></td>
                <td><?= h($merchantTransactions->total_orders_amount) ?></td>
                <td><?= h($merchantTransactions->admin_coupon_discount) ?></td>
                <td><?= h($merchantTransactions->merchant_coupon_discount) ?></td>
                <td><?= h($merchantTransactions->commission) ?></td>
                <td><?= h($merchantTransactions->amount_payable) ?></td>
                <td><?= h($merchantTransactions->notes) ?></td>
                <td><?= h($merchantTransactions->transaction_status_id) ?></td>
                <td><?= h($merchantTransactions->created) ?></td>
                <td><?= h($merchantTransactions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MerchantTransactions', 'action' => 'view', $merchantTransactions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MerchantTransactions', 'action' => 'edit', $merchantTransactions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MerchantTransactions', 'action' => 'delete', $merchantTransactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantTransactions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Order Payments') ?></h4>
        <?php if (!empty($merchant->order_payments)): ?>
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
            <?php foreach ($merchant->order_payments as $orderPayments): ?>
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
        <?php if (!empty($merchant->orders)): ?>
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
            <?php foreach ($merchant->orders as $orders): ?>
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
        <h4><?= __('Related Purchases') ?></h4>
        <?php if (!empty($merchant->purchases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Supplier Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Mode') ?></th>
                <th scope="col"><?= __('Bank Details') ?></th>
                <th scope="col"><?= __('Invoice Number') ?></th>
                <th scope="col"><?= __('Paid') ?></th>
                <th scope="col"><?= __('Unpaid') ?></th>
                <th scope="col"><?= __('Invoice Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($merchant->purchases as $purchases): ?>
            <tr>
                <td><?= h($purchases->id) ?></td>
                <td><?= h($purchases->supplier_id) ?></td>
                <td><?= h($purchases->merchant_id) ?></td>
                <td><?= h($purchases->amount) ?></td>
                <td><?= h($purchases->mode) ?></td>
                <td><?= h($purchases->bank_details) ?></td>
                <td><?= h($purchases->invoice_number) ?></td>
                <td><?= h($purchases->paid) ?></td>
                <td><?= h($purchases->unpaid) ?></td>
                <td><?= h($purchases->invoice_date) ?></td>
                <td><?= h($purchases->created) ?></td>
                <td><?= h($purchases->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Purchases', 'action' => 'view', $purchases->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Purchases', 'action' => 'edit', $purchases->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Purchases', 'action' => 'delete', $purchases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchases->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reviews') ?></h4>
        <?php if (!empty($merchant->reviews)): ?>
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
            <?php foreach ($merchant->reviews as $reviews): ?>
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
</div>
