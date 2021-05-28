<?php include 'conexion.php';?>
<html>
    <head>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./menu.js"></script>
        <script src="biblio.js"></script></script>
        <script src="menu.js"></script></script>
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="valoraciones.min.js"></script>
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
       
       if(!empty($_GET))
       {
             $aKeyword = explode(" ", $_GET['id']);
             $query ="SELECT * FROM general WHERE iduni=$aKeyword[0]";
             $nombre="";
             $numero;
             $result = $db->query($query);
           
                            
            if(mysqli_num_rows($result) > 0) {
               $row_count=0;
               While($row = $result->fetch_assoc()) {   
                   $row_count++;
                   $nombre=$row['nombre'];
                   $numero=$row['numero'];
                   if($row['tipo']=="novela"){
                    echo "<div  class='menuizq'><h2>". $row['nombre'] . " ". $row['numero'] . "</h2><p>". $row['descripcion'] . " </p></div>";       
                    echo "<div  class='container'><div style='background-image:url(".$row['imagenback'].");' class='background-img'></div><div  class='box'><span></span><span></span><span></span><span></span> <a class='content' href='#' ><img  onclick=\"abrirdirectorio2(".$row["iduni"].");\"  id=\"".$row['iduni']."\" width=\"320\" height=\"450\"  src='". $row['link']."'/></a>"?>
                    
                    <div id="puntos"></div>
                      <p id="puntuacion">Puntuación: <span></span></p>
                    <script>
                      var id=document.querySelector("a>img").getAttribute("id");
                      var puntuaciones = function(datos) {
                      $parrafo=datos.selector.next('#puntuacion');
                      $parrafo.children('span').text(datos.valor);
                      sessionStorage.setItem('puntuacion'+id, datos.valor);
                      
                        };
                        $parrafo=document.querySelector('#puntuacion>span');
                        $parrafo.innerHTML=sessionStorage.getItem('puntuacion'+id);
                    
                      $(function() {$('#puntos').valoraciones({star_tot:10, star_max:100,star_size:1,star_valor:sessionStorage.getItem('puntuacion'+id), evento:'click', callback:puntuaciones});});
                      
                      
                    </script>
                    
                    
                    
                    <?php
                    echo "</div></div>";
                   }
                   else{   
                   echo "<div  class='menuizq'><h2>". $row['nombre'] . " ". $row['numero'] . "</h2><p>". $row['descripcion'] . " </p></div>";       
                   echo "<div class='container'><div style='background-image:url(".$row['imagenback'].");' class='background-img'></div><div  class='box'><span></span><span></span><span></span><span></span> <a class='content' href='#' ><img  onclick=\"abrirdirectorio(".$row["iduni"].");\"  id=\"".$row['iduni']."\" width=\"320\" height=\"450\"  
                   src='". $row['link']."'/></a>"?>
                  
                   <div id="puntos"></div>
                      <p id="puntuacion">Puntuación: <span></span></p>
                    <script>
                      var id=document.querySelector("a>img").getAttribute("id");
                      var puntuaciones = function(datos) {
                      $parrafo=datos.selector.next('#puntuacion');
                      $parrafo.children('span').text(datos.valor);
                      sessionStorage.setItem('puntuacion'+id, datos.valor);
                      
                        };
                        $parrafo=document.querySelector('#puntuacion>span');
                        $parrafo.innerHTML=sessionStorage.getItem('puntuacion'+id);
                    
                      $(function() {$('#puntos').valoraciones({star_tot:10, star_max:100,star_size:1,star_valor:sessionStorage.getItem('puntuacion'+id), evento:'click', callback:puntuaciones});});
                      
                      
                    </script>



                   <?php
                   echo "</div></div>";
                    }
                  }
           }
           else {
               echo "<br>Resultados encontrados: Ninguno";
               
           }
           $query2 ="SELECT * FROM general WHERE nombre='$nombre'";
           $result2 = $db->query($query2);
           if(mysqli_num_rows($result2) > 1){
             echo "<h4>Más de ".$nombre."</h4>";
             print("<table><tr>");
            While($row = $result2->fetch_assoc()) {
              if($row['numero']!=$numero){
            echo "<td><a class=\"lista\" href=\"\"><img id=\"".$row['iduni']."\" width=\"255\" height=\"370\" src=\"" .$row['link'] ."\" onclick=\"return mostrardescripcion(". $row['iduni'] .");\"></img></a></td>";
          }
          }
          print("</tr></table>");
      }

       }
       
         ?>
         
         
         
         
         </li>
       </ul>
    </div>
  </div> 
</div>
    </body>
    <footer>
       
    </footer>
</html>
