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

<!doctype html>
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
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" type="text/css" href="../css/reset.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
  <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
  <div id="wrapper">
    <header>
        <h1><?php print "ようこそ！".$_SESSION['name']."さん"; ?></h1>

    </header>
    <section>


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
    </section>

    <footer>
        <copyright>Copyright (c) 2015 KoreKiyo! </copyright>
    </footer>
  </div>
</body>
</html>
