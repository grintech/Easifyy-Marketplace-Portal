<footer class="footer pt-5">
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-3 col-md-6 col-lg-2">
                <h6>Categories</h6>
                <ul class="list-unstyled footer-nav-wthree">
                    <?php $footerCategories= $this->Site->get_footer_categories(); ?>
                    <?php foreach ($footerCategories as $footerCategorie) : ?>
                        <li>
                            <a href="../service-plan/<?= $footerCategorie['slug']; ?>"><?= $footerCategorie['name']; ?></a>
                        </li>    
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-sm-3 col-md-6 col-lg-2">
                <h6>Company</h6>
                <ul class="list-unstyled footer-nav-wthree">
                    <li>
                        <a href="<?=BASE_URL?>pages/aboutUs">About Us</a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL?>blogs">Blog</a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL?>terms-of-service">Terms of Service</a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL?>privacy-policy">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL?>faq">FAQ's</a>
                    </li>
                    
                </ul>
            </div>
            <div class="col-sm-3 col-md-6 col-lg-2" >
                <h6>Support</h6>
                <ul class="list-unstyled footer-nav-wthree">
                    <!--<li>
                        <a href="<?=BASE_URL?>articles">Articles</a>
                    </li>-->
                    <li>
                        <a href="<?=BASE_URL?>pages/contactUs">Help &amp; Support</a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL?>trust-and-safety">Trust &amp; Safety</a>
                    </li>
                    <li>
                        <a href="javascript:void(Tawk_API.toggle())">Ask a Question </a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL?>pages/contactUs">Talk to Us</a>
                    </li>
                </ul>
            </div>
            <!--<div class="col-lg-3 col-md">
                <h6>Community</h6>
                <ul class="list-unstyled footer-nav-wthree">
                    <li>
                        <a href="<?=BASE_URL?>blogs">Events</a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL?>blogs">Blogs</a>
                    </li>
                    <li>
                        <a href="#">Forum</a>
                    </li>
                    <li>
                        <a href="#">Community Standards</a>
                    </li>
                    <li>
                        <a href="#">Podcasts</a>
                    </li>
                    <li>
                        <a href="#">Affiliates</a>
                    </li>
                    <li>
                        <a href="#">Invite a Friend</a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL?>users/signup">Become a PSP</a>
                    </li>
                </ul>
            </div>-->
            <div class="col-sm-3 col-md-6 col-lg-2">
                <h6>Sign Up</h6>
                <ul class="list-unstyled footer-nav-wthree">
                    <li>
                        <a href="<?=BASE_URL?>become-a-user">Become a User</a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL?>become-a-psp">Become a PSP</a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL?>refer-a-friend">Refer a Friend</a>
                    </li>
                    <!--<li>
                        <a href="#">Affiliates</a>
                    </li>
                    <li>
                        <a href="#">Invite a Friend</a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL?>users/signup">Become a PSP</a>
                    </li>-->
                </ul>
            </div>
            <div class="col-sm-3 col-md-6 col-lg-4">
                <h6>Contact Us</h6>
                <ul class="list-unstyled footer-nav-wthree">
                    <li>
                        <a href="<?=BASE_URL?>become-a-user"><a href="mailto:welcome@easifyy.com">welcome@easifyy.com</a></a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL?>become-a-psp" class="font-weight-bold" >Join thousands other Subscribers</a>
                    </li>
                    <li class="footer-mailfrm">
                        <?= $this->Form->create(); ?> 
                            <input type="email" class="email py-2 rounded" name="newsletterEmail" id="newsletterEmail">
                            <a class="reqe-button" name="newsLetterSubscribe" id="newsLetterSubscribe">Subscribe</a>
                        <?= $this->Form->end(); ?>    
                        <span class="newsletter-form-respone"></span>
                    </li>
                    <!--<li class="footer-mailfrm">
                         Begin Mailchimp Signup Form 
                        <link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
                        <style type="text/css">
                        #mc_embed_signup{background:#E2DBFF; clear:left; font:14px Helvetica,Arial,sans-serif; }
                        /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
                        We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                        </style>
                        <div id="mc_embed_signup">
                        <form action="https://easifyy.us1.list-manage.com/subscribe/post?u=32afee2d99f80eea8d5a7d889&amp;id=25d0851c82" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form">
                        <div id="mc_embed_signup_scroll d-flex">
                        <!--<label for="mce-EMAIL">Subscribe</label>
                        <input type="email" value="" name="EMAIL" class="email py-2 rounded" id="mce-EMAIL" placeholder="email address" required>
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_32afee2d99f80eea8d5a7d889_25d0851c82" tabindex="-1" value=""></div>
                        <div class="clear">
                            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="reqe-button"></div>
                        </div>
                        </form>
                        <div id="subscribe-result">
                        </div>
                        </div>

                        <!--End mc_embed_signup
                    </li>-->
                    <!--<li>
                        <a href="#">Affiliates</a>
                    </li>
                    <li>
                        <a href="#">Invite a Friend</a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL?>users/signup">Become a PSP</a>
                    </li>-->
                </ul>
            </div>
        </div>
        <div class="row copy">
            <div class="col-lg-4">
                <!-- copyright -->
                <p class=""><a class="navbar-brand" href="index.html">
                        <!--  <img src="assets/images/logo.png" alt="Easiffy" >-->
                    </a>
                </p>
                <!-- //copyright -->
            </div>
            <div class="col-md-4" style="text-align: center;margin: auto; font-size: 15px;">
                © 2020 <a href="https://easifyy.com" target="_blank">Easifyy</a>
                All rights reserved.
            </div>
            <!-- social icons -->
            <div class="col-lg-4 w3social-icons text-right txt-ctr f-soc">
                <ul>
                    <li>
                        <a href="#" class="rounded-circle">
                            <i class="fa fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="rounded-circle">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="rounded-circle">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="rounded-circle">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="rounded-circle">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="rounded-circle">
                            <i class="fa fa-pinterest"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- //social icons -->
            <div class="col-lg-12">
                <!-- copyright 
          <p class="text-center"><span>© 2020 Kisten Education Pvt. Ltd. All Rights Reserved.</span></p>
           //copyright -->
            </div>
        </div>
    </div>
</footer>
<!-- //footer -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

