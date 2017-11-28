<!DOCTYPE html>
<html ng-app="rosekaplan">
<head>

	<title>Контакты - Rose Kaplan</title>
	<meta charset="utf-8">
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Exo+2&amp;subset=cyrillic" rel="stylesheet">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	
	<?php
		include "header.php";
	?>
	
<div class="contacts">
        <div class="contacts-info">
            <div><h3>Как нас найти?</h3></div>
            <div class="contacts-map">
                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A1c61c52d6c833e6bc21ecefaca3902feaa144988cfb5081332b4d8531a7c59ce&amp;source=constructor" width="100%" height="100%" frameborder="0"></iframe>
            </div>
            <div class="contacts-info-txt">
                <div><p>Контактные номера</p></div>
                <div class="contacts-tel">
                    <div><a href="tel:+7(775)2194461">+7 (775) 219-44-61</a></div>
                    <div><a href="tel:+7(7262)348182">+7 (7262) 34-81-82</a></div>
                    <div><a href="tel:+7(7262)348139">+7 (7262) 34-81-39</a></div>
                </div>
                <div class="col-8 col-md-12"><p>г.Тараз ул.Жубанышева 1, (район гор. больницы)(уг.пр.Жамбыла)<br>
				БЦ "Rose Kaplan" (напротив молочной кухни), вход с Жубанышева.</p>
				<p><b>E-mail:</b> rosekaplan97@mail.ru</p>
				<p>
				Близлежащие остановки:<br>
				1. "Городская  больница", автобусы:№26, №37, №38. Троллейбусы: №26.</p>
				</div>
            </div>
        </div>   
</div>


	<?php
		include "footer.php";
	?>

	<script src="js/slick.js"></script> 
	<script src="js/script.js"></script>
	<script type="text/javascript" src="js/vendor/ng.min.js"></script>
	<script type="text/javascript" src="js/vendor/ng-route.min.js"></script>
	<script type="text/javascript" src="js/vendor/ng-cookies.min.js"></script>
	<script type="text/javascript" src="js/views/base_url.js"></script>
	<script type="text/javascript" src="js/views/contacts.js"></script>

	
</body>
</html>