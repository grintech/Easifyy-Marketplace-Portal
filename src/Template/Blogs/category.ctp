<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog[]|\Cake\Collection\CollectionInterface $blogs
 */
?>

<div class="container">
    <div class="row mt-10" style="margin: 5%; margin-top: 10rem;">
        <h1 class="col-md-12 text-center"><?=$ourBlogs[0]['name']?></h1>
        <?php foreach ($ourBlogs[0]['blogs'] as $blog): ?>
               <div class="col-md-6 col-xs-12">
                    <div class="card" style="width: 100%; margin: 5%;">
                        <a href="<?= BASE_URL; ?>blogs/<?= $blog['slug']; ?>">
                            <img class="card-img-top" width="350" height="350" src="https://easifyy.com/img/blogs/<?= $blog['image']; ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?= $blog['title'] ?></h5>
                            <p class="card-text">
                                <?php //echo $blog['description'];?> 
                                <a href="<?= BASE_URL; ?>blogs/<?= $blog['slug']; ?>">read more ...</a>
                            </p>
                        </div>
                    </div>
               </div>  
        <?php endforeach; ?>
    </div>
</div>

