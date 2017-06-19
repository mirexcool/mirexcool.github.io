<?php

session_start();
header("Content-Type:text/html");
echo "<table align = center>";

$i = 0;

    foreach ($_SESSION['all'] as $key => $value)
    {
      if ($_SESSION['cat'] == $value[0] || $_SESSION['cat'] == $value[1])
      {
        $data = $value;
        if ($i % 3 == 0)
          echo "<tr align = center>";
        echo "<td width = 750px align = center>";
        echo "<a>" . $data[1] . "</a></br>";
        echo "<img width = 250px height = 325px src='database/" . $data[3] . "' alt=''>";
        echo "</br><a>" . "Цена:" . $data[4] . "ГРН" . "</a>";
        echo "</br><a>" . "<form action='./cart/add_to_cart.php' method='get' >Добавить в корзину<input type='submit' value = '" . $key . "' name='add'>" . "</form></a>";
        echo "</td>";
        $i++;
        if ($i % 3 == 0)
          echo "</tr>";
      }
    }
  echo "</table>";
  echo "</br><a href='./index.php' title='Home Page'" . ">Вернутся на главную страницу</a>";
?>
