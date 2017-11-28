<?php 
 $name = htmlspecialchars($_POST['name']);
 $age = htmlspecialchars($_POST['age']);
 $phone = htmlspecialchars($_POST['phone']);
 $mail  = htmlspecialchars($_POST['mail']); 
 $level = htmlspecialchars($_POST['level']);
 $program = htmlspecialchars($_POST['program']);
 $comment = htmlspecialchars($_POST['comment']);
 
 $to  = "merekebaltabay@gmail.com" ; 

 $subject = "Заявка с сайта"; 

 $html = '<strong>Имя: </strong>'.$name.'<br/><strong>Возраст: </strong>'.$age.'<br/><strong>Телефон: </strong>'.$phone.'<br/>'; 
 $html .= '<strong>Почта: </strong>'.$mail.'<br/><strong>Уровень: </strong>'.$level.'<br/><strong>Программа: </strong>'.$program.'<br/>';
 $html .= '<strong>Примечание: </strong>'.$comment;

 $headers  = "Content-type: text/html; charset=UTF-8 \r\n"; 
 $headers .= "From: no-reply@rosekaplan.kz\r\n"; 
 $arr1 = str_split($phone);
 

 if((strlen($phone)>9 && strlen($phone)<13) && (!filter_var($email, FILTER_VALIDATE_EMAIL) === false)){
	if($arr1[0]==8 && $arr1[1]==7){
	 mail($to, $subject, $html, $headers);
	 header('Location:/success.php');
	}
 else if(($arr1[0]=='+' && $arr1[1]==7 && $arr1[2]==7) && (!filter_var($email, FILTER_VALIDATE_EMAIL) === false)){
	 mail($to, $subject, $html, $headers);
	 mail($to2, $subject, $html, $headers);
	 header('Location:/success.php');
	}
	 else {
		 echo "<script type='text/javascript'>alert('Введите правильный номер телефона!'); window.location = 'http://rosekaplan.kz'; </script>";
	}
 }
 else {
	 echo "<script type='text/javascript'>alert('Введите правильный номер телефона'); window.location = 'http://rosekaplan.kz';</script>";
 }
  exit;
?>

