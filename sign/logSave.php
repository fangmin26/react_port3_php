
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
          <h2>LOG'IN</h2>
        </div>
      </div>
    </section>
    <!--//section1-->
    <section id="section2">
      <div class="container">
        <div class="sec2">

        <?php
            include '../connect/session.php';
            include '../connect/connect.php';

            $userEmail = $_POST['userEmail'];
            $userPW = $_POST['userPW'];

            function goSignUpPage($alert){
              echo "<div class='signInfo'><p>{$alert}</p></div>";
              return;
            }

            //이메일 검사 //요즘엔 다되어있는디 익스플로러같이 오래된 브라우저때문에
            if( !filter_var($userEmail, FILTER_VALIDATE_EMAIL) ){
              goSignUpPage("이메일이 잘못되었습니다. <br> 올바른 이메일을 적어주세요!");
              exit;
            }

            //비밀번호검사
            if( $userPW == null || $userPW ==''){
              goSignUpPage("비밀번호를 입력해주세요");
              exit;
            }

            //데이터입력 ->데이터검사 -->데이터보내기
            //memberID는 자동으로 생성
            $sql = "SELECT youEmail, youPw, youNickName, memberID FROM myMember1 ";
            $sql .= "WHERE youEmail = '{$userEmail}' AND youPw = '{$userPW}'";
            //위의 값을 불러오는것임 dbConnect ->query로 sql로 전송
            $result = $dbConnect ->query($sql);

            if($result){
              if($result -> num_rows == 0){
                goSignUpPage('로그인정보가 없습니다. 회원가입해주세요');
              }else{
                //쿼리문에서 데이터를 배열로 가져올때 (내림차순)사용
                $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
                $_SESSION['memberID'] = $memberInfo['memberID'];
                $_SESSION['youNickName'] = $memberInfo['youNickName'];
                //바로다음으로넘기기
                //링크 잘못걸려서 404문제가 있었음
                Header("Location:http://minji2260.dothome.co.kr/react_port3_php/pages/about.html");
              }
            }else{
              goSignUpPage('에러발생:관리자에게 문의하세요');
            }
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

</body>

</html>