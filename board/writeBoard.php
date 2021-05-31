<?php
  include '../connect/session.php';
  include '../connect/connect.php';
  // include '../connect/checkSession.php';
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
  <section id = "writeBoard">
    <div class="container">
      <div class="writeBoard">
        <h2>게시글을 작성해주세요!</h2>
        <form action="saveBoard.php" name="boardWrite" method ="post">
          <fieldset> 
            <legend class="sr-only">게시판 작성 영역입니다.</legend>
            <div>
              <label for="boardTitle">제목</label>
              <input type="text" name ="boardTitle" id="boardTitle" class="title-text" require autofocus placeholder="제목을 작성해주세요" />
            </div>
            <div>
              <label for="boardContent">내용</label>
              <textarea name="boardContent" id="boardContent" class="title-text"rows="13" require placeholder ="내용을 작성해주세요"></textarea>
            </div>
          </fieldset>
          <button class="writeBoardBtn" type="submit" value="저장하기">저장하기</button>
        </form>
      </div>
    </div>
  </section>
  <!--//writeBoard-->
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