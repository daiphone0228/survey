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

			$nickname = $_POST['nickname'];
			$email = $_POST['email'];
			$goiken = $_POST['goiken'];
			$nickname = htmlspecialchars($nickname);
			$email = htmlspecialchars($email);
			$goiken = htmlspecialchars($goiken);

			if($nickname=='')
			{
				echo 'ニックネームが入力されていません。<br />';
			}
			else
			{
				echo 'ようこそ';
				echo $nickname;
				echo '様';
				echo '<br />';
			}

			if($email=='')
			{
				echo 'メールアドレスが入力されていません。<br />';
			}
			else
			{
				echo 'メールアドレス：';
				echo $email;
				echo '<br />';
			}

			if($goiken=='')
			{
				echo 'ご意見が入力されていません。<br />';
			}
			else
			{
				echo 'ご意見『';
				echo $goiken;
				echo '』<br />';
				echo '<br />';
			}	
		
			if($nickname=='' || $email=='' || $goiken=='')
			{
				echo '<form>';
				echo '<br />';
				echo '<input type="button" onclick="history.back()" value="戻る">';
				echo '</form>';
			}
			else
			{
				echo '<form method="post" action="thanks.php">';
				echo '<input name="nickname" type="hidden" value="'.$nickname.'">';
				echo '<input name="email" type="hidden" value="'.$email.'">';
				echo '<input name="goiken" type="hidden" value="'.$goiken.'">';
				echo '上記内容でよろしければ『ＯＫ』を、';
				echo '<br />';
				echo '修正する場合は『戻る』をクリックして下さい。';
				echo '<br />';
				echo '<br />';
				echo '<input type="button" onclick="history.back()" value="戻る">';
				echo '<input type="submit" value="ＯＫ">';
				echo '</form>';
			}


						
		?>
		<br />
	
	</body>
</html>
