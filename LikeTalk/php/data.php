<?php
    while($row = mysqli_fetch_assoc($sql)) {
        $output .= '<a href="chat.php?user_id=' . $row['unique_id'] . '">
                    <div class="user__list__content">
                        <img src="img/' . $row['img'] . '" alt="" />
                        <div class="user__list__detail">
                            <span>' . $row['fname'] . " " . $row['lname'] . '</span>
                            <p>message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fas fa-circle"></i>
                    </div>
                </a>';
    }
?>