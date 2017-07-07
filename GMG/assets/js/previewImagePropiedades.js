function archivo(evt) {
      var files = evt.target.files; // FileList object
      var idChange = evt.target.id;
      var idImg = idChange.concat("_img");
      
        //Obtenemos la imagen del campo "file". 
      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('image.*')) {
                continue;
           }
       
           var reader = new FileReader();
           
           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la imagen.
                  document.getElementById(idImg).innerHTML = ['<img class="thumb" align="middle" height="200px" width="200px" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
}
      
//Aqui se agregan los selectores de los archivos a subir


		  //Seccion de Propiedades
	      document.getElementById('Propiedades1file1').addEventListener('change', archivo, false);
	      document.getElementById('Propiedades2file1').addEventListener('change', archivo, false);
	      document.getElementById('Propiedades3file1').addEventListener('change', archivo, false);
	      document.getElementById('Propiedades4file1').addEventListener('change', archivo, false);
	      document.getElementById('Propiedades5file1').addEventListener('change', archivo, false);
	      document.getElementById('Propiedades6file1').addEventListener('change', archivo, false);
	      document.getElementById('Propiedades7file1').addEventListener('change', archivo, false);
	      document.getElementById('Propiedades8file1').addEventListener('change', archivo, false);
	      document.getElementById('Propiedades9file1').addEventListener('change', archivo, false);
	      document.getElementById('Propiedades10file1').addEventListener('change', archivo, false);
	      document.getElementById('Propiedades11file1').addEventListener('change', archivo, false);
	      document.getElementById('Propiedades12file1').addEventListener('change', archivo, false);
      
      
      