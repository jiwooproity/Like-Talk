<?php
    include_once "config.php";
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output = "";
    
    $sql = mysqli_query($conn, "SELECT * FROM user_list WHERE fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%'");

    if(mysqli_num_rows($sql) > 0) {
        include "data.php";
    } else {
        $output .= '<div class="none__text">
                        <span>찾으시는 유저가 존재하지 않습니다.</span>
                    </div>';
    }

    echo $output;
?>