
<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>

  <!--icon-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!--font-->
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway+Dots&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
    rel="stylesheet">
  <!--style-->
  <link rel="stylesheet" href="../assets/css/reset.css" />
  <link rel="stylesheet" href="../assets/css/login.css" />

    <!--script-->
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
  <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script defer src="../assets/js/header.js"></script>
  <script defer src="../assets/js/login.js"></script>
</head>

<body>
<main id="root" class="lock">
    <!--loader-->
    <div class="loader loader--active">

      <div class="loader__tile"></div>
      <div class="loader__tile"></div>
      <div class="loader__tile"></div>
      <div class="loader__tile"></div>
      <div class="loader__tile"></div>
    </div>
    <!--//loader-->
    <!-- <div id="scroll">0</div> -->
  <!--header-->
  <?php
    include '../component/header.php';
  ?>
  <!--//header-->
  <section id="contents">
    <section id="section1">
      <div class="container">
        <div class="sec1">
          <h2>LOG'IN</h2>
        </div>
      </div>
    </section>
    <!--//section1-->
    <section id="section2">
      <div class="container">
        <div class="sec2">
          <div class="left">
            <div class="left_inner">
              <h3>Register Your ID & PSW.</h3>
              <form name="logIn" method="post"action="logSave.php">
                <ul>
                  <li class="contact_li active">
                    <label for="userEmail">YOUR ID</label>
                    <input type="email" name="userEmail" placeholder="이메일을 적어주세요.">
                  </li>
                  <li class="contact_li">
                    <label for="userPW">PASSWORD</label>
                    <input type="password" name="userPW" placeholder="비밀번호를 적어주세요.">
                  </li>
                </ul>
              <button class="loginBTN" type="submit" value="로그인">로그인</button>
              </form>
            </div>
          </div>
          <div class="right">
            <div class="right_inner">
              <div class="right_desc">
                <span>If you do not have an existing ID, please register for a new one.</span>
                <em><a href="signIn.php">Sign-in</a></em>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--//section2-->
    <footer id="footer">
      <div class="container">
        <div class="footer">
          <ul class="study">
            <li><a href="#">Blog</a></li>
            <li><a href="#">Gitbook</a></li>
          </ul>
          <span class="IMG"></span>
          <span>ContactOn {01029693106 : Hwang Minji;}</span>
        </div>
      </div>
    </footer>
    <!--//footer-->
  </section>
  <!--//contents-->
</main>

</body>

</html>