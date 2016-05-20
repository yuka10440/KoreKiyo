<?php
require('dbconnect.php');

session_start();

  if(!empty($_POST)) {
  // ログインの処理
    if ($_POST['name'] != '' && $_POST['password'] != '') {
      $sql = sprintf('SELECT * FROM members WHERE name="%s" AND password="%s"',
      mysql_real_escape_string($_POST['name']),
      sha1(mysql_real_escape_string($_POST['password']))
      );
      $record = mysql_query($sql) or die(mysql_error());
      if ($table = mysql_fetch_assoc($record)) {
        //ログイン成功
        $_SESSION['id'] = $table['id'];
        $_SESSION['name'] = $table['name'];
        $_SESSION['time'] = time();
        header('Location: home/home.php');
        print "！";
      }
     }else {
        $error['login'] = 'failed';
      }
  }else {
      $error['login'] = 'blank';
   }

?>



<!--<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>KoreKiyo!</title>
  <meta name="copyright" content="KoreKiyo!" />
  <meta name="robots" content="index, nofollow" />
  <meta name="description" content="KoreKiyo! Web Site" />
  <meta name="keywords" content="korekiyo! kore-kiyo!" />
  <meta http-equiv="X-UA-Compatible" content="IE=9"/>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1" />
  <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" media="screen" type="text/css" href="join/css/login.css" />
</head>

<body>
<div class="form-wrapper">
  <h1>ログイン</h1>
<form action="" method="post">
   <div class="form-item">
     <label for="name"></label>
        <input type="text" name="name" required="required" placeholder="&#xf118; Name" value="<?php //echo htmlspecialchars($_POST['name']); ?>" />
   </div>
   <div class="form-item">
     <label for="password"></label>
        <input type="password" name="password" required="required" placeholder="&#xf023; Password" value="<?php //echo htmlspecialchars($_POST['password']); ?>" />
   </div>
   <div class="button-panel">
      <input type="submit" class="button" title="Sign In" value="Sign In"></input>
    </div>
    </form>
    <div class="form-footer">
    </div>
        <?php //if ($error['login'] == 'blank'): ?>
          <p class="error">* ニックネームとパスワードをご記入ください</p>
        <?php //endif; ?>
        <?php //if ($error['login'] == 'failed'): ?>
          <p class="error">* ログインに失敗しました。正しくご記入ください。</p>
        <?php //endif; ?>
      </div>
</body>-->

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>KoreKiyo!</title>
  <meta name="copyright" content="KoreKiyo!" />
  <meta name="robots" content="index, nofollow" />
  <meta name="description" content="KoreKiyo! Web Site" />
  <meta name="keywords" content="korekiyo! kore-kiyo!" />
  <meta http-equiv="X-UA-Compatible" content="IE=9"/>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
  <div id="wrapper">

  <header>
    <div class="container">
      <div class="header-left">
        <img class="logo" src="images/korekiyo!.png">
        <!-- <i class="fa fa-hand-o-right"></i><h2><i class="fa fa-hand-o-right">KoreKiyo!</h2> -->
      </div>
      <div class="header-right">
        <div class="login" id="login-show">ログイン</div>
      </div>
    </div>
  </header>

  <section>

  <!-- <div class="signup-modal-wrapper" id="signup-modal">
    <div class="modal">
      <div class="close-modal">
        <i class="fa fa-2x fa-times"></i>
      </div>
      <div id="signup-form">
        <h2>新規登録</h2>
        <form action="" method="post">
          <input class="form-control" type="text" name="name" placeholder="名前" />
          <input class="form-control" type="password" name="password" placeholder="パスワード" />
          <div id="submit-btn">
            <input type="submit" class="button" title="join" value="新規登録"></input>
          </div>
        </form>
      </div>
    </div>
  </div> -->

  <div class="login-modal-wrapper" id="login-modal">
    <div class="modal">
      <div class="close-modal">
        <i class="fa fa-2x fa-times"></i>
      </div>
      <div id="login-form">
        <h2>ログイン</h2>
        <form action="" method="post">
            <input class="form-control" type="text" name="name" placeholder="&#xf118; 名前" value="<?php echo htmlspecialchars($_POST['name']); ?>" />
            <input class="form-control" type="password" name="password" placeholder="&#xf084; パスワード" value="<?php echo htmlspecialchars($_POST['password']); ?>" />

          <div id="submit-btn">
            <input type="submit" class="button" title="login" value="ログイン"></input>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="top-wrapper">
    <div class="container">
      <h1>今日は何を着て行こうかな？</h1><br><br>
      <p>KoreKiyo!はあなたの洋服を管理し、お出かけ場所の天気を考慮して今日着ていく洋服を提示してくれるサービスです。<br><br>
      「出かけるときに何を着れば良いのかわからない」というあなたのお悩みをサポートします。</p>
      <div>
        <a href="join/join.php" class="btn signup">新規登録はこちら</a>
      </div>
      <!-- <p>or</p>
      <div class="btn facebook"><span class="fa fa-facebook"></span>Facebookで登録</div>
      <div class="btn twitter"><span class="fa fa-twitter"></span>Twitterで登録</div> -->
    </div>
  </div>
  <div class="lesson-wrapper">
    <div class="container">
      <div class="heading">
        <h2>KoreKiyo!でできること</h2>
      </div>
      <div class="lessons">
        <div class="lesson lesson-hover">
          <div class="lesson-icon">
            <img src="images/heart.png">
            <!-- <i class="fa fa-circle fa-5x"></i> -->
            <!-- <p>HTML & CSS</p> -->
          </div>
          <p class="text-contents">あなたの持っている洋服を管理します。写真におさめることで、自分の持っている洋服を把握することができます。</p>
        </div>
        <div class="lesson lesson-hover">
          <div class="lesson-icon">
            <img src="images/sun.png">
            <!-- <p>jQuery</p> -->
          </div>
          <p class="text-contents">その日の天気を考慮した洋服を提示します。あなたのお出かけ先の天気によって提示される洋服が違ってきます。</p>
        </div>
        <div class="lesson lesson-hover">
          <div class="lesson-icon">
            <img src="images/calander.png">
            <!-- <p>Ruby</p> -->
          </div>
          <p class="text-contents">コーディネートをカレンダーにおさめることが出来ます。</p>
        </div>
        <!-- <div class="lesson lesson-hover">
          <div class="lesson-icon">
            <img src="https://prog-8.com/images/html/advanced/php.png">
            <p>PHP</p>
          </div>
          <p class="text-contents">HTMLだけではページの内容を変えることはできません。PHPはHTMLにプログラムを埋め込み、それを可能にします。</p>
        </div> -->
      </div>
    </div>
  </div>
  <div class="faq-wrapper">
    <div class="container">
      <div class="heading">
        <h2>FAQ</h2>
      </div>
      <div class="faq">
        <ul id="faq-list">
          <li class="faq-list-item">
            <h3 class="question">KoreKiyo!って無料ですか？</h3>
            <span>+</span>
            <div class="answer">
              <p>無料です。お金はいりません。</p>
            </div>
          </li>
          <li class="faq-list-item">
            <h3 class="question">KoreKiyo!の由来は何ですか？</h3>
            <span>+</span>
            <div class="answer">
              <p>「これ着よう！」が由来です。「これに決めた！」みたいな感じを出したかったんです。</p>
            </div>
          </li>
          <li class="faq-list-item">
            <h3 class="question">何着まで管理できますか？</h3>
            <span>+</span>
            <div class="answer">
              <p>100着まで管理できます。</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="message-wrapper">
    <div class="container">
      <div class="heading">
        <h2>KoreKiyo!でお出かけをもっと楽しいものにしませんか?</h2>
        <!-- <h3 id="tagline">Let's learn to code, learn to be creative!</h3> -->
      </div>
      <span>
      <a href="join/join.php"class="btn message">KoreKiyo!をはじめる</a>
      </span>
    </div>
  </div>
  </section>
  <footer>
    <div class="container">
      <!-- <img src="https://prog-8.com/images/html/advanced/footer_logo.png">
      <p>Learn to Code,Learn to be Creative.</p> -->
      <copyright>Copyright (c) 2015 KoreKiyo! </copyright>
    </div>
  </footer>

   <script src="script.js"></script>

 </div>
</body>
</html>
