<form method="post" enctype="multipart/form-data"> 
    <p>ficheiro: <input type="file" name="ficheiro"></p>
    <button>enviar</button>
</form>

<?php

if($_FILES){

    echo"nome original do ficheiro: ".$_FILES["ficheiro"]["name"]."<br>";
    echo "tamanho em bytes: ".$_FILES["ficheiro"]["size"]."<br>";
    //image/bmp    application/pdf 
    echo "tipo de ficheiro (código MIME): ".$_FILES["ficheiro"]["type"]."<br>";
    echo "nome do ficheiro temporário: ".$_FILES["ficheiro"]["tmp_name"]."<br>";
    echo "código de erro( 0 - ok!): ".$_FILES["ficheiro"]["error"]."<br>";

    
   if (move_uploaded_file($_FILES["ficheiro"]["tmp_name"], "img/".$_FILES["ficheiro"]["name"])){

        echo "<p>imagem submetida com sucesso!</p>";
   }




}
?>