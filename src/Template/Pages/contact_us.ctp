<meta name="google-signin-client_id" content="839894906232-87o6qqjg8a5oo7mkvp1vnic24leofrs0.apps.googleusercontent.com">
<style>
.btn.btn-send {
    color: #fff;
    background: #8e43e7;
    padding: 9px 10px;
    border-radius: 5px;
    font-size: 13px;
    font-weight: 500;
    text-transform: uppercase;
}

.card-body.text-center i {
    color: #8e43e7;
}

/*.contactBanner {
        background-image: url("https://easifyy.com/banner/bg3.jpg");
        background-size: cover;
        height: auto;
        min-height: 420px;
    }*/
</style>

<!--Section: Contact v.2-->
<section style="margin-top: 12rem !important;">
    <!--Section heading-->
    <section id="contact">
        <div class="container">
                <div class="row bgthe-color py-5">
                    <div class="col-sm-12">
                        <h3 class="heading-md text-center">
                            Contact Us
                        </h3>
                    </div>
                </div>
            <div class="secspace"></div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="title-w3 text-center mb-5">Help & Support</h3>
                    <h4 class="mb-3"><b>Get in touch with us, we’d love to help!</b></h4>
                    <p>Contact us for any query regarding your any business related queries. Our expert team will connect with you at the earliest.</p>
                    <h5 class="mt-3"><b>Ask anything we’ll reply quickly</b></h5>
                </div>
            </div>
            <div class="secspace"></div>
            <div class="row">
                <!-- Phone Remove Start -->
                <div class="col-md-4">
                    <div class="card border-0">
                        <div class="card-body text-center p-0">
                            <i class="fa fa-phone fa-3x mb-3" aria-hidden="true"></i>
                            <h4 class="text-uppercase">call us</h4>
                            <p></p>
                        </div>
                    </div>
                </div>
                <!-- Phone Remove End -->

                <div class="col-md-4 mt-4 mt-md-0">
                    <div class="card border-0">
                        <div class="card-body text-center p-0">
                            <i class="fa fa-map-marker fa-3x mb-3" aria-hidden="true"></i>
                            <h4 class="text-uppercase">office loaction</h4>
                            <address></address>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4 mt-md-0">
                    <div class="card border-0">
                        <div class="card-body text-center p-0">
                            <i class="fa fa-globe fa-3x mb-3" aria-hidden="true"></i>
                            <h4 class="text-uppercase">email</h4>
                            <!-- <p>welcome@easifyy.com</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="secspace"></div>
    <div class="row">
        <div class="container">
            <div class="row bgthe-color" style="border-radius: 6px;">
                <div class="col-lg-8 col-lg-offset-2 p-4">
                    <?php if(isset($status_message)): ?>
                    <div class="alert alert-success" role="alert">
                        Your Query has been submitted Sucessfully. Plese check your email for further instructions.
                    </div>
                    <?php endif; ?>
                    <!-- <form name="contact-form" method="post" action="" role="form"> -->
                    <?= $this->Form->create(NULL, array('id'=>'contactFormQuery')) ?>
                    <input type="hidden" name="formtype" value="contactform">
                    <div class="messages"></div>
                    <div class="controls">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name"><b>First Name *</b></label>
                                    <input id="form_name" type="text" name="name" class="form-control"
                                        placeholder="Please enter your firstname *" required="required"
                                        data-error="Firstname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname"><b>Last Name *</b></label>
                                    <input id="form_lastname" type="text" name="surname" class="form-control"
                                        placeholder="Please enter your lastname *" required="required"
                                        data-error="Lastname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_email"><b>Email *</b></label>
                                    <input id="form_email" type="email" name="email" class="form-control"
                                        placeholder="Please enter your email *" required="required"
                                        data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_phone"><b>Phone</b></label>
                                    <input id="form_phone" type="tel" name="phone" class="form-control"
                                        placeholder="Please enter your phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message"><b>Message *</b></label>
                                    <textarea id="form_message" name="message" class="form-control"
                                        placeholder="Message for me *" rows="4" required
                                        data-error="Please,leave us a message."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <?php if($usecaptcha==1) { ?>
                            <div class="form-group col-6">
                                <div class="g-recaptcha" id="g-recaptcha-responsecontact"
                                    data-sitekey="6Lcih9QaAAAAAP1WyO5yInLxZhIA4S8p72nA3KWl"></div>
                            </div>
                            <?php } ?>
                            <div class="col-6 float-left d-flex align-items-center">
                                <input id="contactUsSubmit" type="submit" class="btn btn-send" value="Send message">
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->end(); ?>
                    <!-- </form> -->
                </div>
                <div class="col-lg-4 col-lg-offset-2 p-0">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d447986.8531465845!2d76.81115172140052!3d28.692718880972045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d047309fff32f%3A0xfc5606ed1b5d46c3!2sDelhi!5e0!3m2!1sen!2sin!4v1617774498372!5m2!1sen!2sin"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="secspace"></div>

<!-- article -->
<section class="blog-w3ls py-5 bg-light" id="blog">
    <div class="container">
        <h3 class="title-w3 pt-3 mb-sm-5 mb-5 text-dark text-center font-weight-bold">Our Articles</h3>
        <div class="f-rt f-rt1">
            <a href="https://easifyy.com/articles/" class="button-style1">See More Articles <i
                    class='fa fa-angle-right'></i></a>
        </div>
        <div class="row package-grids">
            <?php foreach ($ourArticles as $article): ?>
            <div class="col-md-4 blog-w3">
                <div class="blogs-top">
                    <a href="<?= BASE_URL; ?>article/<?= $article['slug']; ?>">
                        <img width="350" height="350" src="<?= BASE_URL; ?>/img/articles/<?= $article['image']; ?>"
                            alt="article1" class="img-fluid" />
                    </a>
                </div>
                <div class="blogs-bottom p-2 bg-white">
                    <h4 class="text-dark"><?php echo $article['title'];?>
                        <a href="<?= BASE_URL; ?>article/<?= $article['slug']; ?>"></a>
                    </h4>
                    <a>Posted by Easifyy</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- //article -->

<!--Section: Contact v.2-->