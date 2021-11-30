
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

 $server = 'localhost'; //Создание соединения с СУБД
 $db = array ("Database"=>"stego_as", "UID"=>"sa", "PWD"=>"123") ;
 $conn = sqlsrv_connect($server, $db);
    if ($conn===false) { //Проверка соединения с БД
     die(print_r(sqlsrv_errors()));//Ошибка при подключении к БД
  };
    //print '<pre>';
   //print_r ($_FILES['directory']['name']);
   //print_r ($_FILES['directory']);
   //print '</pre>';

//если нажата кнопка добавить в базу

   if(isset($_POST['add_folder']))
   {
 $upload_path = 'files/'; // папка для загрузки файлов на сервере (папка 'files').
 //$filename = $_FILES['userfile']['name']; // получить имя файла с расширением.
    $directoryname = $_FILES['directory']['name'];
   	if(!is_writable($upload_path))
      die(' Вы не можете загрузить в указанную папку; смените CHMOD на 777.');
  $i=0;
	foreach ($directoryname as $filenames)
	{
	$filename = $filenames;
	$filesize=$_FILES['directory']['size'][$i];
	$filetype=$_FILES['directory']['type'][$i];

    //echo  $_FILES['directory']['tmp_name'][$i],$upload_path .$filename."<br>";

	//echo move_uploaded_file($_FILES['directory']['tmp_name'][$i],$upload_path .$filename).'    '.$i;
	if(move_uploaded_file($_FILES['directory']['tmp_name'][$i],$upload_path .$filename))
    {
		echo "<b><i style='color: rgb(0, 0, 0);'>&nbsp;&nbsp;$filename - файл успешно загружен!</i><br>"; // сработало.
		$path_file = $_SERVER['DOCUMENT_ROOT']."/".$upload_path . $filename;
		$hash_md5 = md5_file($path_file);
		$hash_sha1 = sha1_file($path_file);
		$hash_sha256 = hash('sha256', $path_file);
		$sql="INSERT INTO [dbo].[file_as] VALUES ('".$filename."','".$_POST['st_prog_combo']."','".$filetype."','',".$filesize.",'".$hash_sha1."','".$hash_sha256."','".$hash_md5."')";
				//$sql="INSERT INTO [dbo].[file_as](file_name, st_prog_name,type) VALUES ('".$filename."','".$_POST['st_prog_combo']."','".$filetype."')";
		//echo "<b><i style='color: fuchsia;'>$sql</i><br>"; // сработало.
                      //Создание SQL-запроса добавления справочной информации в таблицу st_prog
    $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса

    if ($stmt===false) //Проверка выпонения SQL-запроса
    {
        die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
    }
		//echo "<b>Имя файла: ".$filename."<br>";
		//echo "<b>Тип файла: ".$_FILES['directory']['type'][$i]."<br>";
		//echo "<b>Размер файла: ".($_FILES['directory']['size'][$i])."<br>";
		//echo "<b>ХЭШ файла: ".$hesh."<br>";
		$files = glob($_SERVER['DOCUMENT_ROOT']."/".$upload_path.'*'); // get all file names

		foreach($files as $file)
		{ // iterate files
		  if(is_file($file))
		  {
			  //echo "Файл <b>".$file."</b> удалён.<br>";
			unlink($file); // delete file
		  }
		}

		/*$sql="SELECT * FROM [stego_as].[dbo].[file_as] q WHERE q.hash ='".$hesh."'"; //*iconv('UTF-8','windows-1251', --ЕСЛИ ХОТИМ КИРИЛЛИЦУ
                       //Создание SQL-запроса добавления справочной информации в таблицу st_prog
    $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
	//print_r($stmt);
    if ($stmt===false) //Проверка выпонения SQL-запроса
    {
        die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
    }
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['file_name'].", ".$row['hash']."<br />";
	}*/



	}
      else
         echo "<br><b><i style='color: rgb(0, 0, 0);'>&nbsp;&nbsp;Что-то пошло не так!<br>";  // не сработало :(.


	$i++;
	}
 echo "<br><b><i style='color: rgb(0, 0, 0);'>&nbsp;&nbsp;Данные $i файлов успешно загружены в базу!<br>"; // сработало.
 }

?>
						<br><br>
          </div>

            </header>


        </body>

        </html>
