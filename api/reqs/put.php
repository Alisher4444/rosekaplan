<?php
    include '../db.php';
    include "../crop.php";
    
    $id = $_POST['id'];
    $model = $_POST['model'];
  	$type = $_POST['type'];
  	$year = $_POST['year'];
  	$color = $_POST['color'];
  	$speed = $_POST['maxspeed'];
  	$cons = $_POST['cons'];
  	$driveu = $_POST['driveu'];
  	$price = $_POST['price'];
  	$oil = $_POST['oil'];
  	$doors = $_POST['doors'];
  	$seats = $_POST['seats'];
  	$volume = $_POST['volume'];
  	$bail = $_POST['bail'];
    // echo $id . ' ' . $name . ' ' . $count . ' ' . $price . ' ' . $ingredients . ' ' . $categoryId; 	
  	$sql = "SELECT img AS image FROM car WHERE id=".$id;
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        $row = $result->fetch_object();
        $img = $row->image;
        $d = $img;
    }
    // echo $d;
  	
  	$temp = explode(".",$_FILES["img"]["name"]);
    if($temp[0] != null && $temp[0] != "") {
        unlink($img);
        $source_img =  "../../img/old_cars/car"."_".$id.'.'.end($temp);
	    move_uploaded_file($_FILES['img']['tmp_name'], $source_img);
	    $destination_img = "../../img/cars/car"."_".$id.'.'.end($temp);
        $d = compress($source_img, $destination_img, 70);
        move_uploaded_file($_FILES['img']['tmp_name'], $d);
        unlink($source_img);
        echo $temp[0] . $temp[1] . '<br>';
    }
    
    // echo "asdasdasd: " . $id . " " . $name . " " . $count . " " . $price . " " . $ingredients . " " . $categoryId . " " . $d;
    
     $sql = "UPDATE car SET model='" . $model . "', type='" . $type .
             "', year=" . $year . ", color='" . $color . "', maxspeed=" . $speed . 
            ", img ='" . $d . "', cons=" . $cons . ", driveu='" . $driveu ."', price=". $price .
            ", oil=" . $oil . ", doors=" . $doors . ", seats=" . $seats . ", volume=" . $volume . ", bail=" . $bail .  " WHERE id=" . $id;
            
    $conn->query($sql);
    
    // echo $d;
    
    header('Location: /admin.php');
?>