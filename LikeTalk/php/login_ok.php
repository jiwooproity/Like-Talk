<?php
    session_start();
    include_once "config.php"; //데이터베이스 연결

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($email) && !empty($pwd)) {
        $sql = mysqli_query($conn, "SELECT * FROM user_list WHERE email = '{$email}' AND pwd = '{$pwd}'");

        if(mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['unique_id'] = $row['unique_id'];
            echo "success";

        } else {
            echo "이메일 또는 비밀번호가 다릅니다.";
        }

    } else {
        echo "아이디와 비밀번호를 입력해주세요!";
    }
?>