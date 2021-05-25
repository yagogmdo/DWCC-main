<?php include 'conexion.php';?>
<html>
    <head>
        <script src="biblio.js"></script></script>
        <script src="menu.js"></script></script>
        <link rel="stylesheet" href="biblio.css">
    </head>
    <body>
<div class="main-wrapper">
  <div class="main-content">
  <div class="container2">
    <div class="center">
      <button class="btn2" onclick="window.location='biblio.php'">
        <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
          <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
          <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
        </svg>
        <span><h4><a href="biblio.php"><i class="fa fa-home fa-fw"></i>INICIO</a></h4></span>
      </button>
    </div>
  </div>
    <div class="posts">
       <ul>
         <li>       
      <?php
            $query ="SELECT * FROM general";
           $result = $db->query($query);                  
           if(mysqli_num_rows($result) > 0) {
              $row_count=0;
              echo "<br><br>Resultados encontrados: ";
              echo "<br><table class='table table-striped'>";
              While($row = $result->fetch_assoc()) {   
                  $row_count++;                         
                  echo "<tr><td>".$row_count." </td><td>". $row['nombre'] . "</td><td>". $row['numero'] . "</td><td><button onclick=\"abrirdirectorio(". 0 .");\"><img width=\"115\" height=\"175\"  src='". $row['link']."'></button></a></td></tr>";
              }
              echo "</table>";
          
          }
          else {
              echo "<br>Resultados encontrados: Ninguno";
              
          }
        ?></li>
       </ul>
    </div>
  </div> 
</div>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./menu.js"></script>
    </body>
    <footer>
       
    </footer>
</html>
