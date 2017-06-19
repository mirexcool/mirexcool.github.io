<?PHP
function auth($login, $passwd)
{
	$passwd = hash("whirlpool", $passwd);
	$data = unserialize(file_get_contents("../private/passwd"));
	foreach ($data as $key => $value)
		if ($login == $value['login'] && $value['passwd'] == $passwd)
			return (TRUE);
	return (FALSE);
}
?>
