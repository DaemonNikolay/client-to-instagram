<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\httpclient\Client;
use yii\bootstrap\Modal;

$accessToken = $_COOKIE['accessToken'];
$response = file_get_contents("https://api.instagram.com/v1/users/self/media/recent/?access_token=" . $accessToken . "&count=5");

$response = json_decode($response, true);

echo "<pre>";
var_dump($response);
echo "</pre>";

$profile_picture = $response['data'][0]['user']['profile_picture'];
$full_name = $response['data'][0]['user']['full_name'];
$username = $response['data'][0]['user']['username'];

$this->title = $username;
$this->params['breadcrumbs'][] = $this->title;

//for ($i = 0; $i < count($response['data']); $i++) {
//    foreach ($response['data'][$i]['images'] as $image) {
//        echo $image['url'];
//        echo "<br />";
//        break;
//    }
//
//    echo "<hr />";
//}



?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <figure>
        <img src="<?= $profile_picture ?>" alt="Profile image">
        <figcaption><?= $full_name ?></figcaption>
    </figure>

    <br/>
    <br/>

    <table class="table">

        <tr>
            <?php

            for ($i = 0; $i < count($response['data']); $i++) {

                if ($i % 3 == 0) {
                    echo '</tr><tr>';
                }

                foreach ($response['data'][$i]['images'] as $image) {

                    echo '<td><img src=" ' . $image['url'] . '">';
                    echo '  </td>';

                    break;
                }
            }

            ?>

        </tr>
    </table>
</div>


<!--<script>-->
<!--    var token = location.href.match(/#.*/);-->
<!--    token = token.toString().split('=')[1];-->
<!---->
<!--    document.cookie = "accessToken=" + token;-->
<!---->
<!--</script>-->
<!---->
