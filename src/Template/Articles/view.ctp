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
                <img class="card-img-top" src="<?= BASE_URL; ?>/img/articles/<?= $article['image']; ?>" alt="Card image cap">
                  
                    <div class="card-body">
                        <h2 class="card-title"><?= $article['title']; ?></h2>
                        
                        <h4 class="card-text">
                            <?= $article['description']; ?>
                        </h4>
                    </div>
                </div>
        </div>
    </div>
</div>

