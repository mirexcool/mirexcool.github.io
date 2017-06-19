<?PHP
include ("auth.php");

if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == 'Войти')
{
	if (auth($_POST['login'], $_POST['passwd'])){
		session_start();
		$_SESSION['loggued_on_user'] = $_POST['login'];
		echo "Добро пожаловать, " . $_SESSION['loggued_on_user'] . "!\n";
	}
	else echo "Пожалуйста зарегистрируйтесь!\n";
}
else if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == 'Регистрация')
	require("create.php");
else echo "Такой пользователь уже существует!\n";
?>
