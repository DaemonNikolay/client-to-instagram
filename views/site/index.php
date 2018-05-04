<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

    </div>
</div>


<script>
    var token = location.href.match(/#.*/);
    token = token.toString().split('=')[1];

    document.cookie = "accessToken=" + token;

</script>