<div class="main-w3pvt main-cont mb-5"  style="margin-top:12rem;">
    <div class="container">
    <div class="row bgthe-color py-5">
                <div class="col-sm-12">
                    <h3 class="heading-md text-center">
                    FAQ's
                    </h3>
                    <h5 class="text-center"><b>Let's clear your doubts!</b></h5>
                </div>
            </div>
        <div class="row">
            <div class="col-sm-12 col-sm-offset-1 t-services faq-cntent px-lg-0 mt-4">
                <div class="accordion" id="accordionExample">
                    <?php
                    foreach ($faqs as $faq){    ?>
                        <div class="card">
                        <div class="card-header" id="headingOne-<?=$faq->id?>">
                            <h2 class="mb-0">
                                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-<?=$faq->id?>"><i class="fa fa-plus"></i> 
                                    <?php echo($faq->question)?>
                                </button>									
                            </h2>
                        </div>
                        <div id="collapseOne-<?=$faq->id?>" class="collapse" aria-labelledby="headingOne-<?=$faq->id?>" data-parent="#accordionExample">
                            <div class="card-body">
                                <p><?php echo ($faq->answer)?></p>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>