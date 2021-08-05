<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog[]|\Cake\Collection\CollectionInterface $blogs
 */
?>

<div class="container mt-10">
    <h2 class="text-center mx-auto">All Articles</h2>
    <div class="row mt-10" style="margin: 5%; margin-top: 10rem;">
        <?php foreach ($articles as $article): ?>
               <div class="col-md-6 col-xs-12">
                    <div class="card" style="width: 100%; margin: 5%;">
                        <a href="<?= BASE_URL; ?>article/<?= $article['slug']; ?>">
                            <img class="card-img-top" width="350" height="350" src="https://easifyy.com/img/articles/<?= $article['image']; ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?= $article['title'] ?></h5>
                            <p class="card-text">
                                <?php //echo $article['description'];?> 
                                <a href="<?= BASE_URL; ?>article/<?= $article['slug']; ?>">read more ...</a>
                            </p>
                        </div>
                    </div>
               </div>  
        <?php endforeach; ?>
    </div>
</div>

