<?php
	session_start();

	/*error_reporting(E_ALL);
	ini_set("display_errors", 1);*/

?>

<!DOCTYPE html>
<html>

<head>

	<link rel="stylesheet" type="text/css" href="css/index.css">

	<title>ft_minishop</title>


</head>

	<body>
		<div class="header">
			<div class = "logo">
				<a href='./index.php' title='Home Page'><b>ft_minishop</b></a>
			</div>
			<div class = "login" align=right method="post">
			<?PHP
				if ($_SESSION['loggued_on_user'])
				{
					header("Content-Type:text/html");
					echo "Привет, ".$_SESSION['loggued_on_user']." !";
					echo "	<form align=\"center\"  action=\"./user_management/logout.php\" method=\"post\">
								<input type=\"submit\" name=\"submit\" value='Выйти'>
							</form>";
					if ($_SESSION['loggued_on_user'] == "admin")
						echo "</br><a href='./index.php?admin=1'" . ">Перейти в админ-панель</a>";
				}
				else
				{
				 echo "<form align='center'  action='./user_management/login.php' method='post'>
					<a>Username:</a> <input name='login' value='' />
					<a>Password:</a> <input type='password' name='passwd' value='' />
					<input type='submit' name='submit' value='Войти'/>
					<input type='submit' name='submit' value='Регистрация'>
				</form>";
				}
				?>
			</div>
			<div class = "basket" align="center">
			<a href='./index.php?cart=1' title="Корзина"><img src="./database/basket.png" title="Корзина" class="bask" alt="Корзина" height="80" width="80"></a> </br>
			<?php
				if ($_SESSION['cart'] != NULL)
					$count = count($_SESSION['cart']);
				else
					$count = 0;
				if ($count == 0){
					echo "<a>Ваша корзина пуста</a>";
				}
				else if ($count == 1){
					echo "<a>Вы выбрали 1 еденицу товара</a>";
				}
				else {
					echo "<a>Вы выбрали $count едениц товара</a>";
				}
				echo "</br><a href='./index.php?cart=1' title='Корзина'><h4>Перейти в корзину</h4></a>";
			?>
			</div>
		</div>
		<div>
			<div class="cat" align="center">
			<h1 align="center">Категории товаров</h1>
			<?php
				echo "</br><a href='./index.php?cat=Tablet'" . '><h3>Планшеты</h3></a>';
				echo "</br><a href='./index.php?cat=Smart'" . "><h3>Телефоны</h3></a>";
			?>
		</br></br></br></br></br></br></br>
			<h1 align="center">Производитель</h1>
			<?php
				echo "</br><a href='./index.php?cat=Apple'" . "><h3>APPLE</h3></a>";
				echo "</br><a href='./index.php?cat=Xiaomi'" . "><h3>Xiaomi</h3></a>";
				echo "</br><a href='./index.php?cat=Meizu'" . "><h3>Meizu</h3></a>";
				echo "</div>";
			?>
			<div class = "content">
			<h1 align="center">Товары</h1>
			<?PHP
						header("Content-Type:text/html");

						if ($_GET['cart'] == 1)
							require("cart/show_cart.php");
						else if ($_GET['admin'] == 1)
							require("user_management/admin_panel.php");
						else if ($_GET['cat'])
						{
							$_SESSION['cat'] = $_GET['cat'];
							require("cat.php");
						}
						else if (file_exists("./database/data.csv"))
							require("get.php");
						else
							echo "Не подключена база данных!\n";
				?>
			</div>
		</div>


	</body>
</html>
