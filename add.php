<?php
define('INCLUDE_CHECK',true);
if($_POST['submit']=='Отправить')
{
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	$repass = $_POST['repass'];

	if (empty($login) || empty($pass) || empty($repass))
	{
		echo 'Не все поля заполнены.';
	}
	else
	{
		include "connect.php";
		$login_proverka = mysql_query("SELECT $db_columnUser FROM $db_table WHERE $db_columnUser='$login'");

		if (mysql_num_rows($login_proverka))
		{
		echo 'Акаунт <b>'.$login.'</b> уже существует.';
		}
		elseif ($pass != $repass)
		{
			echo 'Пароли не совпадают.';
		}
		else
		{
			$hlogin = md5($login);
			$hpass = md5($pass);
			mysql_query("INSERT INTO $db_table ($db_columnUser,$db_columnPass) VALUES('$hlogin','$hpass')");
			echo 'ok';
		}
	}
}
?>
<form action="" method="post">
								<p><br />Логин:<br /><input type=text name=login /><br /></p>
								<p><br />Пароль:<br /><input  type=password name=pass /><br /></p>
								<p><br />Повторите пароль:<br /><input  type=password name=repass /><br /></p>
								<p><input type="submit" name="submit" value="Отправить" /><br /></p>
</form>