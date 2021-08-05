<style>
/* help center  start*/
.container-fluid {
    padding: 0 1%;
}

.container {
    width: 1170px;
}

.jumbotron-box {
    background-color: #8e43e7;
    text-align: center;
    padding: 4% 0;
    line-height: 2;
    border-radius: 8px 8px 0 0;
}

.help-center-h1 {
    font-size: 32px;
    color: #fff;
}

.help-center-h2 {
    font-size: 22px;
    color: #fff;
}

.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

.help-buttons {
    padding: 0 1%;
}

.help-buttons ul {
    display: flex;
    margin: 0;
}

.help-buttons ul li {
    text-align: center;
}

.help-buttons ul li .btn {}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    padding: 6px 12px;
    border-top: none;
}

.help-buttons .btn {
    background-color: #d3baf1;
    color: #000;
    box-shadow: none;
    outline: none;
    font-weight: 700;
    padding: 0;
}

.help-buttons .btn:hover {
    background-color: #d3baf1 !important;
    color: #000 !important;
}

.help-buttons .btn:active,
.help-buttons .btn:focus {
    background-color: #8e43e7 !important;
    color: #fff !important;
}

.help-faq {
    display: flex;
    flex-flow: wrap;
}

.help-main-section .btn-link {
    font-size: 23px;
    color: #8e43e7;
    border: none;
    background-color: #ffff;
}

.help-main-section .btn-link:focus,
.help-main-section .btn-link:hover {
    text-decoration: none !important;
    background-color: #fff !important;
}

.help-main-section h2 {
    line-height: 0 !important;
    margin: 0px 0 3% 0px !important;
    border-bottom: solid #e8eef3 1px;
    padding: 0 0 14px 0;
}

.help-faqs-side {
    border: solid #8e43e7 1px;
    text-align: center;
    margin-bottom: 6%;
    width: 73%;
    padding: 0 0 5% 0;
    float: right;
}

.help-faqs-side h4 {
    font-size: 20px;
    font-weight: 900;
    padding-bottom: 6%;
}

/* article start */
.help-article {
    display: flex;
    flex-flow: wrap;
}

.help-article a {
    color: #696969;
    text-decoration: none;
}

.help-article a:hover {
    color: #8e43e7;
}

.help-article h3 {
    font-size: 18px;
    font-weight: 600;
}

.help-article ul {
    padding-left: 5%;
}

.help-article ul li {
    margin-top: 4%;
    list-style-type: disc;
}

/* article end */
/* video start */
.help-video-h1 {
    text-align: center;
    padding: 3% 0;
}

.help-video-h1 h1 {
    font-size: 50px;
    font-weight: 900
}

.help-videos {
    display: flex;
    flex-flow: wrap;
}

.help-videos h3 {
    font-size: 20px;
    font-weight: 600;
}

.help-videos .col-md-4 {
    margin-bottom: 5% !important;
}

.active {
    background-color: #8e43e7;
    color: #fff;
}

/* video end */
/* help center end*/
</style>
<section class="help-center-section">
    <div class="container-fluid">
        <div class="jumbotron-box">
            <h1 class="help-center-h1">Easifyy Help center for Experts.</h1>
            <h2 class="help-center-h2">Read all about working on Easifyy from the FAQs, Video Tutorials
                and Guided Articles.
            </h2>
        </div>
    </div>
</section>
<section>
    <div class="help-buttons col-md-12">
        <ul class="">
            <li class="col-md-4 btn">
                <div class="tablinks" id="defaultOpen" onclick="openCity(event, 'London')">FAQs</div>
            </li>
            <li class="col-md-4 btn">
                <div class="tablinks" onclick="openCity(event, 'Paris')">Article</div>
            </li>
            <li class="col-md-4 btn">
                <div class="tablinks" onclick="openCity(event, 'Tokyo')">Video</div>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="">
            <div id="London" class="first-content tabcontent">
                <div class="help-faq  row">
                    <div class="col-sm-8 main-acc">
                        <div class="accordion mt-md-5 mb-md-5" id="accordionExample">
                            <?php foreach ($faqs as $faq){    ?>
                                <div class="help-main-section">
                                    <div class="" id="heading<?=$faq->id?>">
                                        <h2 class="mb-0">
                                            <button type="button" class="btn-link collapsed" data-toggle="collapse" data-target="#collapse<?=$faq->id?>"><i class="fa fa-plus"></i> 
                                                <?php echo($faq->question)?>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapse<?=$faq->id?>" class="collapse" aria-labelledby="heading<?=$faq->id?>" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p><?php echo ($faq->answer)?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-md-5 mb-md-5">
                        <div class="help-faqs-side">
                            <h4>For Any Support</h4>
                            <div><a class="btn btn-learning-add" href="mailto:support@Easifyy.com">
                                welcome@easifyy.com</a>
                            </div>
                        </div>
                        <!-- <div class="help-faqs-side">
                            <h4>For Seller Profile and Verification:</h4>
                            <div class="text-center side-card-btn-box"><a class="btn btn-learning-add"
                                    href="mailto:seller@Easifyy.com">seller@Easifyy.com</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div id="Paris" class="tabcontent">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 help-article">
                        <div class="col-md-6">
                            <h3>Guide Articles</h3>
                            <ul>
                                <?php foreach ($articles as $article): ?>
                                    <li>
                                        <a href="<?= BASE_URL; ?>article/<?= $article['slug']; ?>">
                                            <?= $article['title'] ?>
                                        </a>
                                    </li>
                                    <!--<li><a href="#">Easifyy Profile verification & Approval Process</a></li>-->
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <!--<div class="col-md-4">
                            <h3>Completing Jobs & working on Easifyy</h3>
                            <ul>
                                <li><a href="#">How to Complete Easifyy Profile</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h3>Gigs Creation and Visibility</h3>
                            <ul>
                                <li><a href="#">Profile Bio & Product Descriptions</a></li>
                                <li><a href="#">Examples of Photoshop Editing</a></li>
                                <li><a href="#">Examples of Social Media Graphics & Banners</a></li>
                                <li><a href="#">Examples of Flyer, Brochure & Standee Design</a></li>
                                <li><a href="#">Examples of Menu Design & Invitation Design</a></li>
                                <li><a href="#">Examples of Website & Mobile UI Design</a></li>
                                <li><a href="#">Examples of Package Design & Product Photography</a></li>
                            </ul>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
        <div id="Tokyo" class="tabcontent">
            <div class="container">
                <div class="row">
                    <div class="help-video-h1 col-md-12">
                        <h1>Easifyy Video Tutorials</h1>
                    </div>
                    <?php // dd($YoutubeVideos);?>
                    <div class="help-videos col-md-12">
                        <?php foreach ($YoutubeVideos as $video): ?>
                            <div class="col-md-4">
                                <iframe width="100%" height="auto" src="<?= $video['youtubeLink']; ?>"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                                <h3><?= $video['name']; ?></h3>
                            </div>
                        <?php endforeach;?>

                        <!--<div class="col-md-4">
                            <iframe width="100%" height="auto" src="https://www.youtube.com/embed/F66UbvURLk4"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                            <h3>How to communicate and convert leads from GigChat</h3>
                        </div>
                        <div class="col-md-4">
                            <iframe width="100%" height="auto" src="https://www.youtube.com/embed/F66UbvURLk4"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                            <h3>How to complete an Order successfully</h3>
                        </div>
                        <div class="col-md-4">
                            <iframe width="100%" height="auto" src="https://www.youtube.com/embed/F66UbvURLk4"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                            <h3>How to write Gig Title & Description</h3>
                        </div>
                        <div class="col-md-4">
                            <iframe width="100%" height="auto" src="https://www.youtube.com/embed/F66UbvURLk4"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                            <h3>How to make packages, set deliverables & pricing</h3>
                        </div>
                        <div class="col-md-4">
                            <iframe width="100%" height="auto" src="https://www.youtube.com/embed/F66UbvURLk4"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                            <h3>Tips on uploading graphics, video & links</h3>
                        </div>
                        <div class="col-md-4">
                            <iframe width="100%" height="auto" src="https://www.youtube.com/embed/F66UbvURLk4"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                            <h3>Custom Gigs & how to create them?</h3>
                        </div>
                        <div class="col-md-4">
                            <iframe width="100%" height="auto" src="https://www.youtube.com/embed/F66UbvURLk4"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                            <h3>Importance of Milestones & how to create them?</h3>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();
</script>