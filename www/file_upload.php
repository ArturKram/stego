
<!DOCTYPE html>
<html lang="en">
  <title>StegoHash</title>
<head>
    <meta charset="utf-8">


    <!-- ===========================
    THEME INFO
    =========================== -->
    <meta name="description" content="A free Bootstrap powerd HTML template exclusively crafted for the super lazy designers like me who designed thousand of websites till today but never got a chance to build one himself.">
    <meta name="keywords" content="Free Portfolio Template, Free Template, Free Bootstrap Template, Dribbble Portfolio Template, Free HTML5 Template">
    <meta name="author" content="EvenFly Team">

    <!-- DEVEOPER'S NOTE:
    This is a free Bootstrap powered HTML template from EvenFly. Feel free to download, modify and use it for yourself or your clients as long there is no money involved.

    Please don't try to sale it from anywhere; because I want it to be free, forever. If you sale it, That's me who deserves the money, not you :)
    -->

    <!-- ===========================
    SITE TITLE
    =========================== -->
    <title>ВИ МВД 2021</title>

    <link rel="icon" href="img/logo.png">
      <!--   <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-ipad-retina.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-iphone-retina.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-ipad.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-iphone.png" />

    <!-- ===========================
    STYLESHEETS
    =========================== -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/preloader.css">
    <link rel="stylesheet" href="css/style4.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/animate.css">

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/index.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- ===========================
    ICONS:
    =========================== -->
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
        <!--navbar end-->
        <br>
        <br>
        <br>
    <div style="color:black;font-size:20px;margin-left:35%;">

<?php
   // Конфигурация
      //$allowed_filetypes = array('.jpg','.gif','.bmp','.png'); // разрешенные типы файлов

            //$max_filesize = 524288; // максимальный размер файла в байтах (0.5MB).
         $max_filesize = 50*1024*1024; // максимальный размер файла в байтах (50MB).
      $upload_path = 'files/'; // папка для загрузки файлов на сервере (папка 'files').

   $filename = $_FILES['userfile']['name']; // получить имя файла с расширением.
   //$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // получить расширение файла.
 $filesize=$_FILES['userfile']['size'];
 $filetype=$_FILES['userfile']['type'];
   // проверить допустимость файла, если не разрешено, то вызвать функцию DIE и вывести сообщение пользователю.
   //if(!in_array($ext,$allowed_filetypes))
     // die('Вы пытаетесь загрузить неразрешенный тип файла.');

   // проверка размера файла, если превышает, то DIE и сообщение пользователю.
   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
      die('Вы пытаетесь загрузить слишком большой файл.');
 //print_r ($_FILES);
   // проверка возможности загрузки в указанный каталог, если нет, то DIE и информация юзеру.
   if(!is_writable($upload_path))
   {

      die('Вы не можете загрузить в указанную папку; смените CHMOD на 777.');
      echo "<br>";
      echo $_SERVER['DOCUMENT_ROOT'];
    }
 $path_file = $_SERVER['DOCUMENT_ROOT']."/".$upload_path . $filename;
   // загрузка файла в указанную папку.
   if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
   { echo "<b><h3 style='color: rgb(0, 0, 0)'>Ваш файл успешно загружен!<br>"; // сработало.
$hash_md5 = md5_file($path_file);
$hash_sha1 = sha1_file($path_file);
$hash_sha256 = hash('sha256', $path_file);


echo "<b><h3 style='color: rgb(0, 0, 0); '>SHA1 файла: ".$hash_sha1."<br>";
echo "<b><h3 style='color: rgb(0, 0, 0); '>SHA256   файла: ".$hash_sha256."<br>";
echo "<b><h3 style='color: rgb(0, 0, 0); '>MD5 файла: ".$hash_md5."<br>";

//echo "<b><h3 style='color: rgb(253, 253, 250); '>Путь до файла на сервере: </b>".$path_file."<br>";
$server = 'localhost'; //Создание соединения с СУБД
 $db = array ("Database"=>"stego_as", "UID"=>"sa", "PWD"=>"123") ;
 $conn = sqlsrv_connect($server, $db);
    if ($conn===false) { //Проверка соединения с БД
     die(print_r(sqlsrv_errors()));//Ошибка при подключении к БД
  };
}
      else
         echo "<b><h3 style='color: rgb(0, 0, 0); '>Во время загрузки произошла ошибка. Попробуйте снова."; // не сработало :(.

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
    $sql="INSERT INTO [dbo].[file_as] VALUES ('".$filename."','".$_POST['st_prog_combo']."','".$filetype."','',".$filesize.",'".$hash_sha1."','".$hash_sha256."','".$hash_md5."')"; //*iconv('UTF-8','windows-1251', --ЕСЛИ ХОТИМ КИРИЛЛИЦУ
                      //Создание SQL-запроса добавления справочной информации в таблицу st_prog
    $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
    if ($stmt===false) //Проверка выпонения SQL-запроса
    {
        die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
    }
    //else { echo "<br><b><h3 style='color: rgb(253, 253, 250); '>Успех!";}
  ?>
</div>
</header>


</body>

</html>
