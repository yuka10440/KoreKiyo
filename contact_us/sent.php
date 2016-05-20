<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Sent</title>
  <meta name="copyright" content="KoreKiyo!" />
  <meta name="robots" content="index, nofollow" />
  <meta name="description" content="KoreKiyo! Web Site" />
  <meta name="keywords" content="korekiyo! kore-kiyo!" />
  <meta http-equiv="X-UA-Compatible" content="IE=9"/>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" type="text/css" href="../home/style.css">
  <link rel="stylesheet" type="text/css" href="../css/reset.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
  <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
  <div id="wrapper">
  <header>
    <div class="header-left">KoreKiyo!</div>
    <div class="header-right">
      <ul>
        <a href="../home/home.php"><li>Home</li></a>
        <a href="../korekiyo!/weather.php"><li>KoreKiyo!</li></a>
        <a href="../upload/photo_upload.php"><li>Clothes</li></a>
        <a href="./contact_us.php"><li>Contact Us</li></a>
        <a href="../"><li>Log Out</li></a>
      </ul>
    </div>
  </header>

  <section>

    <div class="contact-form">

      <div class="form-title">お問い合わせいただきありがとうございます。</div>

      <div class="form-title">入力内容</div>

      <div class="form-item"><span class="flower">✿</span> 名前</div>
      <?php echo $_POST['name'] ?>

      <div class="form-item"><span class="flower">✿</span> 年齢</div>
      <?php echo $_POST['age'] ?>

      <div class="form-item"><span class="flower">✿</span> お問い合わせの種類</div>
      <?php echo $_POST["category"]; ?>

      <div class="form-item"><span class="flower">✿</span> 内容</div>
      <?php echo $_POST['body'] ?>
    </div>

  </section>

  <footer>
    <div class="footer-left">
      <copyright>Copyright (c) 2015 KoreKiyo! </copyright>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-facebook-square"></i></a>
    </div>
  </footer>
</div>
</body>
</html>
