<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./menu.js"></script>
<script src="//mozilla.github.io/pdf.js/build/pdf.js" crossorigin="anonymous"></script>
<link href="//mozilla.github.io/pdf.js/web/viewer.css" rel="stylesheet" type="text/css" />

<style type="text/css">


#the-canvas {
  border: 2px solid #50dfdb;
  border-radius:5px;
  direction: ltr;
  
}

</style>
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
         <li> <div>
  <select id="selpag" onchange="cambiarpag()"></select>
</div> </li>

         <li ><canvas id="the-canvas"></canvas>
         <div id="textosel" class="textLayer"></div>
        </br>
         <button id="prev">Anterior</button>
  <button id="next">Siguiente</button>
  &nbsp; &nbsp;
  <span id="page_num"></span> / <span id="page_count"></span></span><br>
          </li>
         <li><form >
<textarea readonly type="text" id="sel" placeholder="TEXTO A TRADUCIR" rows="30" cols="100""></textarea>
<input type="button" value="TRADUCIR" onclick="enviar()">
</form>
<div id="trad">
</div>
</li>
       </ul>
    </div>
  </div> 
</div>
       







<script>
function getSelectionText() {
    var text = "";
    var activeEl = document.activeElement;
    var activeElTagName = activeEl ? activeEl.tagName.toLowerCase() : null;
    if (
      (activeElTagName == "textarea") || (activeElTagName == "input" &&
      /^(?:text|search|password|tel|url)$/i.test(activeEl.type)) &&
      (typeof activeEl.selectionStart == "number")
    ) {
        text = activeEl.value.slice(activeEl.selectionStart, activeEl.selectionEnd);
    } else if (window.getSelection) {
        text = window.getSelection().toString();
    }
    return text;
}
var libro= document.getElementById("textosel");
libro.onmouseup = libro.onkeyup = libro.onselectionchange = function() {
  document.getElementById("sel").value = getSelectionText();
};
</script>


<script>
  function enviar()
	{
		// Esta es la variable que vamos a pasar
		var miVariableJS=$("#sel").val();
 
		// Enviamos la variable de javascript a archivo.php
		$.post("archivo.php",{"sel":miVariableJS},function(respuesta){
      document.querySelector("#sel").removeAttribute("readonly");
      document.getElementById('trad').innerHTML = respuesta;
		});
	}

</script>



<script>
/*OBTEBER PARAMETROS POR GET JS*/ 
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
// If absolute URL from the remote server is provided, configure the CORS
// header on that server.
var dir=getParameterByName('nombre');
var url = dir+dir.slice(dir.lastIndexOf("/"),dir.length)+".pdf";

// Loaded via <script> tag, create shortcut to access PDF.js exports.
var pdfjsLib = window['pdfjs-dist/build/pdf'];

// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

var pdfDoc = null,
    pageNum = 1,
    pageRendering = false,
    pageNumPending = null,
    //scale = 0.8,
    scale = 1.0,
    canvas = document.getElementById('the-canvas'),
    ctx = canvas.getContext('2d');

/**
 * Get page info from document, resize canvas accordingly, and render page.
 * @param num Page number.
 */
function renderPage(num) {
  pageRendering = true;
  // Using promise to fetch the page
  pdfDoc.getPage(num).then(function(page) {
    var viewport = page.getViewport({scale: scale});
    canvas.height = viewport.height;
    canvas.width = viewport.width;

    // Render PDF page into canvas context
    var renderContext = {
      canvasContext: ctx,
      viewport: viewport
    };
    var renderTask = page.render(renderContext);

    // Wait for rendering to finish
    renderTask.promise.then(function() {
      pageRendering = false;
      if (pageNumPending !== null) {
        // New page rendering is pending
        renderPage(pageNumPending);
        pageNumPending = null;
      }
    }).then(function() {
      // Returns a promise, on resolving it will return text contents of the page
      return page.getTextContent();
    }).then(function(textContent) {

      // Assign CSS to the textLayer element
      var textLayer = document.querySelector(".textLayer");

      textLayer.style.left = canvas.offsetLeft + 'px';
      textLayer.style.top = canvas.offsetTop + 'px';
      textLayer.style.height = canvas.offsetHeight + 'px';
      textLayer.style.width = canvas.offsetWidth + 'px';

      // Pass the data to the method for rendering of text over the pdf canvas.
      pdfjsLib.renderTextLayer({
        textContent: textContent,
        container: textLayer,
        viewport: viewport,
        textDivs: []
      });
    });
  });

  // Update page counters 
  document.getElementById('page_num').textContent = num;
}

/**
 * If another page rendering in progress, waits until the rendering is
 * finised. Otherwise, executes rendering immediately.
 */
function queueRenderPage(num) {
  if (pageRendering) {
    pageNumPending = num;
  } else {
    renderPage(num);
  }
}

/**
 * Displays previous page.
 */
function onPrevPage() {
  if (pageNum <= 1) {
    return;
  }
  pageNum--;
  queueRenderPage(pageNum);
}
document.getElementById('prev').addEventListener('click', onPrevPage);


/**
 * Displays next page.
 */
function onNextPage() {
  if (pageNum >= pdfDoc.numPages) {
    return;
  }
  pageNum++;
  queueRenderPage(pageNum);
}
document.getElementById('next').addEventListener('click', onNextPage);

/**
 * Asynchronously downloads PDF.
 */
pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
  pdfDoc = pdfDoc_;
  document.getElementById('page_count').textContent = pdfDoc.numPages;

  // Initial/first page rendering
  renderPage(pageNum);

});



function cambiarpag(){
    pagina = parseInt(document.getElementById("selpag").value);
    pageNum=pagina;
      queueRenderPage(pagina);
    }
/* Funcion para seleccionar pagina tiene que estar al final */
pdfjsLib.getDocument(url).promise.then(function selectorpag(pdfDoc_){
  pdfDoc = pdfDoc_;
  var paginas=pdfDoc.numPages;
  for(page=1;page<=paginas; page++){
          var selector=document.getElementById('selpag');
          var option=document.createElement("option");
          selector.appendChild(option);
          option.setAttribute("id","oppag");
          option.setAttribute("value",page);
          option.innerHTML="Página "+page;
        }






});
</script>

</body>
</html>