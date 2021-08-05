<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantKyc $merchantKyc
 */
?>
<div class="merchantKycs view large-9 medium-8 columns content">
    <h3><?= h($merchantKyc->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Merchant') ?></th>
            <td><?= $merchantKyc->has('merchant') ? $this->Html->link($merchantKyc->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $merchantKyc->merchant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Govt Id') ?></th>
            <td><?= h($merchantKyc->govt_Id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address Id') ?></th>
            <td><?= h($merchantKyc->address_Id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Qualification Id') ?></th>
            <td><?= h($merchantKyc->qualification_Id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gst Declarartion') ?></th>
            <td><?= h($merchantKyc->gst_declarartion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($merchantKyc->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $merchantKyc->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
