<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantKyc $merchantKyc
 */
?>
<div class="merchantKycs form large-9 medium-8 columns content">
    <?= $this->Form->create($merchantKyc) ?>
    <fieldset>
        <legend><?= __('Edit Merchant Kyc') ?></legend>
        <?php
            echo $this->Form->control('merchant_id', ['options' => $merchants]);
            echo $this->Form->control('govt_Id');
            echo $this->Form->control('address_Id');
            echo $this->Form->control('qualification_Id');
            echo $this->Form->control('gst_declarartion');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
