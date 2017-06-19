<?php

session_start();
header("Content-Type:text/html");
echo "<table align = center>";

$i = 0;
$price = 0;
if (($handle = fopen("./database/data.csv", "r")) !== FALSE) {
    foreach ($_SESSION['cart'] as $key => $value)
    {
      $data = $_SESSION['all'][$value];
       $price = $price + $data[4];
      if ($i % 3 == 0)
      {
        echo "<tr align = center>";
      }
      echo "<td width = 750px align = center>";

          echo "<a>" . $data[1] . "</a></br>";
          echo "<img width = 250px height = 325px src='database/" . $data[3] . "' alt=''>";

          echo "</br><a>" . "Цена:" . $data[4] . "ГРН" . "</a>";

    echo "</td>";
    $i++;
          if ($i % 3 == 0)
            {
        echo "</tr>";
        }

    }
  }
  echo "</table>";
  echo "<a class='end'>Сумма заказа: "  . $price . " ГРН\n</a>";
  echo "</br></br><a href='./index.php?' class='end'" . ">Оформить заказ</a>";
  echo "</br></br><a href='./index.php' class='end'" . ">Вернутся на главную страницу</a>";
?>
