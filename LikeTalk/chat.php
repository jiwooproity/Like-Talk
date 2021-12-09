<?php
    session_start();
    if(!isset($_SESSION['unique_id'])) {
        header("location: login.php");
    }
?>
<?php
    include_once "php/header.php";
?>
<body>
    <div class="wrapper">
        <section class="users">
            <?php
                include_once "php/mac_header.php";
            ?>
            <div class="media__height">
                <div class="chat__wrapper">
                    <div class="chat__header">
                        <div class="chat__content">
                            <?php 
                                include_once "php/config.php";

                                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                                $sql = mysqli_query($conn, "SELECT * FROM user_list WHERE unique_id = '{$user_id}'");
                                if(mysqli_num_rows($sql) > 0) {
                                    $row = mysqli_fetch_assoc($sql);
                                }
                            ?>
                            <a href="users.php"><i class="fas fa-chevron-left"></i></a>
                            <img src="img/<?php echo $row['img'] ?>" />
                            <div class="user__detail">
                                <span><?php echo $row['fname'] . " " . $row['lname']?></span>
                                <p><?php echo $row['status']?></p>
                            </div>
                        </div>
                    </div>

                    <div class="chat__box">
                        <div class="chat__outgoing">
                            <div calss="chat__outdetail">
                                <p>Hello gasdasdasdasdasdsadasdsadsadd</p>
                            </div>
                        </div>
                        <div class="chat__incoming">
                            <img src="img/<?php echo $row['img']?>">
                            <div calss="chat__indetail">
                                <p>Hello World I Like Game and Programming</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="typing__area">
                    <form class="typing__form" action="#">
                        <input type="text" placeholder="메시지를 입력해주세요.">
                        <button><i class="fab fa-telegram-plane"></i></button>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <script src="js/chat.js"></script>
    <script src="https://kit.fontawesome.com/ef8b1ace87.js" crossorigin="anonymous"></script>
</body>

</html>