
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="#">Produtos</a>
        <ul>
            <li><a href="index.php?opcao=produtos_bk">Lista</a></li>
            <li><a href="index.php?opcao=inserir_produto">Inserir novo</a></li>
            <li><a href="index.php?opcao=eliminar_produto">Eliminar produto</a></li>

        </ul>

    </li>

    <li><a href="#">Categorias</a>
        <ul>
            <li><a href="index.php?opcao=categorias">Lista</a></li>
            <li><a href="index.php?opcao=inserir_categoria">Inserir nova</a></li>
            <li><a href="index.php?opcao=eliminar_categoria">Eliminar categoria</a></li>
        </ul>

    </li>

    <li><a href="#">Marcas</a>
        <ul>
            <li><a href="index.php?opcao=marcas">Lista</a></li>
            <li><a href="index.php?opcao=inserir_marca">Inserir nova</a></li>
            <li><a href="index.php?opcao=eliminar_marca">Eliminar marca</a></li>
            
        </ul>

    </li>

    <li><a href="#">Painel Admin</a>
        <ul>
            
            <li><a href="index.php?opcao=vendas">Todas as vendas</a></li>   
            <li><a href="index.php?opcao=vendas_report">Vendas por data</a></li>
            <li><a href="index.php?opcao=inserir_venda">Inserir Venda</a></li>
            <li><a href="index.php?opcao=upload">Gerir Users</a></li>
            
        </ul>

    </li>

    
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

