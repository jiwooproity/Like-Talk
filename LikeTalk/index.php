<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>LikeTalk</title>
    </head>
    <body>
        <div class="wrapper">
            <section class="form__signup">
                <header class="header">
                    <div class="logo">
                        <span>LIKETALK</span>
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="mac">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </header>
                <div class="header__bottom">
                    <div class="header__bottom__icon">
                        <i class="fas fa-arrow-left"></i>
                        <i class="fas fa-arrow-right"></i>
                        <i class="fas fa-undo-alt"></i>
                    </div>
                    <div class="header__bottom__link">
                        <div class="header__bottom__detail">
                            <div>
                                <i class="fas fa-lock"></i>
                                <span>https://www.liketalk.co.kr/</span>
                            </div>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <div class="header__bottom__user">
                        <i class="fas fa-user-circle"></i>
                        <i class="fas fa-ellipsis-v"></i>
                    </div>
                </div>
                <div class="media__height">
                    <form action="#">
                        <div class="error__text">에러 메세지 표시 공간</div>
                        <div class="field">
                            <label>First Name</label>
                            <input type="text" placeholder="성을 입력해주세요."/>
                        </div>
                        <div class="field">
                            <label>Last Name</label>
                            <input type="text" placeholder="이름을 입력해주세요."/>
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <input type="password" placeholder="비밀번호를 입력해주세요."/>
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="field">
                            <label>Password Confirm</label>
                            <input type="password" placeholder="비밀번호를 한번 더 입력해주세요."/>
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="field">
                            <label>Email</label>
                            <input type="email" placeholder="이메일을 입력해주세요."/>
                        </div>
                        <div class="field">
                            <label>Profile</label>
                            <input type="file"/>
                        </div>
                        <div class="field">
                            <input type="submit" value="회원가입"/>
                        </div>
                    </form>
                    <div class="link">
                        <span>이미 가입하셨습니까?</span>
                        <a href="#">로그인</a>
                    </div>
                </div>
            </section>
        </div>

        <script src="js/password-show-hide.js"></script>
        <script src="https://kit.fontawesome.com/ef8b1ace87.js" crossorigin="anonymous"></script>
    </body>
</html>