<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog[]|\Cake\Collection\CollectionInterface $blogs
 */
?>
<section style="margin-top: 12rem;">
    <div class="container">
        <div class="row bgthe-color py-5">
            <div class="col-sm-12">
                <h3 class="heading-md text-center">
                    Blogs
                </h3>
            </div>
        </div>
        <div class="secspace"></div>
        <div class="row blog-hed">
            <div class="col-md-2">
                <h2>Category:</h2>
            </div>
            <div class="col-md blog-hlink">
                <?php foreach ($blogCategories as $blogCategory): ?>
                <a href="https://easifyy.com/blogs/category/<?=$blogCategory->slug?>"
                    class=""><?=$blogCategory->name?></a>
                <?php endforeach;?>
            </div>
        </div>
        <div class="secspace"></div> 
        <div class="row">   
            <?php foreach ($blogs as $blog): ?>
            <div class="col-md-6 col-lg-4 col-xs-12 blog-cntnt">
                <div class="card" style="margin-bottom: 25px;">
                    <a href="<?= BASE_URL; ?>blogs/<?= $blog['slug']; ?>">
                        <img class="card-img-top" width="350" height="350"
                            src="https://easifyy.com/img/blogs/<?= $blog['image']; ?>" alt="Card image cap">
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

</section>