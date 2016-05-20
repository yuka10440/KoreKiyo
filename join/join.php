<?php
  session_start();

  if (!empty($_POST)) {
    // エラー項目の確認
    if ($_POST['name'] == '') {
      $error['name'] = 'blank';
    }
    if (strlen($_POST['password']) < 4) {
      $error['password'] = 'length';
    }
    if ($_POST['password'] == '') {
      $error['password'] = 'blank';
    }

    if (empty($error)) {
      $_SESSION['join'] = $_POST;
      header('Location: check.php');
      exit();
    }
  }

  // 書き直し
  if ($_REQUEST['action'] == 'rewrite') {
    $_POST = $_SESSION['join'];
    $error['rewrite'] = true;
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
    <li class="crumbs-item selected">入力</li>
    <li class="crumbs-item" >確認</li>
    <li class="crumbs-item" >完了</li>
  </ul>
 </div>

  <div class="form-wrapper">
    <h1>新規登録</h1>
  <form action="" method="post" enctype="multipart/form-data">
      <div class="form-item">
        <label for="name"></label>
        <input class="form-control" type="text" name="name" required="required" placeholder="&#xf118; 名前" value="<?php echo htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'); ?>" />
      </div>
      <div class="form-item">
        <label for="password"></label>
        <input class="form-control" type="password" name="password" required="required" placeholder="&#xf084; パスワード" value="<?php echo htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8'); ?>" />
      </div>
      <div class="button-panel">
      <input type="submit" class="btn" title="Check" value="Check" />
      </div>
      </form>
      <div class="form-footer">
        <?php //if (isset($error) && $error['name'] == 'blank'): ?>
        <!-- <p class="error">* ニックネームを入力してください</p> -->
        <?php //endif; ?>

        <?php //if (isset($error) && $error['password'] == 'blank'): ?>
        <!-- <p class="error">* パスワードを入力してください</p> -->
        <?php //endif; ?>
        <?php //if (isset($error) && $error['password'] == 'length'): ?>
        <!-- <p class="error">* パスワードは4文字以上で入力してください</p> -->
        <?php //endif; ?>
      </div>
</div>
</section>
<footer>
  <p>Copyright (c) 2015 KoreKiyo!</p>
</footer>
</div>
</body>
