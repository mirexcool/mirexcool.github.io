<?php

session_start();
header("Content-Type:text/html");
echo "<table align = center>";

$i = 0;

echo "<div><h1> Добавить новый товар </h1>";
echo "<form align='center'  action='./user_management/login.php' method='post'>
          Категория: 
                    <select id ='sel'>
                      <option value='Smart'>Smart</option>
                      <option value='Tablet'>Tablet</option>
                    </select></br>
          Производитель:
                      <select id ='sel'>
                        <option value='APPLE'>APPLE</option>
                        <option value='Xiaomi'>Xiaomi</option>
                        <option value='Meizu'>Meizu</option>
                      </select></br>
          Название: <input name='login' value='' /></br>
          Картинка: <input name='login' value='' /></br>
          Цена: <input name='login' value='' /></br>
          Описание: <input name='login' value='' /></br>
          <input type='button' value='Добавить новый товар' id='sub'>
        </form></div>";
echo "<div><h1> Удалить пользователя </h1>";
echo "<form align='center'  action='./user_management/login.php' method='post'>
          Логин: <input name='login' value='' /></br>
          <input type='button' value='Удалить' id='sub'>
        </form></div>";
echo "</br><a href='./index.php'" . ">Вернутся на главную страницу</a>";
?>