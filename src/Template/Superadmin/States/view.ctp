<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\State $state
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit State'), ['action' => 'edit', $state->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete State'), ['action' => 'delete', $state->id], ['confirm' => __('Are you sure you want to delete # {0}?', $state->id)]) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="states view large-9 medium-8 columns content">
    <h3><?= h($state->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($state->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gst Code') ?></th>
            <td><?= h($state->gst_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($state->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($state->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Addresses') ?></h4>
        <?php if (!empty($state->addresses)): ?>
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
            <?php foreach ($state->addresses as $addresses): ?>
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
        <h4><?= __('Related Merchants') ?></h4>
        <?php if (!empty($state->merchants)): ?>
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
            <?php foreach ($state->merchants as $merchants): ?>
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
        <h4><?= __('Related Suppliers') ?></h4>
        <?php if (!empty($state->suppliers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
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
            <?php foreach ($state->suppliers as $suppliers): ?>
            <tr>
                <td><?= h($suppliers->id) ?></td>
                <td><?= h($suppliers->merchant_id) ?></td>
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
</div>
