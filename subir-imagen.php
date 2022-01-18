<?php 
 
$path = "./". basename($_FILES['imagen']['name']); 
 
if(move_uploaded_file($_FILES['imagen']['tmp_name'], $path)) {
    /*echo "El archivo ".  basename( $_FILES['imagen']['name']). " ha sido subido";*/
    
    /* Cambiamos el tamaño de archivo */
    $imagen=basename($_FILES['imagen']['name']);
    $cmd="convert $imagen -resize 600 imagenS.jpg";
    /* echo $cmd;*/
    echo shell_exec($cmd);

    /* Agregamos el nombre de usuario */
    /* TO DO 
    $cmd=
    echo shell_exec($cmd);
    */

    /* Agregamos la marca de agua */
    /* TO DO Agregar nombre de usuario */
    $cmd="composite logo_s.png imagenS.jpg -gravity northeast -geometry +5+5 salida.jpg";
    /*echo $cmd;*/
    echo shell_exec($cmd);

    /* Mostramos la imagen */
   echo "<img src='salida.jpg'>";


} else{
    echo "El archivo no se ha subido correctamente";
}