<style>
  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }

  .thnk-container {
    width: 650px;
    margin: 0 auto;
  }

  ul {
    list-style-type: none;
  }

  .thnku-banner {
    width: 100%;
    background-color: #8e43e7;
    padding: 5% 0;
  }

  .thnku-banner div {
    background-color: #fff;
    border-radius: 74px;
    height: 125px;
    text-align: center;
    line-height: 125px;
    width: 125px;
  }

  .thnku-banner i {
    color: #8e43e7;
    display: block;
    font-size: 62px;
    padding: 9px;
  }

  .thnk-content li {
    text-align: center;
    margin-bottom: 34px;
  }

  .thnk-container li h1 {
    font-size: 70px;
  }

  .thnk-content li:last-child {
    margin-bottom: 0;
  }

  .thnk-content {
    height: 100%;
    padding: 24px 0;
  }

  .thnk-content::before {
    content: "";
    background-image: url("https://d2s63alnkuz6gf.cloudfront.net/assets/website/ui_icons/PDP/PDP-section-process-state-green.svg");
  }

.thnk-content .lead{
  font-size: 24px;
}

.thnk-content .lead strong{
  font-weight: 600;
}
.thnk-content .lea{
 font-size: 18px;
}
</style>
<div class="thnku-banner">
  <div class="thnk-container">
    <img height="72px" src="/img/thank-logo.png" alt="logo">
  </div>
</div>
<div class="thnk-container">
  <ul class="thnk-content">
    <li>
      <h1>Thank you !</h1>
    </li>
    <li>
      <!--<h3>Your's <a href="https://easifyy.com/order/in-progress" style="color:#8e43e7;">Order</a> Placed Successfully</h3>-->
      <h3>Your Amount Paid Successfully</h3>
    </li>
    <li>
    <p class="lead">Please <a href="https://www.google.com/gmail" style="color:#8e43e7;">check</a> Your Email.</p>
    </li>
    <li>
      <a class="btn btn-primary btn-sm" href="<?= BASE_URL; ?>" role="button">Continue to homepage</a>
    </li>
  </ul>
</div>