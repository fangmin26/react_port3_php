
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
  <link rel="stylesheet" href="../assets/css/indexsignin.css" />
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
          <h2>SIGN'IN</h2>
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
                    $userName = $_POST['userName'];
                    $userNickName = $_POST['userNickName'];
                    $userPW = $_POST['userPW'];
                    $birthYear = $_POST['birthYear'];
                    $birthMonth = $_POST['birthMonth'];
                    $birthDay = $_POST['birthDay'];

                    function goSignUpPage($alert){
                      echo "<div class='signInfo'><p>{$alert}</p></div>";
                      return;
                    }

                    //이메일 검사 //요즘엔 다되어있는디 익스플로러같이 오래된 브라우저때문에
                    if( !filter_var($userEmail, FILTER_VALIDATE_EMAIL) ){
                      goSignUpPage("이메일이 잘못되었습니다. <br> 올바른 이메일을 적어주세요!");
                      exit;
                    }

                  //여기부터 유효성검사
                  //이름이 한글로 구성되어 있는지 검사(정규식표현)
                  // /^시작 $/ 끝 
                  $userNameRegPattern = '/^[가-힣]{1,}$/';
                  if( !preg_match($userNameRegPattern, $userName, $matches) ){
                      goSignUpPage("닉네임은 한글로만 입력해주세요!");
                      exit;
                  }

                  //닉네임 검사(빈칸체크)
                  if( $userNickName == null || $userNickName ==''){
                      goSignUpPage("활동에 필요한 이름을 입력해주세요");
                      exit;
                  }
                  //비밀번호검사
                  if( $userPW == null || $userPW ==''){
                    goSignUpPage("비밀번호를 입력해주세요");
                    exit;
                  }

                  //생년 검사
                  if($birthYear == 0) {
                  goSignUpPage('생년을 정확히 입력해 주세요.');
                  exit;
                  }

                  //생월 검사
                  if($birthMonth == 0) {
                      goSignUpPage('생월을 정확히 입력해 주세요.');
                      exit;
                  }

                  //생일 검사
                  if($birthDay == 0) {
                      goSignUpPage('생일을 정확히 입력해 주세요.');
                      exit;
                  }

                  $birth = $birthYear ."-". $birthMonth ."-". $birthDay;
                  //데이터입력 -->데이터가져오기(유효성) --> db에 접속(이메일유무확인,중복검사)
                  // -->이메일 없으면 회원가입 or 있으면 login으로
                  //(richclub에서 찾기)

                  //이메일중복검사
                  $isEmailCheck = false;
                  //myadmin에서 가져옴 youEmail
                  $sql = "SELECT youEmail FROM myMember1 WHERE youEmail = '{$userEmail}'";
                  $result = $dbConnect ->query($sql);

                  if($result){
                    //갯수 회원가입이 되었으면 회원가입한 횟수가 나옴
                    $count = $result ->num_rows;
                    if($count ==0){
                      $isEmailCheck = true;
                    }else{
                      goSignUpPage('이미 존재하는 이메일입니다 로그인해주세요');
                      exit; //exit : 이게 해당이 안되면 다음if문을 읽어라의미, if문을 쓸때는 else를 꼭 쓰는게 좋음
                    }
                  }else{
                    goSignUpPage('에러발생1:관리자에게 문의하세요!');
                    exit;
                  }

                  //닉네임중복검사
                  $isNickNameCheck = false;

                  $sql = "SELECT youNickName FROM myMember1 WHERE youNickName = '{$userNickName}'";
                  $result = $dbConnect ->query($sql);

                  if($result){
                    //갯수 회원가입이 되었으면 회원가입한 횟수가 나옴
                    $count = $result ->num_rows;
                    if($count == 0){
                      $isNickNameCheck = true;
                    }else{
                      goSignUpPage('이미 존재하는 닉네임입니다. 다시 입력해주세요');
                      exit; //exit : 이게 해당이 안되면 다음if문을 읽어라의미, if문을 쓸때는 else를 꼭 쓰는게 좋음
                    }
                  }else{
                    goSignUpPage('에러발생2:관리자에게 문의하세요!');
                    exit;
                  } 

            
                  //데이터 입력 -> 데이터 가져오기(post)->데이터유효성검사 ->db 이메일 중복검사 
                  //->db 접속해서 닉네임 중복검사 ->중복검사 이상없음 -> 데이터 db에 보내기
                 
                  if($isEmailCheck == true && $isNickNameCheck == true){ //이메일과 닉네임 중복되지x
                    $regTime = time();
                    $sql = "INSERT INTO myMember1(youEmail,youName,youNickName,youPw,birthday,regTime) ";
                    $sql .="VALUES('{$userEmail}','{$userName}','{$userNickName}','{$userPW}','{$birthDay}','{$regTime}')";
                    $result = $dbConnect -> query($sql);

                    if($result){
                      goSignUpPage('회원가입을 축하합니다!');
                      $_SESSION['memberID'] = $dbConnect -> insert_id;
                      $_SESSION['youNickName'] = $userNickName;
                      exit;
                    }
                    else{
                      goSignUpPage('에러발생3 : 관리자에게 문의하세요~'); 
                      exit;
                     }


                    }else{
                    goSignUpPage('이메일 또는 닉네임이 존재합니다. 로그인하세요'); 
                    exit;
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
  <script src="../assets/js/indexsignin.js"></script>
</body>

</html>