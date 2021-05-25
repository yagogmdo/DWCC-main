window.onload=function(){
    var pos=window.name || 0;
    window.scrollTo(0,pos);


    var click=document.getElementById("boton");
    var click2=document.getElementById("boton2");
    /*addEventListener("keydown", rotaridioma);*/
    click.addEventListener("click",cambio);
    click2.addEventListener("click",mostrardos);
   /* function rotaridioma(evento){
        tecla=evento.keyCode;
        if(tecla=="17"){
                posicion=1;
                localStorage.setItem("posicion", posicion);
                var localizacion=window.location.href;
                localizacionf=localizacion.slice(0,localizacion.lastIndexOf("&"))+"&pos="+posicion;
                window.open(localizacionf,'_self')
            }else if(tecla="16"){
                posicion=2;
                localStorage.setItem("posicion", posicion);
                var localizacion=window.location.href;
                localizacionf=localizacion.slice(0,localizacion.lastIndexOf("&"))+"&pos="+posicion;
                window.open(localizacionf,'_self')
                
            }
        }*/
        function cambio(){
            if(localStorage.getItem("posicion")==2){
                posicion=1;
                localStorage.setItem("posicion", posicion);
                vez=1;
                var localizacion=window.location.href;
                localizacionf=localizacion.slice(0,localizacion.lastIndexOf("&"))+"&pos="+posicion;
                window.open(localizacionf,'_self')
            }
            else{
            posicion=2;
            localStorage.setItem("posicion", posicion);        
            var localizacion=window.location.href;
            localizacionf=localizacion.slice(0,localizacion.lastIndexOf("&"))+"&pos="+posicion;
            window.open(localizacionf,'_self')
        }
        }
        function mostrardos(){
            posicion=3;
            localStorage.setItem("posicion", posicion);
            var localizacion=window.location.href;
            localizacionf=localizacion.slice(0,localizacion.lastIndexOf("&"))+"&pos="+posicion;
            window.open(localizacionf,'_self');
        }
    }
    
    window.onunload=function(){
        window.name=self.pageYOffset || (document.documentElement.scrollTop+document.body.scrollTop);
        }