<?php
    session_start();

    if(isset($_SESSION['unique_id'])) {
        include_once "config.php";

        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";

        $sql = "SELECT * FROM messages
                LEFT JOIN user_list ON user_list.unique_id = messages.outgoing_id
                WHERE (outgoing_id = {$outgoing_id} AND incoming_id = {$incoming_id})
                OR (incoming_id = {$outgoing_id} AND outgoing_id = {$incoming_id}) ORDER BY msg_id asc";

        $query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)) {
                if($row['outgoing_id'] === $outgoing_id) {
                    $output .= '<div class="chat__outgoing">
                                    <div class="chat__outwidth">
                                        <div calss="chat__outdetail">
                                            <p>' . $row['msg'] . '</p>
                                        </div>
                                    </div>
                                </div>';
                } else {
                    $output .= '<div class="chat__incoming">
                                    <div class="chat__inwidth">
                                        <img src="img/' . $row['img'] . '">
                                        <div calss="chat__indetail">
                                            <p>' . $row['msg'] . '</p>
                                        </div>
                                    </div>
                                </div>';
                }
            }

            echo $output;
        } 

    } else {
        header("../login.php");
    }
?>