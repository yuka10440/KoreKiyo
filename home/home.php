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
$imgs = array();

while ($post = mysql_fetch_assoc($posts)){
  $imgs[$post['date']] = $post['url'];
}

?>

<!-- <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Home</title>
  <meta name="copyright" content="KoreKiyo!" />
  <meta name="robots" content="index, nofollow" />
  <meta name="description" content="KoreKiyo! Web Site" />
  <meta name="keywords" content="korekiyo! kore-kiyo!" />
  <meta http-equiv="X-UA-Compatible" content="IE=9"/>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" type="text/css" href="home.css">
  <link rel="stylesheet" type="text/css" href="../css/reset.css"> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
  <!-- <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
  <div id="wrapper">
    <header> -->
        <!-- <h1><?php //print "ようこそ！".$_SESSION['name']."さん"; ?></h1> -->
        <!-- <div class="header-left">KoreKiyo!</div>
        <div class="header-right">
          <ul>
            <li>Home</li>
            <li>Clothes</li>
            <li class="selected">Contact Us</li>
          </ul>
        </div>
    </header>
    <section> -->


      <!--<script type="text/javascript"><!--
      // ****************
      //      下準備
      // ****************
      myDate    = new Date();                                    // 今日の日付データ取得
      myWeekTbl = new Array("日","月","火","水","木","金","土");  // 曜日テーブル定義
      myMonthTbl= new Array(31,28,31,30,31,30,31,31,30,31,30,31);// 月テーブル定義
      myYear = myDate.getFullYear();                                 // 年の取得
      if (((myYear%4)==0 && (myYear%100)!=0) || (myYear%400)==0){ // うるう年だったら...
         myMonthTbl[1] = 29;                                     // 　２月を２９日とする
      }
      myMonth = myDate.getMonth();                               // 月を取得(0月～11月)
      myToday = myDate.getDate();                                // 今日の'日'を退避
      myDate.setDate(1);                                         // 日付を'１日'に変えて、
      myWeek = myDate.getDay();                                  // 　'１日'の曜日を取得
      myTblLine = Math.ceil((myWeek+myMonthTbl[myMonth])/7);     // カレンダーの行数
      myTable   = new Array(7*myTblLine);                        // 表のセル数分定義

      for(i=0; i<7*myTblLine; i++) myTable[i]="　";              // myTableを掃除する
      for(i=0; i<myMonthTbl[myMonth]; i++)myTable[i+myWeek]=i+1; // 日付を埋め込む

      // ***********************
      //      カレンダーの表示
      // ***********************
      document.write("<table border='1'>");      // 表の作成開始
      document.write("<tr><td colspan='7' bgcolor='#7fffd4'>");  // 見出し行セット
      document.write("<strong>",myYear, "年", (myMonth+1), "月カレンダー</strong>");
      document.write("</td></tr>");

      document.write("<tr>");                                    // 曜日見出しセット
      for(i=0; i<7; i++){                                        // 一行(１週間)ループ
         document.write("<td align='center' ");
         if(i==0)document.write("bgcolor='#fa8072'>");           // 日曜のセルの色
         else    document.write("bgcolor='#ffebcd'>");           // 月～土のセルの色
         document.write("<strong>",myWeekTbl[i],"</strong>");    // '日'から'土'の表示
         document.write("</td>");
      }
      document.write("</tr>");

      for(i=0; i<myTblLine; i++){                                // 表の「行」のループ
         document.write("<tr>");                                 // 行の開始
         for(j=0; j<7; j++){                                     // 表の「列」のループ
            document.write("<td align='center' width=150 height=150 ");               // 列(セル)の作成
            myDat = myTable[j+(i*7)];                            // 書きこむ内容の取得
            if (myDat==myToday)document.write("bgcolor='#00ffff'>"); // 今日のセルの色
            else if(j==0)      document.write("bgcolor='#ffb6c1'>"); // 日曜のセルの色
            else               document.write("bgcolor='#ffffe0'>"); // 平日のセルの色
            document.write("<strong>",myDat,"</strong>");        // 日付セット
            <?php
            // foreach($imgs as $key => $val):
            ?>
            if (String(myYear)+String(myMonth+1)+String(myDat) == <?php // echo $key; ?> ){
              document.write("<img width=100% height=100% align='right' src='upload/images/<?php // echo $val; ?>' ");
            }
            <?php // endforeach; ?>
            document.write("</td>");                             // 列(セル)の終わり
         }
         document.write("</tr>");                                // 行の終わり
      }
      document.write("</table>");                                // 表の終わり
    </script>-->
    <!-- </section>

    <footer>
        <copyright>Copyright (c) 2015 KoreKiyo! </copyright>
    </footer>
  </div>
</body>
</html> -->


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Home</title>
  <meta name="copyright" content="KoreKiyo!" />
  <meta name="robots" content="index, nofollow" />
  <meta name="description" content="KoreKiyo! Web Site" />
  <meta name="keywords" content="korekiyo! kore-kiyo!" />
  <meta http-equiv="X-UA-Compatible" content="IE=9"/>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" type="text/css" href="home.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="../css/reset.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
  <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
  <div id="wrapper">
  <header>
    <div class="header-left">KoreKiyo!</div>
    <div class="header-right">
      <ul>
        <a href="./home.php"><li>Home</li></a>
        <a href="../korekiyo!/weather.php"><li>KoreKiyo!</li></a>
        <a href="../upload/photo_upload.php"><li>Clothes</li></a>
        <a href="../contact_us/contact_us.php"><li>Contact Us</li></a>
        <a href="../"><li>Log Out</li></a>
      </ul>
    </div>
  </header>

  <section>
    <div class="container">

		<div class="calendar-container">

			<div class="head">

				<div class="day">19</div>
				<div class="month">January</div>

			</div>

			<table class="calendar">
				<thead>
					<tr>
         		<td>Mon</td>
						<td>Tue</td>
						<td>Wed</td>
						<td>Thu</td>
						<td>Fri</td>
						<td>Sat</td>
						<td>Sun</td>
					</tr>
				</thead>

				<tbody>

					<tr>
						<td class="prev-month">27</td>
						<td class="prev-month">28</td>
						<td class="prev-month">29</td>
            <td class="prev-month">30</td>
            <td class="prev-month">31</td>
						<td>1</td>
						<td>2</td>
					</tr>

					<tr>
            <td>3</td>
						<td>4</td>
						<td>5</td>
						<td>6</td>
						<td>7</td>
						<td>8</td>
						<td>9</td>
					</tr>

					<tr>
            <td>10</td>
						<td>11</td>
						<td>12</td>
						<td>13</td>
						<td>14</td>
						<td>15</td>
						<td>16</td>
					</tr>

					<tr>
            <td>17</td>
						<td>18</td>
						<td class="current-day">19</td>
						<td>20</td>
						<td>21</td>
						<td>22</td>
						<td>23</td>
					</tr>

					<tr>
            <td>24</td>
						<td>25</td>
						<td>26</td>
						<td>27</td>
						<td>28</td>
						<td>29</td>
						<td>30</td>
					</tr>

          <tr>
            <td>31</td>
          </tr>

				</tbody>

			</table>

			<div class="ring-left"></div>
			<div class="ring-right"></div>

		</div> <!-- end calendar-container -->

	</div> <!-- end container -->

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

      <!-- <div class="form-title">お問い合わせ</div>

      <form method="post" action="sent.php">

        <div class="form-item">名前</div>
        <input type="text" name="name">

        <div class="form-item">年齢</div>
        <select name="age">
          <option value="未選択">選択してください</option>
          <?php
            //for ($i = 6; $i <= 100; $i++) {
              //echo '<option value="'.$i.'">'.$i.'</option>';
            //}
          ?>
        </select> -->

        <!-- <div class="form-item">お問い合わせの種類</div>
        <?php
          //$types = array('KoreKiyo!に関するお問い合わせ', 'KoreKiyo!に対する意見', '取材・メディア関連のお問い合わせ', '料金に関するお問い合わせ', 'その他');
         ?>
        <select name="category">
          <option value="未選択">選択してください</option>
          <?php
          //foreach ($types as $value) {
             //echo '<option value="'.$value.'">'.$value.'</option>';
           //}
          ?>
        </select> -->

        <!-- <div class="form-item">内容</div>
        <textarea name="body"></textarea> -->

        <!-- <input type="submit" value="送信"> -->



      <!-- </form>

    </div>

  </section>

  <footer>
    <div class="footer-left">
      <ul>
        <li>友達に教える</li>
      </ul>

    </div>
  </footer>

</div>
</body>
</html> -->
