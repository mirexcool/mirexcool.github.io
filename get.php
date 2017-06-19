<?php

header("Content-Type:text/html");
echo "<table align = center>";
session_start();

$i = 0;
$all = array();
if (($handle = fopen("./database/data.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 3000, ",", '"', '\\')) !== FALSE)
    {
    	$all[]=$data;

    	if ($i % 3 == 0)
    	{
    		echo "<tr align = center>";
    	}
    	echo "<td width = 750px align = center>";

       		echo "<a>" . $data[2] . "</a></br>";
        	echo "<img width = 250px height = 325px src='database/$data[3]' alt=''>";

        	echo "</br><a>" . "Цена:" . $data[4] . "ГРН" . "</a>";
          echo "</br><a>" . "<form action='./cart/add_to_cart.php' method='get' >";
          echo "<input type='hidden' value = '" . $i . "' name='id'>
              <input type='submit' value = 'Добавить в корзину' name='add'>" . "</form></a>";

		echo "</td>";
		$i++;
          if ($i % 3 == 0)
          	{
    		echo "</tr>";
    		}

    }
  }
  $_SESSION['all'] = $all;
  echo "</table>";
?>
