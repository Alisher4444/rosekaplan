<?php
    include "db.php";
    
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    if(isset($request->login) && isset($request->password)) {
    	$login = $request->login;
    	$pass = $request->password;
    }

// 	echo json_encode(array($login, $pass));
    $sql = "SELECT * FROM admin";
    $result = $conn->query($sql);
    $admin_login = null;
    $admin_pass = null;
    
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $admin_login = $row['login'];
        $admin_password = $row['password'];
        
        if($admin_login == $login && $admin_password == $pass){
            session_start();
            $_SESSION["login"] = $login;
            $_SESSION["pass"] = $pass;
            echo json_encode("true");
        } else {
            echo json_encode("false");
        }
    } else {
        echo json_encode("false");
    }
    

?>