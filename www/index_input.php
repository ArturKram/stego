<?php
 $server = 'localhost'; //Создание соединения с СУБД
 $db = array ("Database"=>"stego_as", "UID"=>"sa", "PWD"=>"123") ;
 $conn = sqlsrv_connect($server, $db);
    if ($conn===false) { //Проверка соединения с БД
     die(print_r(sqlsrv_errors()));//Ошибка при подключении к БД
  };
  $name_u = trim($_POST['name_users']); //Логин
  $passw = trim($_POST['password']); //Пароль

  if(isset($_POST['inp']))
  {
    $sql="SELECT * FROM [stego_as].[dbo].[role] INNER JOIN [stego_as].[dbo].[users] ON [stego_as].[dbo].[role].[id_role] = [stego_as].[dbo].[users].[id_role] WHERE ([stego_as].[dbo].[users].[name_users] = '$name_u' AND [stego_as].[dbo].[users].[password] = '$passw')";
    $stmt = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET)); //Выполнение SQL-запроса
    $row_count = sqlsrv_num_rows($stmt);
    if ($row_count > 0)
    {
      if ($name_u == 'admin1')
      {
        require_once("index.html");
      }
      else
      {
        require_once("index_user.html");
      }
    }
    else
    {
      require_once("index_input.html");
      echo '<p style="color: rgb(253, 253, 250)">' . "Вы ввели неверный логин или пароль" . '</p>' ;
    }
  }



?>
