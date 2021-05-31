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
                <form action="searchBoard.php" name="tableSearch" method="post">
                  <fieldset>
                    <legend class="sr-only">게시판 검색 영역입니다.</legend>
                    <select name="searchOption" id="searchOption" class="form-select">
                      <option value="title">제목</option>
                      <option value="content">내용</option>
                      <option value="tandc">제목과 내용</option>
                      <option value="torc">제목 또는 내용</option>
                    </select>
                    <input type="search" name="searchKeyword" class="form-search" placeholder="검색어를 입력하세요" arial-label="search">
                    <button type="submit" class="form-btn">검색</button>
                    <a href="writeBoard.php" class="form-btn black" role="button">글쓰기</a>
                  </fieldset>
                </form>
              </div>
              <!-- <div class="search">
                <label for="srh">SEARCH</label>
                <input type="text" name="srh" id="search">
              </div> -->
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
  //SELECT 필드명 FROM 테이블명 LIMIT
  //레코드 불러오기
  $numView = 10;
  $numStart = ($numView * $page) - $numView;

  //myBoard1과 myMember 1JOIN연결: SELECT 필드명 FROM 테이블명 앨리어스 JOIN 연결할 테이블명 앨리어스 ON(조건문)
  //정렬: SELECT 필드명 FROM 테이블명 ORDER BY 정렬기준 필드명 DESC 또는 ASC

  $sql = "SELECT b.boardID, b.boardTitle, m.youNickName, b.regTime FROM ";
  $sql .= "myBoard1 b JOIN myMember1 m ON(m.memberID = b.memberID) ORDER BY boardID ";
  $sql .="DESC LIMIT {$numStart},{$numView}";

  $result = $dbConnect -> query($sql);

  if($result){
    $boardCount = $result -> num_rows;

    //갯수만큼 뿌려주기
    if($boardCount > 0){
      for($i=1; $i <= $boardCount; $i++){
        //결과값을 $boardInfo 에 배열로 가져오기
        $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);

        // echo "<pre>";
        // var_dump($boardInfo);
        // echo "</pre>";
        echo"<tr>";
        echo"<td>".$boardInfo['boardID']."</td>";
        echo "<td><a href='viewBoard.php?boardID={$boardInfo['boardID']}'>" .$boardInfo['boardTitle']. "</a></td>";
        echo "<td>" .$boardInfo['youNickName']."</td>";
        echo "<td>" .date('Y-m-d H:i',$boardInfo['regTime'])."</td>";        
        echo "</tr>";
      }
    }else{
      echo "<tr><td colspan ='4'>게시글이 없습니다.</td></tr>";
      exit;
    }
  }else{
    echo "에러발생:관리자에게 문의하세요";
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