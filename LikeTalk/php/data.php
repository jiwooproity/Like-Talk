<?php
    while($row = mysqli_fetch_assoc($sql)) {
        $sql_message = "SELECT * FROM messages WHERE (incoming_id = {$row['unique_id']}
                        OR outgoing_id = {$row['unique_id']}) AND (incoming_id = '{$outgoing_id}'
                        OR outgoing_id = '{$outgoing_id}') ORDER BY msg_id DESC LIMIT 1";

        $query_message = mysqli_query($conn, $sql_message);
        $row_message = mysqli_fetch_assoc($query_message);

        if(mysqli_num_rows($query_message) > 0) {
            $result = $row_message['msg'];
             
        } else {
            $result = "대화 내용이 없습니다.";
        }

        (strlen($result) > 28) ? $msg = mb_substr($result, 0, 28, 'utf-8')."..." : $msg = $result;

        ($outgoing_id == $row_message['outgoing_id']) ? $you = "나: " : $you = "";
        ($row['status'] == "Offline") ? $offline = "offline" : $offline = "";

        $output .= '<a href="chat.php?user_id=' . $row['unique_id'] . '">
                    <div class="user__list__content">
                        <img src="img/' . $row['img'] . '" alt="" />
                        <div class="user__list__detail">
                            <span>' . $row['fname'] . " " . $row['lname'] . '</span>
                            <p>' . $you . $msg . '</p>
                        </div>
                    </div>
                    <div class="status-dot ' . $offline . '">
                        <i class="fas fa-circle"></i>
                    </div>
                </a>';
    }
?>