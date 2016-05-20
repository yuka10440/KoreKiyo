<?php

 require('../dbconnect.php');
 session_start();

 $sql = "SELECT * FROM categories";
 $result = mysql_query($sql) or die(mysql_error());
 $categories = array();

 while($category = mysql_fetch_assoc($result)){
   $categories[] = $category;
 }

 $sql = sprintf('SELECT * FROM clothes WHERE user_id="%d"',
        mysql_real_escape_string($_SESSION['id'])
      );

 $posts = mysql_query($sql) or die (mysql_error());
?>

<html>
<head>
  <meta charset="utf-8">
  <title>Clothes</title>
  <meta name="copyright" content="KoreKiyo!" />
  <meta name="robots" content="index, nofollow" />
  <meta name="description" content="KoreKiyo! Web Site" />
  <meta name="keywords" content="korekiyo! kore-kiyo!" />
  <meta http-equiv="X-UA-Compatible" content="IE=9"/>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" type="text/css" href="../home/style.css">
  <link rel="stylesheet" type="text/css" href="css/photo_upload.css">
  <link rel="stylesheet" type="text/css" href="../css/reset.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
        <a href="./photo_upload.php"><li>Clothes</li></a>
        <a href="../contact_us/contact_us.php"><li>Contact Us</li></a>
        <a href="../"><li>Log Out</li></a>
      </ul>
    </div>
  </header>

  <section>
    <!-- <div class="section-top">
    </div> -->

  <div id="image-box">
  <?php
    while($rec = mysql_fetch_assoc($posts)):
    ?>
        <?php if(isset($rec['url'])): ?>
          <article>
          <div class="image-item">
            <a href=""><img src="./images/<?php echo $rec['url']; ?>" alt="<?php echo $rec['url']; ?>" width="120" height="120"/></a>
          <?php endif; ?>
        </div>
          </article>
  <?php endwhile; ?>
  </div>

  <div class="section-bottom">
<form enctype="multipart/form-data" id="contribute" method="post" action="photo_upload_check.php">
  <div class="iframe">
    <div class="file-upload">
    <input type="file" name="upfile" id="file" accept="image/*" />
    <i class="fa fa-camera"></i>画像をアップロードする(GIF, JPEG, PNGのみ対応)
    </div>
    <div class="img-preview"><img src="" id="preview"></div>
  </div>

  <!-- <div class="radio-button"> -->
     <?php foreach ($categories as $category): ?>
       <input type="radio" name="cat_id" value="<?php echo $category['id']; ?>"/>
       <!-- <label for="<?php //echo $category['id']; ?>"></label> -->
       <?php echo $category['category']; ?>
     <?php endforeach; ?>
  <!-- </div> -->
   <div class="tag">
     <input type="text" class="h4" id="tag" name="tag" size="20" placeholder="&#xf02b; タグ" />
   </div>
<!-- <br /> -->
<div class="submit-button">
  <input type="submit" value="保存する" />
</div>

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

<script src="script.js"></script>
</div>
</body>
</html>
