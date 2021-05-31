<?php
  include '../connect/session.php';
  include '../connect/connect.php';
  include '../connect/checkSession.php';
?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio 게시판</title>

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
  <link rel="stylesheet" href="../assets/css/board.css" />

  <!--script-->
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
  <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script defer src="../assets/js/header.js"></script>

</head>

<body>
<main>
  <!-- <div id="scroll">0</div> -->
  <!--header-->
  <?php
    include '../component/header.php';
  ?>
  <!--//header-->
  <section id = "saveBoard">
    <div class="container">
      <div class="saveBoard">

      <?php
          $boardTitle = $_POST['boardTitle'];
          $boardContent = $_POST['boardContent'];

          if($boardTitle != null && $boardTitle != ''){
            $boardTitle = $dbConnect -> real_escape_string($boardTitle);
          }
          if($boardContent != null && $boardContent != ''){
            $boardContent = $dbConnect -> real_escape_string($boardContent);
          }

          /*myBoard의 memberID 세션을 불러옴으로 위쪽에 반드시 checkSession.php추가해야
          접속이 가능*/
          $memberID = $_SESSION['memberID'];
          $regTime = time();
          //INSERT INTO 테이블명(필드명) VALUES(데이터)
          $sql = "INSERT INTO myBoard1(memberID,boardTitle,boardContent,regTime)";
          $sql .="VALUES('{$memberID}','{$boardTitle}','{$boardContent}','{$regTime}')";

          $result = $dbConnect -> query($sql);

          if($result){
            echo "<div class='info'>저장이 완료되었습니다.<a href='Board.php'>게시판 목록으로 이동</a></div>";
            exit;
          }else{
            echo "<div class='info'>저장이 실패되었습니다.<a href='writeBoard.php'>게시판 다시 작성하기</a></div>";
            exit;
          }
      ?>

      </div>
    </div>
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
  <!--//saveaBoard-->
</main>
</body>

</html>