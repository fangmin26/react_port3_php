<header id="header">
  <nav class="nav">
    <ul>
      <li><a href="../pages/about.html">Portfolio</a></li>
      <li><a href="../pages/about.html"class="page__click">About</a></li>
      <li><a href="../pages/website.html"class="page__click">Website</a></li>
      <li><a href="../pages/css.html"class="page__click">Css</a></li>
      <li><a href="../pages/javascript.html"class="page__click">Javascript</a></li>
      <li><a href="../pages/contact.html"class="page__click">Contact</a></li>
      <li>
        <span><a href="../sign/SignIn.php"class="page__click2">SignIn</a></span>
        <?php
        if(isset($_SESSION['memberID'])){?>

        <span><a href="../sign/logOut.php">LogOut</a></span>
        <span><a href="../board/Board.php"class="page__click3">Board</a></span>
        <em class="welcome"><?=$_SESSION['youNickName']?>님 환영합니다.</em>

        <?php }else{ ?>

        <span><a href="../sign/LogIn.php"class="page__click2">LogIn</a></span>
        <span><a href="../board/Board.php"class="page__click3">Board</a></span>
        <?php } ?>        
      </li>
    </ul>
  </nav>
</header>
<!--//active nav, li 에 붙여야함-->