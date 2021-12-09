<?php
    //데이터베이스 연동 PHP
    $conn = mysqli_connect("127.0.0.1", "root", "jiwooity1", "chat");

    if(!$conn) {
        echo "Database connected" . mysqli_connect_error();
    }
?>