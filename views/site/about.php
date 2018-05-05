<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\httpclient\Client;

$this->title = 'Выход';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php

//file_get_contents("https://www.instagram.com/accounts/logout");


//echo file_get_contents("https://www.instagram.com/accounts/logout");

//$client = new Client();
//$response = $client->createRequest()
//                   ->setMethod('get')
//                   ->setUrl('https://www.instagram.com/accounts/logout')
//                   ->send();
//if ($response->isOk) {
//    echo "<h2>Вы вышли</h2>";
//}else{
//    echo "<h2>Что-то пошло не так...</h2>";
//    echo "<p>$response</p>";
//}

//unset($_COOKIE['https://www.instagram.com']);


?>

<iframe src="https://www.instagram.com/accounts/logout" hidden>
    Ваш браузер не поддерживает плавающие фреймы!
</iframe>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <h2>Вы вышли!</h2>
    <h3>Авторизуйтесь...<h3/>
</div>


<script>
    function deleteCookie(name) {
        var date = new Date(); // Берём текущую дату
        date.setTime(date.getTime() - 1); // Возвращаемся в "прошлое"
        document.cookie = name += "=; expires=" + date.toGMTString(); // Устанавливаем cookie пустое значение и срок действия до прошедшего уже времени
    }

    deleteCookie("accessToken");
</script>
