<?PHP
$flag = 0;
if ($_POST['login'] && $_POST['oldpw'] && $_POST['submit'] == 'OK' && $_POST['newpw'])
{
	$p['login'] = $_POST['login'];
	$p['oldpw'] = hash("whirlpool", $_POST['oldpw']);
	$p['newpw'] = hash("whirlpool", $_POST['newpw']);
	$data = unserialize(file_get_contents("../private/passwd"));
	foreach ($data as $key => $value)
		if ($p['login'] == $value['login']){
			if ($value['passwd'] == $p['oldpw']){
				$q = $key;
				$value['passwd'] = $p['newpw'];
				$flag = 1;
			}
		}
	if ($flag){
		$data[$q]['passwd'] = $p['newpw'];
		file_put_contents("../private/passwd", serialize($data));
		echo "OK\n";
	}
	else echo "ERROR\n";
}
else echo "ERROR\n";
?>
