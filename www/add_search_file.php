<?php
 $server = 'localhost'; //Создание соединения с СУБД
 $db = array ("Database"=>"stego_as", "UID"=>"sa", "PWD"=>"123") ;
 $conn = sqlsrv_connect($server, $db);
    if ($conn===false) { //Проверка соединения с БД
     die(print_r(sqlsrv_errors()));//Ошибка при подключении к БД
  };
    $sql="SELECT q.check_name FROM [stego_as].[dbo].[check] q group by q.check_name order by q.check_name desc"; //*iconv('UTF-8','windows-1251', --ЕСЛИ ХОТИМ КИРИЛЛИЦУ
                       //Создание SQL-запроса добавления справочной информации в таблицу st_prog
    $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
	//print_r($stmt);
    if ($stmt===false) //Проверка выпонения SQL-запроса
    {
        die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
    }
  ?>
<!DOCTYPE html>
<html lang="en">
    <title>StegoHash</title>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="forma.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/index.js"></script>
    <script src="js/bootstrap.js"></script>

</head>
<!--



<body style="background-color: #303136">
    <nav  class="navbar navbar-expand-lg navbar-light bg-dark shadow bg-dark rounded">
        <div class="logo col-md-1">
        <img src="logo.png" alt="Эмблема">
        </div>
    <div class="modal-title col-md-10 offset-md-1 text-uppercase font-weight-bold font-italic ">
    <b><h3 style="color: rgb(253, 253, 250); ">Воронежский институт МВД России</h3><br>
      <h6 style="color: rgb(253, 253, 250); ">Поиск следов присутствия стеганографического ПО</h6></b>
      </div>
      </nav>
      <br>
      <br>
      <div class="modal-title col-md-9 offset-md-3 text-uppercase font-weight-bold font-italic ">
        <b><h4 style="color: rgb(253, 253, 250)" >Добавление проверки и файлов</h4></b>
      </div>

      <form action="" method="POST" enctype="multipart/form-data">
      <div class="offset-md-1" style="color: rgb(253, 253, 250)"> <h3 style="align:right">Имя проерки:</h3>
        <br>
        <input class=" col-md-5" type="text" name="check_name" placeholder="Введите уникальное имя проверки для добавления" />
        <br>
        <br>
        </div>
      <br>
      <br>
      <a href="directory_upload.php">
      <div class="offset-md-1" style="color: rgb(253, 253, 250)"> <h3 style="align:right">Добавить файлы:</h3>
        <br>
        <p>Выберете папку с файлами</p>
        <input type="hidden" name="uploaded" value="1" />
        <input class="btn btn-outline-light " style="color: white;" type="file" name="directory[]" webkitdirectory />
        <br>
        <br>
        <button type="submit" class="btn btn-outline-light" name="add_name">Добавить файлы в базу</button>
      </div>
      <br>
      <br>

        <a href="index.html">
        <button type="button" class="btn btn-outline-light" >Главная страница</button></a>
        </div>


      </form>
-->

<body style="background-color: #303136">
    <nav  class="navbar navbar-expand-lg navbar-light bg-dark shadow bg-dark rounded">
        <div class="logo col-md-1">
        <img src="logo1.png" alt="Эмблема" style=" height: 147px;    margin-top: 43%;    margin-left: 302%;  ">
        </div>
    <div class="modal-title col-md-10 offset-md-1 text-uppercase font-weight-bold font-italic ">
    <b><h3 style="color: rgb(253, 253, 250); ">Воронежский институт МВД России</h3><br>
      <h6 style="color: rgb(253, 253, 250); ">Поиск следов присутствия стеганографического ПО</h6></b>
      </div>
      </nav>
      <br>
      <br>
      <div class="modal-title col-md-9 offset-md-3 text-uppercase font-weight-bold font-italic ">
        <b><h4 style="color: rgb(253, 253, 250)">Добавить проверку и файлы</h4></b>
    </div>
    <br>
	<form action="directory_upload.php" method="POST" enctype="multipart/form-data">
   <div class="offset-md-1">
     <input class=" col-md-5" type="text" name="check_name" placeholder="Введите уникальное имя проверки" />&nbsp;&nbsp;<button type="submit" class="btn btn-outline-light" name="add_check_name">Добавить проверку</button>
     <br>
     <br>
     <br>
     <div class="form-group row offset-md-1">
        <label style="color: rgb(253, 253, 250);" class= "col-md-2 col-form-label"><h5>Выберете проверку для добавления файлов</h5></label> <br>
        <select name="$_POST['check_name']" class=" col-md-5 form-control">
     <?php
     while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
     {
     echo "<option>".$row['check_name']."</option>";
     }
     ?>
        </select>
     </div>
     <br>
     <br>
     <input type="hidden" name="uploaded" value="1" />
     <input class="btn btn-outline-light " style="color: white; height:5%;width:20%" type="file" name="directory[]" webkitdirectory />&nbsp;&nbsp;<button type="submit" class="btn btn-outline-light" name="add_name">Добавить файлы</button>
		<br><br><br>
        <a href="index.html">
        <button type="button" class="btn btn-outline-light" >Главная страница</button></a>
        </div>
</form>
