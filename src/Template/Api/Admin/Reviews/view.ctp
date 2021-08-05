<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Review $review
 */
?>

<div class="row">
    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header m-0">Basic Details</h5>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Reviewer name'); ?></label>
                    <span>
                        <?= h($review->reviewer_name) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Reviewer email'); ?></label>
                    <span>
                        <?= h($review->reviewer_email) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Rating'); ?></label>
                    <span>
                        <?= $this->Number->format($review->rating) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Status'); ?></label>
                    <span>
                        <?= $this->Number->format($review->approved) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Date'); ?></label>
                    <span>
                        <?= h($review->created) ?>
                    </span>
                </div>
                <div class="card-text w-100 float-left p-1">
                    <label><?php echo __('Review text'); ?></label>
                    <span>
                        <?= $this->Text->autoParagraph(h($review->review)); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>