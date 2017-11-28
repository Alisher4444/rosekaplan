<?php 
    include "../db.php";
    
    $page = intval($_GET['page']);
    $page = $page*5;
    $page2 = 5;
    
    
    
    $sql = "SELECT * FROM car LIMIT " . $page . ", " . $page2;
    
    $result = $conn->query($sql);
    $array = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
    }

    $sql = "SELECT COUNT(*) AS size FROM car";

    $result = $conn->query($sql);

    if($row = $result->fetch_assoc()) {
       $size = $row["size"];
    }

    $size = ceil($size/5);
    echo json_encode(array($array, $size, $page, $page2));
?>