<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script type="text/javascript">
			window.onunload = function(){};
			history.forward();
		</script>
		<title>PHP基礎</title>
	</head>
	<body>
		<?php
			// ステップ1.db接続
			$dsn = 'mysql:dbname=phpkiso;host=localhost';

			// 接続するためのユーザー情報
			$user = 'root';
			$password = '';

			// DB接続オブジェクトを作成
			$dbh = new PDO($dsn,$user,$password);

			// 接続したDBオブジェクトで文字コードutf8を使うように指定 ※文字化け防止
			$dbh->query('SET NAMES utf8');

			$dsn = 'mysql:dbname=LAA0686173-onelinebbs;host=mysql';
			$user = 'LAA068$6173';
			$password = 'nexseed1204';


			$nickname = $_POST['nickname'];
			$email = $_POST['email'];
			$goiken = $_POST['goiken'];

			echo $nickname;
			echo '様';
			echo 'ご意見ありがとうございました！<br />';
			echo 'ご頂戴いただきましたご意見『';
			echo $goiken;
			echo '』<br />';
			echo $email;
			echo '宛に<br />送信内容ご確認メールをお送りしましたので、ご確認下さい。';

			$mail_sub= 'アンケートを受け付けました。';
			$mail_body= $nickname."様へ\nアンケートのご協力ありがとうございました。";
			$mail_body=html_entity_decode($mail_body, ENT_QUOTES, "UTF-8");
			$mail_head='From: daiphone0228@gmail.com';
			mb_language('Japanese');
			mb_internal_encoding("UTF-8");
			mb_send_mail($email, $mail_sub, $mail_body, $mail_head);
			echo '<br /><br />';
			echo '<form method="post" action="index.html">';
			echo '<input type="submit" value="新規アンケート送信画面へ">';
			echo '</form>';

			// ステップ2.データベースエンジンにSQL文で司令を出す
			$sql = 'INSERT INTO `survey`(`nickname`,`email`,`goiken`)values("'.$nickname.'","'.$email.'","'.$goiken.'")';
			var_dump($sql);
			$stmt=$dbh->prepare($sql);
			// insert文を実行
			$stmt->execute();

			// ステップ3.データベースから切断
			$dbh=null;


		?>

	</body>
</html>