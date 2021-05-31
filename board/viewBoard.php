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
  <link rel="stylesheet" href="../assets/css/board.css" />

  <!--script-->
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
  <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script defer src="../assets/js/header.js"></script>
  <script defer src="../assets/js/board.js"></script>
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
      <section id="board-cont">
        <div class="container">
        <div class="listBoard">
                <h2>게시판입니다.</h2>
                <div class="listTable">
                    <table class="table">
                        <colgroup>
                            <col style="width: 20%">
                            <col style="width: 80%">
                        </colgroup>
                        <tbody>
    <?php
      //버그때문에 하단과 같은if 문
      if(isset($_GET['boardID'])  && (int) $GET['boardID'] >0);
      $boardID = $_GET['boardID'];
      $sql = "SELECT b.boardTitle , b.boardContent , m.youNickName , b.regTime ";
      $sql .=  "FROM myBoard1 b JOIN myMember1 m ON (b.memberID = m.memberID) ";
      //join문에서 조건한번더달기
      $sql .= "WHERE b.boardID = {$boardID}";
      $result = $dbConnect -> query($sql);

      if($result){
        $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
        echo "<tr><th>제목</th><td>".$boardInfo['boardTitle']."</td></tr>";
        echo "<tr><th>글쓴이</th><td>".$boardInfo['youNickName']."</td></tr>";
        echo "<tr><th>등록일</th><td>".date('Y-m-d H:i', $boardInfo['regTime'])."</td></tr>";
        echo "<tr><th>내용</th><td>".$boardInfo['boardContent']."</td></tr>";
      }
    ?>                                
                          <!-- <tr>
                            <th>제목</th>
                            <th>제목11</th>
                          </tr> -->
                        </tbody>
                    </table>
                </div>
                <div class="listSearch">
                  <div class="search">
                    <a href="Board.php" class="form-btn black mt20">목록보기</a>
                  </div>
                </div>
            </div>
        </div>
    </section>
    <!--//board-cont-->


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