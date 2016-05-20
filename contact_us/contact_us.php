<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Contact Us</title>
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

      <div class="form-title">お問い合わせ</div>

      <form method="post" action="sent.php">

        <div class="form-item">名前</div>
        <input type="text" name="name">

        <div class="form-item">年齢</div>
        <select name="age">
          <option value="未選択">選択してください</option>
          <?php
            for ($i = 10; $i <= 100; $i++) {
              echo '<option value="'.$i.'">'.$i.'</option>';
            }
          ?>
        </select>

        <div class="form-item">お問い合わせの種類</div>
        <?php
          $types = array('KoreKiyo!に関するお問い合わせ', 'KoreKiyo!に対する意見', '取材・メディア関連のお問い合わせ', '料金に関するお問い合わせ', 'その他');
         ?>
        <select name="category">
          <option value="未選択">選択してください</option>
          <?php
           foreach ($types as $value) {
             echo '<option value="'.$value.'">'.$value.'</option>';
           }
          ?>
        </select>

        <div class="form-item">内容</div>
        <textarea name="body"></textarea>

        <input type="submit" value="送信">

      </form>

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
