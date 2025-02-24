<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="#">Produtos</a>
        <ul>
              <li><a href="index.php?opcao=produtos_bk"><p>Todos</p></a></li>
              <li><a href="index.php?opcao=categorias">Por categoria</a></li> 
              <li><a href="index.php?opcao=marcas">Por marcas</a></li>   
              
        </ul>
    </li>

    <li><a href="index.php?opcao=top_vendas">Em destaque</a></li>
</ul>



<img src="<?php echo $_SESSION["foto"]; ?>" class="user-pic" onclick="toggleMenu()">

<div class="sub-menu-wrap" id="subMenu">
    <div class="sub-menu">
        <div class="user-info">
            <img src="<?php echo $_SESSION["foto"]; ?>">
            <h3><?php echo $_SESSION["login"]; ?></h3>

        </div>
        <hr>

        <a href="index.php?opcao=perfil" class="sub-menu-link">
            <img src="img/perfil.svg">
            <p>Editar perfil</p>
            <span>></span>
        </a>

        <a href="logout.php" class="sub-menu-link">
            <img src="img/logout.svg">
            <p>Logout</p>
            <span>></span>
        </a>


    </div>

</div>


