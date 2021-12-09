<?php
    include_once "php/header.php";
?>
<body>
    <div class="wrapper">
        <section class="form__login">
            <?php
                include_once "php/mac_header.php";
            ?>
            <div class="media__height">
                <form action="#">
                    <div class="error__text"></div>
                    <div class="field">
                        <label>Email</label>
                        <input name="email" type="email" placeholder="이메일을 입력해주세요." />
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <input name="password" type="password" placeholder="비밀번호를 입력해주세요." />
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field">
                        <input class="submit" type="submit" value="로그인" />
                    </div>
                </form>
                <div class="link">
                    <span>아이디가 없으신가요?</span>
                    <a href="index.php">회원가입</a>
                </div>
            </div>
        </section>
    </div>

    <script src="js/login.js"></script>
    <script src="https://kit.fontawesome.com/ef8b1ace87.js" crossorigin="anonymous"></script>
</body>

</html>