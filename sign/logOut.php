
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
  <link rel="stylesheet" href="../assets/css/indexlogin.css" />
</head>

<body>
  <!-- <div id="scroll">0</div> -->

  <!--header-->
  <?php
    include '../component/header.php';
  ?>
  <!--//header-->
  <main id="contents">
    <section id="section1">
      <div class="container">
        <div class="sec1">
          <h2>LOG'OUT</h2>
        </div>
      </div>
    </section>
    <!--//section1-->
    <section id="section2">
      <div class="container">
        <div class="sec2">
          <?php
          include '../connect/session.php';
        
          unset($_SESSION['memberID']);
          unset($_SESSION['youNickName']);

          echo "<div class='out'>로그아웃 되었습니다.<br/> <a href='../pages/index.html'>ABOUT ME로 이동하기</a></div>";
          ?>
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
  </main>
  <!--//contents-->
  <!--script-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="../assets/js/headerindex.js"></script>
  <script src="../assets/js/indexlogin.js"></script>
</body>

</html>