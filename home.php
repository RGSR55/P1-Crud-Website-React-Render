
<?php


if (!empty($_SESSION["login"]))   
   { ?>

    <?php echo "<div class='c'>";?>
    <?php echo "Olá " . $_SESSION["nome"] . " faz aqui Pesquisa Rápida";  ?>
    <?php include_once('search.php'); ?>
    
    <?php echo "</div>";?>


<?php

} else {  ?>

    <?php echo "<div class='c'>";?>
    <?php echo "O que procuras?";  ?>
    <?php include_once('search.php'); ?>
    <?php echo "</div>";?>

    

    <h1>A nossa sugestão</h1>  
    <?php include_once('produtos.php'); ?>
    

    <h1>Os mais preferidos</h1>
    <?php include_once('top_vendas.php'); ?>
    
    <h1>As nossas Marcas</h1>
    <?php include_once('marcas.php'); ?>
    <hr>
    <?php include_once('categorias.php'); ?>
   
    


    

  
<?php
}
?>

