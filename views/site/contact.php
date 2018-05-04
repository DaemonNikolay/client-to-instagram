<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\httpclient\Client;

$accessToken = $_COOKIE['accessToken'];
$response = file_get_contents("https://api.instagram.com/v1/users/self/?access_token=" . $accessToken);

$response = json_decode($response, true);
$profile_picture = $response['data']['profile_picture'];
$full_name = $response['data']['full_name'];
$username = $response['data']['username'];

$this->title = $username;
$this->params['breadcrumbs'][] = $this->title;

//echo $profile_picture;

?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <figure>
        <img src="<?= $profile_picture ?>" alt="Profile image">
        <figcaption><?= $full_name ?></figcaption>
    </figure>
</div>


<!--<script>-->
<!--    var token = location.href.match(/#.*/);-->
<!--    token = token.toString().split('=')[1];-->
<!---->
<!--    document.cookie = "accessToken=" + token;-->
<!---->
<!--</script>-->
<!---->
