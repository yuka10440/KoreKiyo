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
      <li class="crumbs-item" >確認</li>
      <li class="crumbs-item selected" >完了</li>
    </ul>
   </div>

    <div class="form-wrapper">
      <h1>登録完了しました！</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="button-panel">
          <input type="button" class="btn" onClick="location.href='../'" value="back" />
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
