<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier[]|\Cake\Collection\CollectionInterface $suppliers
 */
?>

<div class="card card-tabs">
    <div class="card-content">
    
        <table class="responsive-table bordered">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('_name', [__('Name')]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('email', [__('Email')]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('gst_no', [__('GST No')]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status', [__('Status')]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created', [__('Created on')]) ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><?= $this->Number->format($supplier->id) ?></td>
                    <td><?= h($supplier->_name) ?></td>
                    <td><?= h($supplier->email) ?></td>
                    <td><?= h($supplier->gst_no) ?></td>
                    <td><?= h($supplier->status) ?></td>
                    <td><?= h($supplier->created) ?></td>
                    <td class="actions">
                        
                        <a title="View" href="<?= $this->Url->build(['action' => 'view', $supplier->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light cyan">
                            <i class="material-icons">remove_red_eye</i>
                        </a>
                        <a title="Edit" href="<?= $this->Url->build(['action' => 'edit', $supplier->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light amber darken-4">
                            <i class="material-icons">edit</i>
                        </a>
                        <a title="Delete" href="<?= $this->Url->build(['action' => 'delete', $supplier->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light red accent-2" onclick="return confirm('Are you sure?')" >
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('First')) ?>
                <?= $this->Paginator->prev('< ' . __('Previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('Next') . ' >') ?>
                <?= $this->Paginator->last(__('Last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>
    </div>
</div>
