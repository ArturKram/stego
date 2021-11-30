
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
  <div id="servic" class="container">



    <?php
     $check_name = trim($_POST['check_name']);
     $server = 'localhost'; //Создание соединения с СУБД
     $db = array ("Database"=>"stego_as", "UID"=>"sa", "PWD"=>"123") ;
     $conn = sqlsrv_connect($server, $db);
    if ($conn===false)
    { //Проверка соединения с БД
      die(print_r(sqlsrv_errors()));//Ошибка при подключении к БД
    };
    //если нажата кнопка добавить проверку в базу
    if(isset($_POST['add_check_name']))
    {
      $sql="INSERT INTO [stego_as].[dbo].[check](check_name, id_users) VALUES ('$check_name', '1')";
      $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
      if ($stmt===false) //Проверка выпонения SQL-запроса
      {
        die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
      }
      else
      {
        echo "<b style='  margin-left: 33%;  font-size: 18px;'>Проверка &nbsp; $check_name успешно добавлена в базу.</b>"; // не сработало :(.


      }
    }

    //если нажата кнопка добавить в базу
    if(isset($_POST['add_name']))
    {
        //$id_check_name=array();
        $sql="SELECT [stego_as].[dbo].[check].[id_check_name] FROM [stego_as].[dbo].[check] WHERE ([stego_as].[dbo].[check].[check_name] = '$check_name')";
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
        echo "$id_check_name";
        }

      $upload_path = 'files/'; // папка для загрузки файлов на сервере (папка 'files').
      $directoryname = $_FILES['directory']['name'];
      if(!is_writable($upload_path))
      {
        echo '<br>';
        echo 'папка для загрузки:'.$upload_path;
        echo "<br>";
        die('Вы не можете загрузить в указанную папку; смените CHMOD на 777.');
      }

    $i=0;
    foreach ($directoryname as $filenames)
    {
      $filename = $filenames;
      $filesize=$_FILES['directory']['size'][$i];
      $filetype=$_FILES['directory']['type'][$i];
      if(move_uploaded_file($_FILES['directory']['tmp_name'][$i],$upload_path .$filename))
      {
    	   echo "<b><i style='color: rgb(0, 0, 0);margin-left:31%;font-size:18px;'>&nbsp;&nbsp; $filename успешно загружен! </i><br>"; // сработало.
    	   $path_file = $_SERVER['DOCUMENT_ROOT']."/".$upload_path . $filename;
    	   $hesh = md5_file($path_file);

    	   $sql="INSERT INTO [dbo].[check_file](id_check_name,file_name,file_type,file_size,hash) VALUES ('43','".$filename."','".$filetype."','".$filesize."','".$hesh."')"; //*iconv('UTF-8','windows-1251', --ЕСЛИ ХОТИМ КИРИЛЛИЦУ
                          //Создание SQL-запроса добавления справочной информации в таблицу st_prog
         $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
         if ($stmt===false) //Проверка выпонения SQL-запроса
         {
            die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
         }
    	   $files = glob($_SERVER['DOCUMENT_ROOT']."/".$upload_path.'*'); // get all file names
         foreach($files as $file)
         {
           if(is_file($file))
           {
             unlink($file); // delete file
           }
         }
       }
       else
          echo "<b>Во время загрузки произошла ошибка. Попробуйте снова."; // не сработало :(.
       $i++;

      }

      echo "<br><br><b style='color: rgb(0, 0, 0);margin-left:24%;font-size:18px;'>&nbsp;&nbsp;Данные $i файлов успешно загружены в базу! <br>"; // сработало.

    }
    //если нажата кнопка поиск по базе
    $j=0;
  if(isset($_POST['search_name']))
  {
  //  echo "<b>Нажали кнопку поиск."; // не сработало :(.
      $sql="select distinct * from tf_Check_hash('".$_POST['check_name']."')"; //*iconv('UTF-8','windows-1251', --ЕСЛИ ХОТИМ КИРИЛЛИЦУ
      $stmt = sqlsrv_query($conn, $sql);

    if ($stmt===false)
    {
        die(print_r(sqlsrv_errors(), true));
    }
    echo "<br/>";
    echo '<table class="table table-inverse table-bordered table-striped" style="color: rgb(253, 253, 250)">';
  echo '<tr style="font-weight: bold">';
      echo '<td>'.'Проверка'."</td>".'<td>'.'Данные проверки'."</td>".'<td>'.'Данные базы'."</td>"."<td>".'Программа'."</td>"."<td>".'Хэш-сумма'."</td>";

    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) )
      {
      $j++;
      echo '<tr>';
    echo '<td>'.$row[0]."</td>".'<td>'.$row[1]."</td>"."<td>".$row[2]."</td>"."<td>".$row[3]."</td>"."<td>".$row[4]."</td>";
      echo '</tr>';
      }
    echo '</table>';

  echo "<br><b><i style='color: rgb(253, 253, 250);'>&nbsp;&nbsp; По проверке &nbsp;".$_POST['check_name']." &nbsp;обнаружены объекты в количестве  $j.</i><br>"; // сработало.
  }

    ?>







	</div>

    </header>


</body>

</html>
