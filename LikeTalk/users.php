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
                <div class="user__wrapper">
                    <div class="user__header">
                        <?php
                            include_once "php/config.php";
                            $sql = mysqli_query($conn, "SELECT * FROM user_list WHERE unique_id = {$_SESSION['unique_id']}");

                            if(mysqli_num_rows($sql) > 0) {
                                $row = mysqli_fetch_assoc($sql);
                            }
                        ?>
                        <div class="content">
                            <img src="img/<?php echo $row['img']?>"/>
                            <div class="user__detail">
                                <span><a href="user_profile.php?user_id=<?php echo $row['unique_id']?>"><?php echo $row['lname']?>님</a></span>
                                <p><?php echo $row['status']?></p>
                            </div>
                        </div>
                        <a class="logout__btn" href="php/logout.php?logout_id=<?php echo $row['unique_id']?>">로그아웃</a>
                    </div>

                    <div class="search">
                        <span class="text">원하는 유저를 선택하여 채팅을 시작해보세요!</span>
                        <input type="text" placeholder="찾고싶은 유저를 검색해보세요!" />
                        <button><i class="fas fa-search"></i></button>
                    </div>

                    <div class="user__list">
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="js/users.js"></script>
    <script src="https://kit.fontawesome.com/ef8b1ace87.js" crossorigin="anonymous"></script>
</body>

</html>