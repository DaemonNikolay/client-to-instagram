<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Главная';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

</div>


<script>
    var token = location.href.match(/#.*/);
    token = token.toString().split('=')[1];

    document.cookie = "accessToken=" + token;

</script>

