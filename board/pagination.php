<section id="listPage">
  <div class="row">
      <?php
      //집계함수 count
      $sql = "SELECT count(boardID) FROM myBoard1";
      $result = $dbConnect -> query($sql);
      $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
      $boardTotalCount = $boardTotalCount['count(boardID)'];
      // echo $boardTotalCount;

      //총페이지수
      $numView = 10; //pagination이 이 board.php 위에 있어서 다시부름
      $boardTotalPage = ceil($boardTotalCount / $numView);
      ?>
    <ul class="pagination">

    <?php

    //현재 페이지를 기준으로 보여주고 싶은 갯수
    $pageView = 3;
    $startPage = $page - $pageView;
    $endPage = $page + $pageView;

    //처음 페이지 초기화
    if( $startPage < 1 ) $startPage = 1;

    //마지막 페이지 초기화
    if( $endPage > $boardTotalPage ) $endPage = $boardTotalPage;

    //처음 페이지
    if($page != 1){
      echo "<li><a href='Board.php?page=1'>처음으로</a></li>";
    }
    //이전 페이지
    if( $page != 1 ) {
        $prevPage = $page - 1;
        echo "<li><a href='Board.php?page={$prevPage}'>이전</a></li>";
    }

    //페이지
    for ( $i=$startPage; $i<=$endPage; $i++ ){
        $active = '';
        if( $i == $page ) $active = 'active';

        echo "<li class='{$active}'><a href='Board.php?page={$i}'>{$i}</a></li>";
    }

    //다음 페이지 
    if($page != $endPage){
      $nextPage = $page +1;
      echo "<li><a href='Board.php>page={$nextPage}'>다음</a></li>";
    }
    //마지막 페이지
    if($page != $endPage){
      echo "<li><a href='Board.php?page={$boardTotalPage}'>마지막으로</a></li>";
    }

?>
 
    </ul>
  </div>
</section>