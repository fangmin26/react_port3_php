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
  <section id="contents">
    <section id="section1">
      <div class="container">
        <div class="sec1">
          <h2>BOARD</h2>
        </div>
      </div>
    </section>
    <!--//section1-->
    <?php
    if(isset($_GET['page'])){
      $page = (int) $_GET['page'];
      // echo $page;
    }else{
      $page = 1;
    }
    ?>
    <?php
      include '../board/pagination.php';
    ?>
    <!--//list-->
    <section id="section2">
      <div class="container">
        <div class="sec2">
          <div class="board">
            <div class="listSearch">
<?php
echo "<h2>Current Page".$page."</h2>";
?>
              <div class="search">
                <a href="Board.php" class="form-btn black">목록보기</a>
              </div>
            </div>
            <!--//listSearch-->
            <div class="listTable">
              <table class="table">
                <colgroup>
                  <col style="width:10%">
                  <col style="width:70%">
                  <col style="width:10%">
                  <col style="width:10%">
                </colgroup>
                <thead>
                  <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>등록자</th>
                    <th>등록일</th>
                  </tr>
                </thead>
                <tbody>


                <?php
  $searchKeyword = $dbConnect -> real_escape_string($_POST['searchKeyword']);
  $searchOption =$dbConnect -> real_escape_string($_POST['searchOption']);

  if($searchKeyword =='' || $searchKeyword == null){
    echo "검색어가 없습니다.";
    exit;
  }

  //검색하는 sql문 : switch
  switch($searchOption){
    case 'title':
      // break;
    case 'content':
      // break;
    case 'tandc':
      // break;
    case 'torc':
        break;
    default:
      echo "검색 옵션을 선택해주세요!";
        exit;
        break;
  }
  //select 데이터불러오기
  //% 앞뒤% 어떤테스트가 들어가도 상관없이 LIKE 찾아라
  // "SELECT b.boardID, b.boardTitle, b.boardContent, m.youNickName, b.regTime FROM myBoard6 b JOIN myMember6 m ON (m.memberID = b.memberID) WHERE b.boardTitle LIKE '%{$searchKeyword}%'";
  // "SELECT b.boardID, b.boardTitle, b.boardContent, m.youNickName, b.regTime FROM myBoard6 b JOIN myMember6 m ON (m.memberID = b.memberID) WHERE b.boardContent LIKE '%{$searchKeyword}%'";
  // "SELECT b.boardID, b.boardTitle, b.boardContent, m.youNickName, b.regTime FROM myBoard6 b JOIN myMember6 m ON (m.memberID = b.memberID) WHERE b.boardTitle LIKE '%{$searchKeyword}%' AND b.boardContent LIKE '%{$searchKeyword}%'";
  // "SELECT b.boardID, b.boardTitle, b.boardContent, m.youNickName, b.regTime FROM myBoard6 b JOIN myMember6 m ON (m.memberID = b.memberID) WHERE b.boardTitle LIKE '%{$searchKeyword}%' OR b.boardContent LIKE '%{$searchKeyword}%'";

  $sql = "SELECT b.boardID, b.boardTitle, b.boardContent, m.youNickName, b.regTime FROM myBoard1 b JOIN myMember1 m ON (m.memberID = b.memberID)" ;

  switch($searchOption){
    case 'title' :
      $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%'";
      break;
    case 'content' :
      $sql .= "WHERE b.boardContent LIKE '%{$searchKeyword}%'";
      break;
    case 'content' :
      $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' AND b.boardContent LIKE '%{$searchKeyword}%'";
      break;
    case 'content' :
      $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' OR b.boardContent LIKE '%{$searchKeyword}%'";
      break;
  }

  $result = $dbConnect -> query($sql);

  if($result){
    $boardCount = $result -> num_rows;
    if($boardCount > 0){
      for($i=1; $i <=$boardCount; $i++){
        $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
        echo"<tr>";
        echo"<td>".$boardInfo['boardID']."</td>";
        echo"<td><a href='viewBoard.php?boardID={$boardInfo['boardID']}'>" .$boardInfo['boardTitle']. "</a></td>";
        echo"<td>".$boardInfo['youNickName']."</td>";
        echo"<td>".date('Y-m-d H:i', $boardInfo['regTime'])."</td>";
        echo"</tr>";        
      }
    } else{
      echo "<tr><td colspan='4'>{$searchOption}가 없습니다.</td></tr>";
    }
  } else{
    echo "에러발생:관리자에게 문의하세요 !";
  }

?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!--//listTable-->
</section>

<!--//section2 -->
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