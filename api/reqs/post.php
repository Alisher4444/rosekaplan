<?php 
    include "../db.php";
    include "../crop.php";
    
    if(isset($_POST['model']) && isset($_POST['year']) && isset($_POST['type'])
       && isset($_POST['color']) && isset($_POST['doors']) && isset($_POST['seats'])
       && isset($_POST['volume']) && isset($_POST['price']) && isset($_POST['cons']) && isset($_POST['oil'])
       && isset($_POST['driveu']) && isset($_POST['maxspeed']) && isset($_POST['bail'])) {
        
          $query = $conn->query("SELECT MAX(id) AS size FROM car");
          $row=$query->fetch_object();
          $add=$row->size+1;
    	  $temp = explode(".",$_FILES["img"]["name"]);
    		  
    	  $source_img =  "../../img/old_cars/car"."_".$add.'.'.end($temp);
    	  move_uploaded_file($_FILES['img']['tmp_name'], $source_img);
          $destination_img = "../../img/cars/car"."_".$add.'.'.end($temp);
          $d = compress($source_img, $destination_img, 70);
          move_uploaded_file($_FILES['img']['tmp_name'], $d);
          unlink($source_img);
          
    	  $model = $_POST['model'];
          $year = $_POST['year'];
      	  $price = $_POST['price'];
      	  $type = $_POST['type'];
    	  $color = $_POST['color'];
    	  $doors = $_POST['doors'];
    	  $seats = $_POST['seats'];
    	  $volume = $_POST['volume'];
    	  $cons = $_POST['cons'];
    	  $oil = $_POST['oil'];
    	  $driveu = $_POST['driveu'];
          $speed = $_POST['maxspeed'];
          $bail = $_POST['bail'];
          $sql = "INSERT INTO car(id, model, year, color, price, type, doors, seats, volume, maxspeed, cons, oil, driveu, img, bail)
                  VALUES(NULL,\"".$model."\",\"".$year."\", \"".$color."\", \"".$price."\", 
                  \"".$type."\", \"".$doors."\",\"".$seats."\",\"".$volume."\",\"".$speed."\",
                  \"".$cons."\", \"".$oil."\",\"".$driveu."\",\"".$d."\", \"".$bail."\")";
                  
          $conn->query($sql);
          
          header('Location: /admin');
          
      } else {
          header('Location: /admin');
          // echo "Error";
      }
?>