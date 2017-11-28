<?php
    include "../db.php";
    $id = $_GET["id"];
    $sql = "SELECT img AS image FROM car WHERE id=".$id;
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        $row = $result->fetch_object();
        $img = $row->image;
        unlink($img);
        $sql = "DELETE FROM car WHERE id=".$id;
        $result = $conn->query($sql);
        echo json_encode($id);
    }
    echo json_encode(false);
    
    
    

?>

