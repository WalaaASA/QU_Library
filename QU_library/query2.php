<html>
    <head>
        <title>Qassim University Library</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@1,300&display=swap" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">   
        
        <style>
            html {
                min-height:100%;
                background:linear-gradient(0deg, rgba(235, 235, 202, 0.5), rgba(255,255,255, 0.9)), url(img/lib.jpg);
                background-size:cover;
              }
        </style>
    </head>
    <body>
        <table class="table" style="width:50%;">
              
              <?php
                  $conn = mysqli_connect("localhost","root","","Library");
                  $attri = $_REQUEST['attr'];
                  $table = $_REQUEST['table']; 
                  $from = $_REQUEST['cond'];

                      $attributes = explode( ",", $attri); // split the attributes names and storing thrm in an array 
                      $query = " SELECT " .$attributes[0].",".$attributes[1].",".$attributes[2]." FROM ".$table." Where ".$from;
                      
                      if($result = $conn->query($query))  
                      {
                          $noOfcolumns = sizeof($attributes);
                          //echo $noOfcolumns;
                          //echo $attributes[0]. " ". $attributes[1]. " ".$attributes[2];
                          echo "<thead class=\"thead-light\"> <tr> 
                          <th>".$attributes[0]."</th>
                          <th>".$attributes[1]."</th>
                          <th>".$attributes[2]."</th> </tr> </thead>";

                          while($row = $result->fetch_assoc())
                          { 
                              echo " <tbody> <tr> 
                              <td>" . $row[$attributes[0]]." </td> 
                              <td>" . $row[$attributes[1]]." </td> 
                              <td>" . $row[$attributes[2]] . "</td> </tr> </tbody>";
                          }
                              
                      }
                      else
                      {
                          echo "<h1> your query is not correct z";

                      }
                  
              ?>  
        </table>
    </body>
</html>


