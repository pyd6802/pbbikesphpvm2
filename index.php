<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>Help, I need to park my bike in Pittsburgh!</title>
  </head>

  <body>
 
    <h1>Pittsburgh Bike Racks</h1>
    <p>Need to park your bike? Use the interactive map showing location of bike racks in downtown Pittsburgh</p>
    
    <iframe width="800" height="400" 
          src="https://app.powerbi.com/view?r=eyJrIjoiMTZmYzZjMDEtMTdjZi00NTg3LTlkMjEtMmVjNjUyN2ZhN2Y0IiwidCI6IjRjMjViOGE2LTE3ZjctNDZmOS04M2YwLTU0NzM0YWI4MWZiMSIsImMiOjN9" 
          frameborder="0" allowFullScreen="true"></iframe>

    <h1>Pittsburgh Bike Racks</h1>
    <p>Where is the most space? Interactive grid showing bike capacity by rack location in downtown Pittsburgh</p>
     
    <iframe width="800" height="400" src="https://app.powerbi.com/view?r=eyJrIjoiYjFkNzc1OTYtNmJjYS00YmU1LWJjOTktMzczY2UwODZhZDA1IiwidCI6IjRjMjViOGE2LTE3ZjctNDZmOS04M2YwLTU0NzM0YWI4MWZiMSIsImMiOjN9" 
          frameborder="0" allowFullScreen="true"></iframe>
 
    <p>Created using PowerBI services</p>
 
 <h1>Show me the data! This is VM2</h1>

    <?php  

/*Connect using SQL Server authentication.*/  

$serverName = "tcp:Bikerack001.database.windows.net,1433";  
   $connectionOptions = array(  
      "Database" => "BikeRack",  
      "UID" => "BikeRack001",  
      "PWD" => "BR/001001"  
       );  
   $conn = sqlsrv_connect($serverName, $connectionOptions);  
  
  if( $conn ) {
     echo "Connection established.<br />";
     }else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
     }
 
/*Display Space Data.*/  
    $sql = "SELECT 
               Street,
               Rack_Style,
               Bike_Capacity,
               Weather_Coverage
            FROM dbo.Locations ORDER BY Street"; 
    $stmt = sqlsrv_query($conn, $sql); 
    if($stmt === false) 
    { 
      die(print_r(sqlsrv_errors(), true)); 
     } 
 
  if(sqlsrv_has_rows($stmt)) 
  { 
    print("<table border='1px'>"); 
    print("<tr><td>Street</td>"); 
    print("<td>Rack Type</td>"); 
    print("<td>Spaces Available</td>"); 
    print("<td>Weather Cover</td></tr>"); 
 
  while($row = sqlsrv_fetch_array($stmt)) 
  { 
    print("<tr><td>".$row['Street']."</td>"); 
    print("<td>".$row['Rack_Style']."</td>"); 
    print("<td>".$row['Bike_Capacity']."</td>"); 
    print("<td>".$row['Weather_Coverage']."</td></tr>"); 
  } 
print("</table>"); 
} 
?> 

  </body>

</html>
