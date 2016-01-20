<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>PHP基礎</title>
	</head>
	<body>
	<?php
		// DBに接続
		$dsn = 'mysql:dbname=phpkiso;host=localhost';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn, $user, $password);
		$dbh->query('SET NAMES utf8'); //$dbhがqueryを所有しているイメージ

		// DBに指令をだす
		$sql = 'SELECT * FROM survey WHERE 1'; //データを全部下さいというSQL文 //接続文字列にはスペースがない前提
		$stmt = $dbh->prepare($sql); //指令を出す準備  //$dbhがprepareを所有しているイメージ
		$stmt->execute(); //指令を出す  //$dbhがexecuteを所有しているイメージ

		while(1)
		{
			// 実行結果として得られたデータを表示
			$rec = $stmt->fetch(PDO::FETCH_ASSOC); //1レコード取り出し
			if($rec==false) //if文「もしもうデータがなければ」
			{
				break; //ループを抜ける
			}
			echo $rec['code'];
			echo $rec['nickname'];   //1レコード分のデータを表示する
			echo $rec['email'];
			echo $rec['goiken'];
			echo '<br />';
		}


		// DB切断
		$dbh = null;

	?>

	<br />
	<a href="menu.html">メニューに戻る</a>
			
	</body>
</html>