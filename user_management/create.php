<?PHP
session_start();

if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == 'Регистрация')
{
	$p['login'] = $_POST['login'];
	$p['passwd'] = hash("whirlpool", $_POST['passwd']);
	if(!file_exists("../private"))
		mkdir("../private");
	if (!file_exists("../private/passwd"))
	{
		$arr = array();
		$arr[] = $p;
		file_put_contents("../private/passwd", serialize($arr));
		$_SESSION['loggued_on_user'] = $_POST['login'];
		echo "Вы успешно зарегистрировались, " . $_POST['login'] . "!\n";
	}
	else{
		$data = unserialize(file_get_contents("../private/passwd"));
		foreach ($data as $key => $value)
			if ($p['login'] == $value['login'])
			{
				echo " Такой логин занят\n";
				return ;
			}
		$data[] = $p;
		file_put_contents("../private/passwd", serialize($data));
		$_SESSION['loggued_on_user'] = $_POST['login'];
		echo "Вы успешно зарегистрировались, " . $_POST['login'] . "!\n";

	}
}
else echo "ERROR\n";
?>
