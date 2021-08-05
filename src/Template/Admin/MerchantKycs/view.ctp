<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantKyc $merchantKyc
 */
?>
<div class="merchantKycs view large-9 medium-8 columns content px-4">
    <h4>Kyc Documents</h4>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Identity verification Proof') ?></th>
            <td><img src="../../../img/kyc-documents/<?= h($merchantKyc->govt_Id) ?>" width="100" height="100"></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address verification proof') ?></th>
            <td><img src="../../../img/kyc-documents/<?= h($merchantKyc->address_Id) ?>" width="100" height="100"></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Education Qualification verification proof') ?></th>
            <td><img src="../../../img/kyc-documents/<?= h($merchantKyc->qualification_Id) ?>" width="100" height="100"></td>
        </tr>
        <tr>
            <th scope="row"><?= __('GST Declaration Proof') ?></th>
            <td><img src="../../../img/kyc-documents/<?= h($merchantKyc->gst_declarartion) ?>" width="100" height="100"></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $merchantKyc->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
