<div class="container2">
<form action="" method="post">
    <p><input type="text" name="pesquisa" placeholder="pesquisar...."></p>
    
</form>

</div>


<?php


if (!empty($_POST["pesquisa"])) {

   
    include("config.php");

    $pesquisa = $_POST["pesquisa"];

    // $pesquisa = explode (" ", $pesquisa);

    // $sql = "SELECT * FROM produto where produto like '%".$pesquisa[0]."%' or produto like '%".$pesquisa[1]."%'";

    $sql = "SELECT * FROM produto where produto like '%".$pesquisa."%'";


    $result =$conn->query($sql); 

    while($row = $result->fetch_array()){

        // echo $row['produto']." - ".$row['preco']."€"."<br>";

        echo "<a href='index.php?opcao=produto&id=" . $row["idproduto"] . "'>";
        echo $row['produto']." - ".$row['preco']."€"."<br>";

        
    
    
    }
}

?>