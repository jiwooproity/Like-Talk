<?php 
    session_start();
    include_once "config.php"; //데이터베이스 연결

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if(!empty($fname) && !empty($lname) && !empty($email)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = mysqli_query($conn, "SELECT * FROM user_list WHERE email='{$email}'");
            if(mysqli_num_rows($sql) > 0) {
                echo "이미 존재하는 이메일입니다.";
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
                            $update_query = mysqli_query($conn, "UPDATE user_list SET fname='{$fname}', lname='{$lname}', email='{$email}', img='{$new_img_name}' WHERE unique_id={$_SESSION['unique_id']}");

                            if($update_query) {
                                echo "success";
                            }

                        } else {
                            echo "프로필 업데이트를 실패했습니다.";
                        }

                    } else {
                        echo "이미지가 'PNG, JEPG, JPG, GIF' 타입이 아닙니다.";
                    }

                } else {
                    $img_query = mysqli_query($conn, "SELECT * FROM user_list WHERE unique_id='{$_SESSION['unique_id']}'");

                    if(mysqli_num_rows($img_query)) {
                        $rows = mysqli_fetch_assoc($img_query);

                        $new_img_name = $rows['img'];

                        $update_query = mysqli_query($conn, "UPDATE user_list SET fname='{$fname}', lname='{$lname}', email='{$email}', img='{$new_img_name}' WHERE unique_id={$_SESSION['unique_id']}");

                        if($update_query) {
                            echo "success";
                        }
                        
                    } else {
                        "에러가 발생했습니다.";
                    }
                }
            }
        } else {
            echo "이메일 형식이 올바르지 않습니다.";
        }

    } else {
        echo "모든 필수 입력란을 입력해주세요!";
    }
?>
