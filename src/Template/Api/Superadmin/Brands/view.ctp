<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Brand $brand
 */
?>

<div class="brands view large-9 medium-8 columns content">
    <h3><?= h($brand->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($brand->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($brand->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($brand->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($brand->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Merchant Product Brands') ?></h4>
        <?php if (!empty($brand->merchant_product_brands)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Product Id') ?></th>
                <th scope="col"><?= __('Brand Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($brand->merchant_product_brands as $merchantProductBrands): ?>
            <tr>
                <td><?= h($merchantProductBrands->id) ?></td>
                <td><?= h($merchantProductBrands->merchant_product_id) ?></td>
                <td><?= h($merchantProductBrands->brand_id) ?></td>
                <td><?= h($merchantProductBrands->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MerchantProductBrands', 'action' => 'view', $merchantProductBrands->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MerchantProductBrands', 'action' => 'edit', $merchantProductBrands->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MerchantProductBrands', 'action' => 'delete', $merchantProductBrands->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProductBrands->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Product Brands') ?></h4>
        <?php if (!empty($brand->product_brands)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Brand Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($brand->product_brands as $productBrands): ?>
            <tr>
                <td><?= h($productBrands->id) ?></td>
                <td><?= h($productBrands->product_id) ?></td>
                <td><?= h($productBrands->brand_id) ?></td>
                <td><?= h($productBrands->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductBrands', 'action' => 'view', $productBrands->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductBrands', 'action' => 'edit', $productBrands->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductBrands', 'action' => 'delete', $productBrands->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productBrands->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
