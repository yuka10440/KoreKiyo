<?php
  session_start();
  require('../dbconnect.php');

  if (!isset($_SESSION['join'])) {
    header('Location: thanks.php');
    exit();
  }

  if (!empty($_POST)) {
    // 登録処理をする
    $sql = sprintf('INSERT INTO members SET name="%s", password="%s"',
      mysql_real_escape_string($_SESSION['join']['name']),
      mysql_real_escape_string(sha1($_SESSION['join']['password']))
    );
    // mysql_query($db, $sql) or die(mysql_error($db));
    mysql_select_db('cwi4rkz_atz');
    mysql_query($sql) or die(mysql_error());
    unset($_SESSION['join']);
    // echo "a";
    header('Location: thanks.php');
    exit();
    // echo "b";
  }
?>
<head>
    <meta charset="utf-8">
    <title>新規登録</title>
    <meta name="copyright" content="KoreKiyo!" />
    <meta name="robots" content="index, nofollow" />
    <meta name="description" content="KoreKiyo! Web Site" />
    <meta name="keywords" content="korekiyo! kore-kiyo!" />
    <meta http-equiv="X-UA-Compatible" content="IE=9"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  </head>

  <body>
  <div id="wrapper">
    <header>
      <div class="header-left">KoreKiyo!<div>
    </header>
  <section>
  　<div id="crumbs">
    <ul>
      <li class="crumbs-item">入力</li>
      <li class="crumbs-item selected" >確認</li>
      <li class="crumbs-item" >完了</li>
    </ul>
   </div>
    <div class="form-wrapper">
      <h1>これでよろしいですか？</h1>
    <form action="" method="post" enctype="multipart/form-data">
  　　　<input type="hidden" name="action" value="submit" />
  　　　　<div class="form-item">
          <label for="name"></label>
           <div class="check-item">名前：<span id="n"><?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES, 'UTF-8'); ?></span></div>
         </div>
         <div class="form-item">
           <label for="password"></label>
          <div class="check-item">パスワード：<span id="flower"><?php echo htmlspecialchars(str_repeat("┝", strlen($_SESSION['join']['password'])), ENT_QUOTES, 'UTF-8'); ?></span></div>
         </div>
  <div class="button-panel">
    <input type="submit" class="btn" title="OK" value="OK" />
  </div>

  <!-- <a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a> -->
</form>

<div class="form-footer">
</div>

</div>

</section>
<footer>
  <p>Copyright (c) 2015 KoreKiyo!</p>
</footer>
</div>
</body>
