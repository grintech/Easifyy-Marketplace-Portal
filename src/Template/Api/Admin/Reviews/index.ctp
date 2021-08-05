<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Review[]|\Cake\Collection\CollectionInterface $reviews
 */
?>

<div class="card card-tabs">
    <div class="card-content">
    
        <table class="responsive-table bordered">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('rating', [__('Rating')]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('reviewer_name', [__('Reviewer name')]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('reviewer_email', [__('Reviewer email')]) ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review): ?>
                <tr>
                    <td><?= $this->Number->format($review->rating) ?></td>
                    <td><?= h($review->reviewer_name) ?></td>
                    <td><?= h($review->reviewer_email) ?></td>
                    <td class="actions">
                        
                        <a title="View" href="<?= $this->Url->build(['action' => 'view', $review->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light cyan">
                            <i class="material-icons">remove_red_eye</i>
                        </a>
                        
                        <a title="Edit" href="<?= $this->Url->build(['action' => 'edit', $review->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light amber darken-4">
                            <i class="material-icons">edit</i>
                        </a>

                        <a title="Delete" href="<?= $this->Url->build(['action' => 'delete', $review->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light red accent-2" onclick="return confirm('Are you sure?')" >
                            <i class="material-icons">delete</i>
                        
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
