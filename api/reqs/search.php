<?php 
    include "../db.php";
    
    $name = $_GET['name'];
    
    $sql = "SELECT * FROM car WHERE model LIKE '" . $name . "%'";
    
    $result = $conn->query($sql);
    $array = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
    }

    echo json_encode($array);
?>