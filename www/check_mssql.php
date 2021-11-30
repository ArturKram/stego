<?php
echo "check mssql connection";
echo "<br/>";
$serverName = "192.168.252.108";
$connectionOptions = array(
    "Database" => "stego_as",
    "UID" => "sa",
    "PWD" => "pass2SQL"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if( $conn == false )  
    {  
     echo "Could not connect.\n";  
     die( print_r( sqlsrv_errors(), true));  
    }

echo "Reading data from Check_file";
echo "<br>";

// Select from SampleTable
$tsql= "select id_checkfile, check_name, file_name from check_file;";
$getResults= sqlsrv_query($conn, $tsql);

if ($getResult===false) //Проверка выпонения SQL-запроса
    {
	echo "error - ";
	 die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении 
	 if( ($errors = sqlsrv_errors() ) != null)  
           {  
         foreach( $errors as $error)  
            {  
            echo "SQLSTATE: ".$error[ 'SQLSTATE']."\n";  
            echo "code: ".$error[ 'code']."\n";  
            echo "message: ".$error[ 'message']."\n";  
            }  
           }  
    }
echo "Pass through error";
echo "<br>";

    echo "<table>";
    echo "<br><br>i'm in <b>table</b> now!!!";
    echo "<tr><th>Проверка</th><th>Стеганопрограмма</th><th>Ключ в реестре</th></tr>";

    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_NUMERIC))
    {
    echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td></tr>";
    }
    echo "</table>"; 
    
    

//while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_NUMERIC))
//{
//    echo $row[0] . " " . $row[1] . " " . $row[2] ."</br>";
//}

//sqlsrv_free_stmt($getResults);

echo "Pass through while";
echo "<br/>";



?>
