<html>
    <head>
        <script src="biblio.js"></script></script>
        <script src="lectura.js"></script></script>     
        <link rel="stylesheet" href="biblio.css">
        <link type=text/css href=zoomy.css rel=stylesheet />  
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./menu.js"></script>
        <script src=zoomy.js></script>
        <script >
        $(function(){
          $('.zoom').zoomy({
            zoomSize: 306,
            round: true,
            border:'6px solid #fff'
          });
        });
      </script>
        

 
      </head>
    <body>
    <button id="boton"class="btn-flotante">Cambio</button>
    <button id="boton2"class="btn-flotante2">Mostrar ambos</button>
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
    
    function archivos($directorio){
    $dirint = dir($directorio);
    $array=[];
        while (($archivo = $dirint->read()) !== false){
            if (stristr($archivo,"jpg")||stristr($archivo,"png")){
                 array_push($array,$archivo);
        }	
        }
        sort($array,SORT_NATURAL);
        $page=0;
        if($array[$page]=="Image-1.jpg"){
        echo "<a class=\"zoom\" href='".$directorio."/Image-1.jpg'><img class=\"imgmanga\"  src='".$directorio."/Image-1.jpg'></a>";}
    
        for($page;$page<count($array);$page++){
            if($array[$page]!="Image-1.jpg"){
                echo "<a class=\"zoom\" href='".$directorio."/".$array[$page]."'><img class=\"imgmanga\" src='".$directorio."/".$array[$page]."' ></a>";}
        }
        $dirint->close();
        ?>        
      <?php
    }
    
    if($_REQUEST['pos']==1){
    archivos($_REQUEST['nombre']);}
    elseif($_REQUEST['pos']==2){
        archivos($_REQUEST['trad']);
    }
    elseif($_REQUEST['pos']==3){
        ?>
    <table class="ambos">
            <tr>
                <th>Original</th>
                <th>Traducción</th>
            </tr>
    <tr>
        <td class="orig"><?php
        archivos($_REQUEST['nombre']);?>
      </td>
        <td class="traduc"><?php archivos($_REQUEST['trad']);?></td>
    </tr>
    
    </table>
    
    
    <?php
    }
    ?></li>
       </ul>
    </div>
  </div> 
</div>
    </body>
    <footer>
    </footer>
</html>
