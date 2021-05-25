function mostrardescripcion(id){
    location.href="descripcion.php?id="+id+"";
    return false;

}

function abrirdirectorio(numero){
    var manga=document.getElementById(numero).getAttribute("src");
    var dirmanga=manga.slice(0,manga.lastIndexOf("/"));
    location.href="manga.php?nombre="+dirmanga+"&trad="+dirmanga+"/tradesp&pos="+posicion+"";
    return false;
}


function abrirdirectorio2(numero){
   var nov=document.getElementById(numero).getAttribute("src");
    var dirnov=nov.slice(0,nov.lastIndexOf("/"));
   location.href="lecturalibro.php?nombre="+dirnov+"";
   return false;
}









var ventana;
var posicion=1;
