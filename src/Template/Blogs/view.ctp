<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog $blog
 */
?>
<div class="main-w3pvt main-cont">
    <div class="container">
        <div class="row" style="margin-top: 10rem;">
            <div class="card" style="width: 100%;">
                <div class="row">
                    <div class="col-md-6 pr-0">
                        <img class="card-img-top" src="<?= BASE_URL; ?>/img/blogs/<?= $ourBlog['image']; ?>"
                            alt="<?= $ourBlog['image_alt']; ?>">
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="card-body">
                            <h1 class="card-title"><?= $ourBlog['title']; ?></h1>

                            <h4 class="card-text">
                                <?= $ourBlog['description']; ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="space"></div>