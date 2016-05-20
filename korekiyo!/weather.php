<?php
  require('../dbconnect.php');
  session_start();

  $end_point = 'http://api.openweathermap.org/data/2.5/';
  $api_weather_url = 'weather?q=';
  $city = $_GET['city'].".jp";
  $app_id = '&APPID=37796267b49dde40e8fea8ad4367e6db';
  $url = $end_point.$api_weather_url.$city.$app_id;

  $weather = json_decode(file_get_contents($url), true);
  //$weatherShow = '<div>天気:%s</div>
  //<div>天気予報:%s</div>
  //<div><img src="http://openweathermap.org/img/w/%s.png" style="width:200px"></div>
  //<div>温度:%d 度</div>
  //<div>湿度:%s パーセント</div>
  //<div>風速:%s メートル</div>';

  $temprature = (int)$weather['main']['temp'] - 273.15;

  if($temprature > 25){
    $sql = 'SELECT * FROM categories WHERE category NOT IN ("長袖", "上着", "コート")';
  }
  else if($temprature > 20){
    $sql = 'SELECT * FROM categories WHERE category NOT IN ("長袖", "コート")';
  }
  else if($temprature > 15){
    $sql = 'SELECT * FROM categories WHERE category != "コート"';
  }
  else{
    $sql = 'SELECT * FROM categories';
  }

  // echo sprintf($weatherShow,
  //   $weather['weather'][0]['main'],
  //   $weather['weather'][0]['description'],
  //   $weather['weather'][0]['icon'],
  //   $temprature,
  //   $weather['main']['humidity'],
  //   $weather['wind']['speed']
  // );

  $cats = mysql_query($sql) or die (mysql_error());
  //$cat = mysql_fetch_assoc($cats);
  $clothes = array();
  while($cat = mysql_fetch_assoc($cats)){
    //var_dump($cat);
    $cat_id = $cat['id'];
    $sql = 'SELECT * FROM clothes WHERE user_id = ' . $_SESSION['id'] . ' and cat_id = ' . $cat_id;
    $result = mysql_query($sql) or die (mysql_error());
    while($cloth = mysql_fetch_assoc($result)){
      $clothes[]= $cloth;
    }
  }
?>

<head>
  <meta charset="utf-8">
  <title>KoreKiyo!</title>
  <meta name="copyright" content="KoreKiyo!" />
  <meta name="robots" content="index, nofollow" />
  <meta name="description" content="KoreKiyo! Web Site" />
  <meta name="keywords" content="korekiyo! kore-kiyo!" />
  <meta http-equiv="X-UA-Compatible" content="IE=9"/>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" type="text/css" href="../home/style.css">
  <link rel="stylesheet" type="text/css" href="css/weather.css">
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
          <a href="./weather.php"><li>KoreKiyo!</li></a>
          <a href="../upload/photo_upload.php"><li>Clothes</li></a>
          <a href="../contact_us/contact_us.php"><li>Contact Us</li></a>
          <a href="../"><li>Log Out</li></a>
        </ul>
      </div>
    </header>

    <section>
      <div class="contact-form">
        <div id="odekake">
         <p>今日はどこに出かける？</p>
       </div>
      <form method='get'>
   <select name="city">
     <option value="" selected>選択してください</option>
    <optgroup label="北海道・東北">
　  <option value="Yubari-Shi">北海道</option>
　  <option value="Aomori-shi">青森県</option>
　  <option value="Akita">秋田県</option>
　  <option value="Iwate">岩手県</option>
　  <option value="Miyagi">宮城県</option>
　  <option value="Yamagata-shi">山形県</option>
　  <option value="Fukushima-shi">福島県</option>
  </optgroup>
  <optgroup label="関東">
　  <option value="Tokyo">東京都</option>
　  <option value="Kanagawa-Ku">神奈川県</option>
　  <option value="Saitama">埼玉県</option>
　  <option value="Chiba-shi">千葉県</option>
　  <option value="Ibaraki">茨城県</option>
　  <option value="Gunnma">群馬県</option>
　  <option value="Tochigi-Shi">栃木県</option>
  </optgroup>
  <optgroup label="甲信越・北陸">
    <option value="Niigata-shi">新潟県</option>
    <option value="Toyama-shi">富山県</option>
    <option value="Ishikawa">石川県</option>
    <option value="Fukui-shi">福井県</option>
    <option value="Yamanashi">山梨県</option>
    <option value="Nagano-shi">長野県</option>
  </optgroup>
  <optgroup label="東海">
    <option value="Gifu-shi">岐阜県</option>
    <option value="Shizuoka-shi">静岡県</option>
    <option value="Aichi">愛知県</option>
    <option value="Mie">三重県</option>
  </optgroup>
  <optgroup label="関西">
    <option value="Shiga">滋賀県</option>
    <option value="Kyoto">京都府</option>
    <option value="Osaka-shi">大阪府</option>
    <option value="Hyogo-Ku">兵庫県</option>
    <option value="Nara-shi">奈良県</option>
    <option value="Wakayama-shi">和歌山県</option>
  </optgroup>
  <optgroup label="中国">
   <option value="Tottori">鳥取県</option>
   <option value="Shimane-Dantai">島根県</option>
   <option value="Okayama-shi">岡山県</option>
   <option value="Hiroshima-shi">広島県</option>
   <option value="Yamaguchi-shi">山口県</option>
  </optgroup>
  <optgroup label="四国">
    <option value="Tokushima-shi">徳島県</option>
    <option value="Kagawa">香川県</option>
    <option value="Ehime">愛媛県</option>
    <option value="Kouchi">高知県</option>
  </optgroup>
  <optgroup label="九州・沖縄">
　  <option value="Fukuoka-shi">福岡県</option>
　  <option value="Oita-shi">大分県</option>
　  <option value="Saga-shi">佐賀県</option>
　  <option value="Nagasaki-shi">長崎県</option>
　  <option value="Kumamoto-shi">熊本県</option>
　  <option value="Miyazaki-shi">宮崎県</option>
　  <option value="Kagosima-shi">鹿児島県</option>
　  <option value="Okinawa">沖縄県</option>
  </optgroup>
</select>

<input type="submit" value="送信">
</form>

<div class="image-box">
<?php
  foreach($clothes as $cloth):
?>
        <!-- <br /> -->
        <!-- <article> -->
        <div class="image-item">
          <img src="../upload/images/<?php echo $cloth['url']; ?>" alt="<?php echo $cloth['url']; ?>" width=120 height=120 />
        </div>
        <!-- </article> -->
<?php endforeach; ?>
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
