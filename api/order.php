<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$name = $request->name;
$phone = $request->phone;
$model = $request->model;
$color = $request->color;
$price = $request->price;
$forsend_html= "Новый заказ <br>" . 
             "Имя: ".$name. "<br>" . 
             "Телефон: ".$phone. "<br>".
             "Модель машины: ".$model. "<br>" . 
             "Цвет: ".$color. "<br>".
             "Цена (посуточно): ".$price. "<br>";


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@sokkofood.kz>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

// echo json_encode(array($model, $color, $price, $name, $phone));

mail("sokkofood@bk.ru","Заказ",$forsend_html, $headers);

