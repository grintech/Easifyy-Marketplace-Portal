<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!-- <div class="message success"></div>
 -->
<div class="alert alert-success alert-dismissible fade show message"  onclick="this.classList.add('hidden')">
              <?= $message ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <style type="text/css">
.alert {
    
    width: 400px;
    position: fixed;
    right: 0;
    top: 43px;
    z-index: 1;
}
.alert-dismissible .close {
    position: absolute;
    top: 0;
    font-size: 32px;
    right: 0;
    padding: 0.5rem 1.25rem;
    color: inherit;
}

    </style>
