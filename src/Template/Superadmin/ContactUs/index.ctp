<link  href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" >
<link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet">
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactU[]|\Cake\Collection\CollectionInterface $contactUs
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Contact U'), ['action' => 'add']) ?></li>
    </ul>
</nav>-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="contactUs index large-9 medium-8 columns content">
    <h3 class="py-3"><?= __('Contact Us') ?></h3>
    <table cellpadding="0" cellspacing="0" id="contactUS-datatable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>-->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactUs as $contactU): ?>
            <tr>
                <td><?= $this->Number->format($contactU->id) ?></td>
                <td><?= h($contactU->first_name) ?></td>
                <td><?= h($contactU->last_name) ?></td>
                <td><?= h($contactU->email) ?></td>
                <td><?= h($contactU->Phone) ?></td>
                <td><?= h($contactU->created_at) ?></td>
                <!--<td><?= h($contactU->updated_at) ?></td>-->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contactU->id], array('class' => 'btn btn-sm py-2')) ?>
                    <!--<?= $this->Html->link(__('Edit'), ['action' => 'edit', $contactU->id], array('class' => 'btn btn-sm' )) ?>-->
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contactU->id], ['class' => 'btn','confirm' => __('Are you sure you want to delete # {0}?', $contactU->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!--<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>-->
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js "></script>
<script>
    
    $('#contactUS-datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        }
    );
</script>
