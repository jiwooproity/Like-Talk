<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output = "";
    
    //$sql = mysqli_query($conn, "SELECT * FROM user_list
    //                            WHERE NOT unique_id = '{$outgoing_id}'
    //                            AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%')");

    // 2021.12.10 추가 - 풀네임으로도 검색 가능
    $sql = mysqli_query($conn, "SELECT * FROM user_list
                        WHERE NOT (unique_id = {$outgoing_id})
                        AND CONCAT(fname, lname) LIKE '%{$searchTerm}%';");

    if(mysqli_num_rows($sql) > 0) {
        include "data.php";
    } else {
        $output .= '<div class="none__text">
                        <span>찾으시는 유저가 존재하지 않습니다.</span>
                    </div>';
    }

    echo $output;
?>