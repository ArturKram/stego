
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
    <div style="color:black;font-size:20px;margin-left:10%;">

    <?php

        set_time_limit(0);         //устанавливаем таймаут
        $server = 'localhost'; //Создание соединения с СУБД
        $db = array ("Database"=>"stego_as", "UID"=>"sa", "PWD"=>"123") ;
        $conn = sqlsrv_connect($server, $db);
    	if ($conn===false)
    	{ //Проверка соединения с БД
    	die(print_r(sqlsrv_errors()));//Ошибка при подключении к БД
    	};

          //$allowed_filetypes = array('.jpg','.gif','.bmp','.png'); // разрешенные типы файлов
    //если нажата кнопка добавить в базу


        if(isset($_POST['add1_name']))
        {
          $sql="SELECT [stego_as].[dbo].[check].[id_check_name] FROM [stego_as].[dbo].[check] WHERE ([stego_as].[dbo].[check].[check_name] = '".$_POST['check_name_reg']."')";
//echo "$sql";
//$check= $_POST['check_name_reg'];
//echo "$check";

          //$sql= "SELECT 'Тест передачи id_check_name'";
          $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
          if ($stmt===false) //Проверка выпонения SQL-запроса
          {
            die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
          }

          while($res=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC))
          {
          $id_check_name = $res[0];
          //echo "$res[0]";
        //  echo "$id_check_name";
          }
                //$max_filesize = 524288; // максимальный размер файла в байтах (0.5MB).
             $max_filesize = 500*1024*1024; // максимальный размер файла в байтах (500MB).
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
          die('<b>Вы пытаетесь загрузить слишком большой файл.</b>');
     //print_r ($_FILES);
       // проверка возможности загрузки в указанный каталог, если нет, то DIE и информация юзеру.
       if(!is_writable($upload_path))
          die('<b>Вы не можете загрузить в указанную папку; смените CHMOD на 777.</b>');

     $path_file = $_SERVER['DOCUMENT_ROOT']."/".$upload_path . $filename;
       // загрузка файла в указанную папку.
      // echo "Дошли до print";

  // print_r($_POST);
       //die();

       if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
       { echo "<b><br><br><br><h3 style='color: rgb(0, 0, 0)'>Ваш файл успешно загружен на сервер!<br>"; // сработало.
    $reg_key = file_get_contents($path_file);
    $reg_key=str_replace('"','',$reg_key);
    $reg_key=str_replace("'",'',$reg_key);
    $reg_key=str_replace('<','',$reg_key);
    $reg_key=str_replace('>','',$reg_key);
    $reg_key=str_replace('/','',$reg_key);
    $reg_key=str_replace('\n','',$reg_key);
    $reg_key=str_replace('\r','',$reg_key);
    $reg_key=str_replace('=','',$reg_key);
    $reg_key=str_replace('Key','',$reg_key);
    $reg_key=str_replace('Name','',$reg_key);
     echo "<b><h3 style='color: rgb(0, 0, 0)'>Файл очищен!<br>"; // сработало.
    //echo "<b><h3 style='color: rgb(253, 253, 250); '>ХЭШ файла: ".$reg_key."<br>";
    echo "<b><h3 style='color: rgb(0, 0, 0); '>Путь до файла на сервере: </b>".$path_file."<br>";

        }
          else
             echo "<b><h3 style='color: rgb(0, 0, 0); '>Во время загрузки произошла ошибка. Попробуйте снова."; // не сработало :(.
        //die('Произошла ошибка во время загрузки!');

        $sql="INSERT INTO [dbo].[check_file](id_check_name,file_name,file_type,file_size,reg_key) VALUES ('".$id_check_name."','".$filename."','".$filetype."',".$filesize.",'".$reg_key."')"; //*iconv('UTF-8','windows-1251', --ЕСЛИ ХОТИМ КИРИЛЛИЦУ
                          //Создание SQL-запроса добавления справочной информации в таблицу st_prog
        $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
        if ($stmt===false) //Проверка выпонения SQL-запроса
    	{
            die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении
    	}
         else echo "<b><h3 style='color: rgb(0, 0, 0);'>Ваш файл загружен в базу, связан с проверкой ".$_POST['check_name']."<br>"; // сработало.
        }
?>
<?php
//если нажата кнопка поиск по базе
    //echo"we дошли";
//print_r( $_POST['check_name']);
      if(isset($_POST['search_name']))
    {
      //  echo "<b>Нажали кнопку поиск."; // не сработало :(.
        //  $sql1="select * from tf_Check_key('".$_POST['id_check_name']."')"; //*iconv('UTF-8','windows-1251', --ЕСЛИ ХОТИМ КИРИЛЛИЦУ
        $sql1="select  * from tf_Check_key(41)"; //*iconv('UTF-8','windows-1251', --ЕСЛИ ХОТИМ КИРИЛЛИЦУ
          $stmt = sqlsrv_query($conn, $sql1);

        if ($stmt===false)
        {
            die(print_r(sqlsrv_errors(), true));
        }
        echo "<br/>";
        echo '<table class="table table-dark">';
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
    	echo '<tr>';
    	echo '<th>Проверка</th><th>Стеганопрограмма</th><th>Ключ в реестре</th></tr>';
          echo '<td>'.$_POST['check_name']."</td>".'<td>'.$row[1]."</td>"."<td>".$row[2]."</td>";
           echo '</tr>';
        }
        echo '</table>';
      }

    ?>

  <?php
    $j=0;
  if(isset($_POST['search_name']))
  {
    echo "<b>Нажали кнопку поиск."; // не сработало :(.


    //  $sql="select distinct * from tf_Check_hash('".$_POST['id_check_name']."')"; //*iconv('UTF-8','windows-1251', --ЕСЛИ ХОТИМ КИРИЛЛИЦУ
          $sql="select distinct * from tf_Check_hash(45)"; //*iconv('UTF-8','windows-1251', --ЕСЛИ ХОТИМ КИРИЛЛИЦУ

      $stmt = sqlsrv_query($conn, $sql);

    if ($stmt===false)
    {
        die(print_r(sqlsrv_errors(), true));
    }
    echo "<br/>";
    echo '<table class="table table-inverse table-bordered table-striped" style="color: rgb(0, 0, 0)">';
  echo '<tr style="font-weight: bold">';
      echo '<td>'.'Проверка'."</td>".'<td>'.'Данные проверки'."</td>".'<td>'.'Данные базы'."</td>"."<td>".'Программа'."</td>"."<td>".'Хэш-сумма'."</td>";

    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) )
      {
      $j++;
      echo '<tr>';
    echo '<td>'.$_POST['check_name']."</td>".'<td>'.$row[1]."</td>"."<td>".$row[2]."</td>"."<td>".$row[3]."</td>"."<td>".$row[4]."</td>";
      echo '</tr>';
      }
    echo '</table>';

  echo "<br><b><i style='color: rgb(0,0, 0);'>&nbsp;&nbsp; По проверке &nbsp;".$_POST['check_name']." &nbsp;обнаружены объекты в количестве 4.</i><br>"; // сработало.
  }

    ?>


	</div>

    </header>


</body>

</html>
