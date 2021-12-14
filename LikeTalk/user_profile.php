<?php
    include_once "php/header.php";
?>
<body>
    <div class="wrapper">
        <section class="form__signup">
            <?php
                include_once "php/mac_header.php";
            ?>
            <div class="media__height">
                <form action="#" name="register__form" enctype="multipart/form-data">
                    <?php
                        include_once "php/config.php";
                        $sql = mysqli_query($conn, "SELECT * FROM user_list WHERE unique_id='{$_GET['user_id']}'");

                        if(mysqli_num_rows($sql) > 0) {
                            $profile = mysqli_fetch_assoc($sql);
                        }
                    ?>
                    <div class="error__text"></div>
                    <div class="profile__field">
                        <div class="profile__frame">
                            <label class="input__profile" for="input__profile">
                                <img class="preview__profile" id="preview__profile" src="img/<?php echo $profile['img']?>">
                            </label>
                            <div class="delete__frame">
                                <span>삭제</span>
                            </div>
                            <input id="input__profile" accpet="image/*" name="image" type="file" onchange="readURL(this)" onchangerequired />
                            <label>프로필</label>
                        </div>
                    </div>
                    <div class="field">
                        <label>First Name</label>
                        <input name="fname" type="text" placeholder="성을 입력해주세요." value="<?php echo $profile['fname']?>" required />
                    </div>
                    <div class="field">
                        <label>Last Name</label>
                        <input name="lname" type="text" placeholder="이름을 입력해주세요." value="<?php echo $profile['lname']?>" required />
                    </div>
                    <div class="field">
                        <label>Email</label>
                        <input name="email" type="text" placeholder="이메일을 입력해주세요." value="<?php echo $profile['email']?>" required />
                    </div>
                    <div class="field">
                        <input class="submit" type="submit" value="프로필 변경" />
                    </div>
                </form>
                <div class="link">
                </div>
            </div>
        </section>
    </div>
    <script src="https://kit.fontawesome.com/ef8b1ace87.js" crossorigin="anonymous"></script>
</body>

</html>