<link  href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" >
<link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet">
<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merchant[]|\Cake\Collection\CollectionInterface $merchants
 */
?>
<style>

</style>
<div class="card card-tabs">
    <div class="card-content">
        <input type="hidden" value="<?= $token; ?>" name="_csrfToken" id="_csrfToken">
        <table class="responsive-table bordered" id="psp-datatable">
            <thead>
                <tr class="row-bg">
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
                    <!--<th scope="col"><?= $this->Paginator->sort('Order') ?></th>-->
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th scope="col">PSP Profile</th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach ($merchants as $merchant) : ?>
                    <tr>
                        <td><?= $this->Number->format($merchant->id) ?></td>
                        <!--<td><?//= $merchant->has('user') ? $this->Html->link($merchant->user->id, ['controller' => 'Users', 'action' => 'view', $merchant->user->id]) : '' ?></td>-->
                        <td><?= h($merchant->store_name) ?></td>
                        <td><?= h($merchant->username) ?></td>
                        <!--<td>0</td>-->
                        <td>
                            <?php if($merchant->status==1): ?>
                                <div class="switch">
                                    <label>
                                        <input type="checkbox" id="merchant-status-<?= $i; ?>" class="changeStatus" checked="checked">
                                        <span class="lever leverstatus" id="lever<?= $i; ?>" data-id="<?= $i; ?>" data-mid="<?= $merchant->id; ?>"></span> <span class="badge badge-success" id="badge-<?= $i; ?>">Active</span>
                                    </label>
                                </div>
                            <?php else: ?>
                                <div class="switch">
                                <label>
                                    <input type="checkbox" id="merchant-status-<?= $i; ?>" class="changeStatus">
                                    <span class="lever leverstatus" id="lever<?= $i; ?>" data-id="<?= $i; ?>" data-mid="<?= $merchant->id; ?>"></span> <span class="badge badge-danger" id="badge-<?= $i; ?>">InActive</span>
                                </label>
                            </div>
                            <?php endif; ?>    
                            
                        </td>
                        <td>
                            <?php if($merchant->user_status==1): ?>
                                <div class="switch">
                                    <label>
                                        <input type="checkbox" id="merchant-userstatus-<?= $i; ?>" class="changeStatus" checked="checked">
                                        <span class="lever leveruser" id="lever<?= $i; ?>" data-id="<?= $i; ?>" data-mid="<?= $merchant->id; ?>"></span> <span class="badge badge-success" id="ubadge-<?= $i; ?>">Active</span>
                                    </label>
                                </div>
                            <?php else: ?>
                                <div class="switch">
                                <label>
                                    <input type="checkbox" id="merchant-userstatus-<?= $i; ?>" class="changeStatus">
                                    <span class="lever leveruser" id="lever<?= $i; ?>" data-id="<?= $i; ?>" data-mid="<?= $merchant->id; ?>"></span> <span class="badge badge-danger" id="ubadge-<?= $i; ?>">InActive</span>
                                </label>
                            </div>
                            <?php endif; ?>    
                            
                        </td>
                        <td><?= date_format($merchant->created, "d/m/Y h:i:A");  ?></td>
                        <td><?= date_format($merchant->modified, "d/m/Y h:i:A");  ?></td>
                        <td class="actions">
                            <a title="View" href="<?= $this->Url->build(['action' => 'view', $merchant->id]) ?>" class="btn">
                                <i class="material-icons">remove_red_eye</i>
                            </a>
                            <a title="Edit" href="<?= $this->Url->build(['action' => 'edit', $merchant->id]) ?>" class="btn">
                                <i class="material-icons">edit</i>
                            </a>
                            <a title="Delete" href="<?= $this->Url->build(['action' => 'delete', $merchant->id]) ?>" class="btn" onclick="return confirm('Are you sure?')">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                <?php $i++; endforeach; ?>
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
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js "></script>
<script>
    
    $('#psp-datatable').DataTable({
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
