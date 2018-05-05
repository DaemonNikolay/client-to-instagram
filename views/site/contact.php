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
$response = file_get_contents("https://api.instagram.com/v1/users/self/media/recent/?access_token=" . $accessToken);

$response = json_decode($response, true);

//echo "<pre>";
//var_dump($response);
//echo "</pre>";

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

//960305426.ea9154d.fe71a5e69c6b453db1d6b7777ba6c2c7

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

                    $comments = file_get_contents("https://api.instagram.com/v1/media/" . $response['data'][$i]['id'] . "/comments?access_token=" . $accessToken);
                    $comments = json_decode($comments, true);
//                    echo $comments['data'][0]['text'];
//                    for ($j = 0; $j < count($comments['data']); $j++) {
//                    var_dump($comments['data'][$j]['from']['username']);}
//                    exit;
//                    for ($j = 0; $j < count($comments['data']); $j++) {
//                        foreach ($comments['data'][$i] as $item) {
//                            echo "<em>" . $comments['data'][$i]['from']['username'] . "</em>: " . $comments['data'][$i]['text'];
//                            echo "<br />";
//                        }
//                    }

                    for ($j = 0; $j < count($comments['data']); $j++) {
                        echo "<br />";
                        echo "  <em>" . $comments['data'][$j]['from']['username'] . "</em>: " . $comments['data'][$j]['text'];
                    }


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
