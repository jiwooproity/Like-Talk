<?php 
    session_start();
    include_once "config.php"; //데이터베이스 연결

    $fname = mysqli_real_escape_string($conn, $_POST['fname']); // 성
    $lname = mysqli_real_escape_string($conn, $_POST['lname']); // 이름
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);
    $pwdConfirm = mysqli_real_escape_string($conn, $_POST['password__confirm']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if(!empty($fname) && !empty($lname) && !empty($pwd) && !empty($pwdConfirm) && !empty($email)) {
        if($pwd == $pwdConfirm) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $sql = mysqli_query($conn, "SELECT email FROM user_list WHERE email = '{$email}'");
                if(mysqli_num_rows($sql) > 0) {
                    echo "이미 가입된 이메일입니다.";
                } else {
                    $imgsizecheck = (string)$_FILES['image']['name'];
                    if($imgsizecheck != "") {
                        $img_name = $_FILES['image']['name']; // 이미지 이름 저장
                        $img_type = $_FILES['image']['type']; // 이미지 타입 저장 * png, jpeg, jpg 등..
                        $tmp_name = $_FILES['image']['tmp_name']; // 서버에 임시 저장

                        // ex) 소지우.jpg에서 explode로 .을 제외해주고 ["소지우", "jpg"] 로 나눠준다.
                        $img_explode = explode('.', $img_name);

                        // ["소지우", "jpg"]에서 end 함수로 배열의 끝 jpg 타입 이름을 가져와준다.
                        $img_ext = end($img_explode);

                        $extensions = ['png', 'jpeg', 'jpg', 'gif'];

                        //$extensions에 있는 타입 중 하나라도 매치되면 다음으로
                        if(in_array($img_ext, $extensions) === true) { 
                            $time = time();
                            $new_img_name = $time.$img_name;

                            if(move_uploaded_file($tmp_name, "../img/".$new_img_name)) {
                                $status = "Online";
                                //시간을 이용한 랜덤 아이디 지정
                                $random_id = rand(time(), 10000000); 

                                $sql2 = mysqli_query($conn, "INSERT INTO user_list (unique_id, fname, lname, pwd, email, img, status)
                                                    VALUES ({$random_id}, '{$fname}', '{$lname}', '{$pwd}', '{$email}', '{$new_img_name}', '{$status}')");

                                if($sql2) {
                                    $sql3 = mysqli_query($conn, "SELECT * FROM user_list WHERE email = '{$email}'");
                                    if(mysqli_num_rows($sql3) > 0) {
                                        $row = mysqli_fetch_assoc($sql3);
                                        $_SESSION['unique_id'] = $row['unique_id'];

                                        echo "success";
                                    }
                                } else {
                                    echo "어디에선가 오류가 발생했어요!!";
                                }
                            }

                        } else {
                            echo "이미지가 'PNG, JEPG, JPG, GIF' 타입이 아닙니다.";
                        }

                    } else {
                        $new_img_name = "none_profile.jpg";
                        $status = "Online";
                        $random_id = rand(time(), 10000000); //시간을 이용한 랜덤 아이디 지정

                        $sql2 = mysqli_query($conn, "INSERT INTO user_list (unique_id, fname, lname, pwd, email, img, status)
                                                    VALUES ({$random_id}, '{$fname}', '{$lname}', '{$pwd}', '{$email}', '{$new_img_name}', '{$status}')");

                        if($sql2) {
                            $sql3 = mysqli_query($conn, "SELECT * FROM user_list WHERE email = '{$email}'");
                            if(mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id'];

                                echo "success";
                            }
                        } else {
                            echo "어디에선가 오류가 발생했어요!!";
                        }
                    }
                }

            } else {
                echo "이메일 형식이 올바르지 않습니다.";
            }

        } else {
            echo "비밀번호가 일치하지 않습니다.";
        }

    } else {
        echo "모든 필수 입력란을 입력해주세요!";
    }
