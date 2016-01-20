<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>PHP基礎</title>
	</head>
	<body>
	<?php
	try {
			$code = $_POST['code'];
			// DBに接続
			$dsn = 'mysql:dbname=phpkiso;host=localhost';
			$user = 'root';
			$password = '';
			$dbh = new PDO($dsn, $user, $password);
			$dbh->query('SET NAMES utf8'); //$dbhがqueryを所有しているイメージ

			// DBに指令をだす
			$sql = 'SELECT*FROM `survey` WHERE `code`=?'; //code=?のデータのみ下さいというSQL文
			$stmt = $dbh->prepare($sql); //指令を出す準備
			$data[]=$code; //データを別の変数に格納
			$stmt->execute($data); //指令を出す

			// ↑SQLインジェクションを防ぐ、プリペアードステートメントを行っている。
			
			$rec = $stmt->fetch(PDO::FETCH_ASSOC); //$dbhがfetchを所有しているイメージ
			if($code==''){
				echo 'コードが入力されていません<br /><br />';
				echo '<form>';
				echo '<input type="button" onclick="history.back()" value="戻る">';
				echo '</form>';
			// }elseif($rec==NOT EXISTS){
			// 	echo 'コードが存在しません<br /><br />';
			// 	echo '<form>';
			// 	echo '<input type="button" onclick="history.back()" value="戻る">';
			// 	echo '</form>';
			// 	break;
			}elseif($rec==false){
				echo '検索結果がありませんでした。<br /><br />';
				echo '<form>';
				echo '<input type="button" onclick="history.back()" value="戻る">';
				echo '</form>';
			}else{
			
				echo $rec['code'];
				echo $rec['nickname'];   //1レコード分のデータを表示する
				echo $rec['email'];
				echo $rec['goiken'];
				echo '<br />';
				echo '<br />';
				echo '<form>';
				echo '<input type="button" onclick="history.back()" value="戻る">';
				echo '</form>';

			}

			// while(1)
			// {
			// $rec = $stmt->fetch(PDO::FETCH_ASSOC); //1レコード取り出し
			// if($rec==false) //if文「もしもうデータがなければ」
			// {
			// 	break; //ループを抜けてDB切断する
			// }
			// echo $rec['code'];
			// echo $rec['nickname'];   //1レコード分のデータを表示する
			// echo $rec['email'];
			// echo $rec['goiken'];
			// echo '<br />';
			// }


			// DB切断
			$dbh = null;
		
	} catch (Exception $e) { //$eは例外処理になるので、エラーが発生した時のエラー情報が記載されている。
		echo 'ただいま障害により大変ご迷惑をお掛けしております。';
		
	}
		

	?>

	<br />
	<a href="kensaku.html">検索画面に戻る</a>
			
	</body>
</html>