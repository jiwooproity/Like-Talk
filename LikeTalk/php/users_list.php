<?php
    session_start();
    include_once "config.php";

    $sql = mysqli_query($conn, "SELECT * FROM user_list");
    $output = "";

    if(mysqli_num_rows($sql) == 0) {
        $output .= "채팅을 사용하고 있는 유저가 없습니다.";
    } else if(mysqli_num_rows($sql) > 0) {
        include "data.php";
    }
    
    echo $output;
?>