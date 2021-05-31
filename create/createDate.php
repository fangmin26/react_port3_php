<?php
  include '../connect/connect.php';
  include '../connect/session.php';

  for($i=1; $i <= 40; $i++){
    $regTime = time();

    $sql = "INSERT INTO myBoard1(memberID, boardTitle, boardContent, regTime) ";
    //VALUES(1,'') 1은 첫번빼 보드 아이디를 의미

    $sql .="VALUES(1,'{$i}번째 타이틀입니다.','{$i}번째 게시글입니다.{$i}번째 게시글입니다.{$i}번째 게시글입니다.{$i}번째 게시글입니다.','{$regTime}')";

    $result = $dbConnect -> query($sql);

    // if($result){
    //   echo "good";
    // }else{
    //   echo "false";
    // }

  }
?>