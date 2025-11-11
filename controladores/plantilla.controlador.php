<?php
class Plantilla
{
    public function plantilla()
    {
        include 'vistas/plantilla.php';
    }

    static public function url()
    {
        return 'http://localhost/final2025/';
    }

    static public function generar_url($cadena)
    {
        $separador = '-'; //ejemplo utilizado con guión medio
        $originales =
            'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
        $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
        //Quitamos todos los posibles acentos
        $url = strtr($cadena, $originales, $modificadas);
        //Convertimos la cadena a minusculas
        $url = strtolower($url);
        //Quitamos los saltos de linea y cuanquier caracter especial
        $buscar = array(' ', '&amp;', '\r\n', '\n', '+');
        $url = str_replace($buscar, $separador, $url);
        $buscar = array('/[^a-z0-9\-&lt;&gt;]/', '/[\-]+/', '/&lt;[^&gt;]*&gt;/');
        $reemplazar = array('', $separador, '');
        $url = preg_replace($buscar, $reemplazar, $url);
        return $url;
    }

     /*=============================================
  Función para almacenar imágenes
  =============================================*/

  static public function guardarImagen($image, $folder, $width, $height, $name){

    if(isset($image["tmp_name"]) && !empty($image["tmp_name"])){ 

      /*=============================================
      Configuramos la ruta del directorio donde se guardará la imagen
      =============================================*/

      $directory = strtolower("vistas/".$folder);

      /*=============================================
      Preguntamos primero si no existe el directorio, para crearlo
      =============================================*/

      if(!file_exists($directory)){

        mkdir($directory, 0755);

      }     
      
      /*=============================================
      Capturar ancho y alto original de la imagen
      =============================================*/

      list($lastWidth, $lastHeight) = getimagesize($image["tmp_name"]);     

      /*=============================================
      De acuerdo al tipo de imagen aplicamos las funciones por defecto
      =============================================*/

      if($image["type"] == "image/jpeg"){

        //definimos nombre del archivo
        $newName  = $name.'.jpg';

        //definimos el destino donde queremos guardar el archivo
        $folderPath = $directory.'/'.$newName;

        if(isset($image["mode"]) && $image["mode"] == "base64"){

          file_put_contents($folderPath, file_get_contents($image["tmp_name"]));

        }else{

          //Crear una copia de la imagen
          $start = imagecreatefromjpeg($image["tmp_name"]);

          //Instrucciones para aplicar a la imagen definitiva
          $end = imagecreatetruecolor($width, $height);

          imagecopyresized($end, $start, 0, 0, 0, 0, $width, $height, $lastWidth, $lastHeight);

          imagejpeg($end, $folderPath);

        }

      }

      if($image["type"] == "image/gif"){

        //definimos nombre del archivo
        $newName  = $name.'.gif';

        //definimos el destino donde queremos guardar el archivo
        $folderPath = $directory.'/'.$newName;

        if(isset($image["mode"]) && $image["mode"] == "base64"){

          file_put_contents($folderPath, file_get_contents($image["tmp_name"]));

        }else{

          //Crear una copia de la imagen
          $start = imageCreateFromGif($image["tmp_name"]);

          //Instrucciones para aplicar a la imagen definitiva
          $end = imagecreatetruecolor($width, $height);

          imagecopyresized($end, $start, 0, 0, 0, 0, $width, $height, $lastWidth, $lastHeight);

          imagegif($end, $folderPath);

        }

      }

      if($image["type"] == "image/png"){

        //definimos nombre del archivo
        $newName  = $name.'.png';

        //definimos el destino donde queremos guardar el archivo
        $folderPath = $directory.'/'.$newName;

        if(isset($image["mode"]) && $image["mode"] == "base64"){

          file_put_contents($folderPath, file_get_contents($image["tmp_name"]));

        }else{

          //Crear una copia de la imagen
          $start = imagecreatefrompng($image["tmp_name"]);

          //Instrucciones para aplicar a la imagen definitiva
          $end = imagecreatetruecolor($width, $height);

          imagealphablending($end, FALSE);
          
          imagesavealpha($end, TRUE); 

          imagecopyresampled($end, $start, 0, 0, 0, 0, $width, $height, $lastWidth, $lastHeight);

          imagepng($end, $folderPath);

        }

      }

      return $newName;

    }else{

      return "error";

    }

  }

}
