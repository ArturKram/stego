
<!DOCTYPE html>
<html lang="en">
    <title>StegoHash</title>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/preloader.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/animate.css">

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/index.js"></script>
    <script src="js/bootstrap.js"></script>


    <link rel="stylesheet" href="css/simple-line-icons.css">



</head>

<body data-spy="scroll">

    <header>
        <!-- ===========================
        HERO AREA
        =========================== -->
        <div id="hero">
          <div class="logo col-md-1">
    <img src="logo1.png" alt="Эмблема" style=" height: 147px;    margin-top: 43%;    margin-left: 302%;  ">
          </div>
            <div class="container herocontent">

                <h2 class="wow fadeInUp" data-wow-duration="2s"><b><b>ВОРОНЕЖСКИЙ ИНСТИТУТ МВД РОССИИ</b></b></h2>
                <h5 class="wow fadeInDown" data-wow-duration="3s"><b>Кафедра автоматизированных информационных систем ОВД</b></h5>
            </div>

            <!-- Featured image on the Hero area -->
            <!--  <img class="heroshot wow bounceInUp" data-wow-duration="4s" src="img/hero1.png" alt="Featured Work">-->
        </div>
        <!--HERO AREA END-->


        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                           <span class="sr-only">Toggle navigation</span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                        </button>

                    <a class="navbar-brand" href="#hero">
                        <!-- Replace Drifolio Bootstrap with your Site Name and remove icon-grid to remove the placeholder icon -->
                        <span class="brandicon icon-grid"></span>
                        <span class="brandname">ПОИСК СЛЕДОВ ПРИСУТСТВИЯ СТЕГАНОГРАФИЧЕСКОГО ПО</span>
                    </a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.html"><span class="btnicon icon-home"></span>Главная</a></li>
                        <li><a href="index.html"><span class="btnicon icon-magnifier"></span>Поиск следов</a></li>
                        <li><a href="#testimonials"> <span class="btnicon icon-user"></span>Наша команда</a></li>
                        <li><a href="mailto:you@yourmail.com"><span class="btnicon icon-envelope-open"></span>Контакты</a></li>
                    </ul>

                </div>
                <!--.nav-collapse -->
            </div>
        </nav>
      <br> <br> <br>
      <div style="color:black;font-size:20px;margin-left:35%;">
<?php
   // Конфигурация
      $allowed_filetypes = array('.xml'); // разрешенные типы файлов

	        //$max_filesize = 524288; // максимальный размер файла в байтах (0.5MB).
	     $max_filesize = 50*1024*1024; // максимальный размер файла в байтах (50MB).
      $upload_path = 'files/'; // папка для загрузки файлов на сервере (папка 'files').

	$filename = $_FILES['userfile']['name']; // получить имя файла с расширением.
   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // получить расширение файла.
	$filesize=$_FILES['userfile']['size'];
	$filetype=$_FILES['userfile']['type'];
   // проверить допустимость файла, если не разрешено, то вызвать функцию DIE и вывести сообщение пользователю.
   if(!in_array($ext,$allowed_filetypes))
      die("<h3 style='color: rgb(0, 0, 0)'>Вы пытаетесь загрузить неразрешенный тип файла. Разрешен только XML!");

   // проверка размера файла, если превышает, то DIE и сообщение пользователю.
   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
      die('Вы пытаетесь загрузить слишком большой файл.');
 //print_r ($_FILES);
   // проверка возможности загрузки в указанный каталог, если нет, то DIE и информация юзеру.
   if(!is_writable($upload_path))
      die('Вы не можете загрузить в указанную папку; смените CHMOD на 777.');
 $path_file = $_SERVER['DOCUMENT_ROOT']."/".$upload_path . $filename;
   // загрузка файла в указанную папку.
   if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
   { echo "<b><h3 style='color: rgb(0, 0, 0);margin-left:7%;'>Ваш файл успешно загружен!"; // сработало.
//$ree_key = file_get_contents($path_file);
$ree_keys = file($path_file);

foreach ($ree_keys as $ree_key) {
    echo "<br><b>{$ree_key}</b> ";
}
//echo "<b><h3 style='color: rgb(253, 253, 250); '>Ключи реестра: ".$ree_key."<br>";
//echo "<b><h3 style='color: rgb(253, 253, 250); '>Путь до файла на сервере: </b>".$path_file."<br>";
$server = 'localhost'; //Создание соединения с СУБД
 $db = array ("Database"=>"stego_as", "UID"=>"sa", "PWD"=>"123") ;
 $conn = sqlsrv_connect($server, $db);
    if ($conn===false) { //Проверка соединения с БД
     die(print_r(sqlsrv_errors()));//Ошибка при подключении к БД
  };
}
      else
         echo "<b><h3 style='color: rgb(253, 253, 250); '>Во время загрузки произошла ошибка. Попробуйте снова."; // не сработало :(.

?>

 <?php

//isset($_POST['vid_st'])
//echo $_POST['vid_st'];

 $server = 'localhost'; //Создание соединения с СУБД
 $db = array ("Database"=>"stego_as", "UID"=>"sa", "PWD"=>"123") ;
 $conn = sqlsrv_connect($server, $db);
    if ($conn===false) { //Проверка соединения с БД
     die(print_r(sqlsrv_errors()));//Ошибка при подключении к БД
  };
    foreach ($ree_keys as $ree_key)
	{
    	$sql="INSERT INTO [dbo].[file_as] VALUES ('".$filename."','".$_POST['st_prog_combo']."','".$filetype."','".$ree_key."',".$filesize.",'','','')"; //*iconv('UTF-8','windows-1251', --ЕСЛИ ХОТИМ КИРИЛЛИЦУ
                      //Создание SQL-запроса добавления справочной информации в таблицу st_prog
		$stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
		if ($stmt===false) //Проверка выпонения SQL-запроса
		{
        die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
		}
	}
	//else { echo "<br><b><h3 style='color: rgb(253, 253, 250); '>Успех!";}
  ?>

</div>

</header>


</body>

</html>
