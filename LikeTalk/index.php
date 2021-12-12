<?php
    session_start();
    if(isset($_SESSION['unique_id'])) {
        header("location: users.php");
    }
?>
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
                    <div class="error__text"></div>
                    <div class="profile__field">
                        <div class="profile__frame">
                            <label class="input__profile" for="input__profile">
                                <img class="preview__profile" id="preview__profile" src="img/none_profile.jpg">
                            </label>
                            <div class="delete__frame">
                                <span>삭제</span>
                            </div>
                            <input id="input__profile" accpet="image/*" name="image" type="file" onchange="readURL(this)" onchangerequired />
                            <label>프로필 설정</label>
                        </div>
                    </div>
                    <div class="field">
                        <label>First Name</label>
                        <input name="fname" type="text" placeholder="성을 입력해주세요." required />
                    </div>
                    <div class="field">
                        <label>Last Name</label>
                        <input name="lname" type="text" placeholder="이름을 입력해주세요." required />
                    </div>
                    <div class="field">
                        <label>Email</label>
                        <input name="email" type="text" placeholder="이메일을 입력해주세요." required />
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <input name="password" type="password" placeholder="비밀번호를 입력해주세요." required />
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field">
                        <label>Password Confirm</label>
                        <input name="password__confirm" type="password" placeholder="비밀번호를 한번 더 입력해주세요." required />
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field">
                        <input class="submit" type="submit" value="회원가입" />
                    </div>
                </form>
                <div class="link">
                    <span>이미 가입하셨습니까?</span>
                    <a href="login.php">로그인</a>
                </div>
            </div>
        </section>
    </div>

    <script src="js/signup.js"></script>
    <script src="js/password-show-hide.js"></script>
    <script src="https://kit.fontawesome.com/ef8b1ace87.js" crossorigin="anonymous"></script>
</body>

</html>