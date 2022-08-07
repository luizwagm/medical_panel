<div class="sidebar-menu noPrint">
    <ul class="menu">      
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <span>Listas de reembolso</span>
            </a>
        </li>
        <?php if(in_array('Bradesco', $_SESSION['payload']->modules)) { ?><li class="sidebar-item <?php if (MENU == 'lista-bradesco') { echo 'active'; } ?>">
            <a href="./lista-bradesco.php" class='sidebar-link'><span>> Bradesco</span></a>
        </li><?php } ?>
        <?php if(in_array('Amil', $_SESSION['payload']->modules)) { ?><li class="sidebar-item <?php if (MENU == 'lista-amil') { echo 'active'; } ?>">
            <a href="./lista-amil.php" class='sidebar-link'><span>> Amil</span></a>
        </li><?php } ?>

        <li class="sidebar-item <?php if (MENU == 'credenciais') { echo 'active'; } ?>">
            <a href="./credenciais.php" class='sidebar-link'>
                <span>Credenciais de pacientes</span>
            </a>
        </li> 

        <li class="sidebar-item <?php if (MENU == 'protocolos') { echo 'active'; } ?>">
            <a href="./protocolos.php" class='sidebar-link'>
                <span>Protocolos</span>
            </a>
        </li> 

        <li class="sidebar-item <?php if (MENU == 'configuracoes') { echo 'active'; } ?>">
            <a href="./configuracoes.php" class='sidebar-link'>
                <span>Configurações</span>
            </a>
        </li> 

        <li class="sidebar-item">
            <a href="./actions/sair.php" class='sidebar-link'>
                <span>Sair</span>
            </a>
        </li> 
    </ul>
</div>