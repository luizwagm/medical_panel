<div class="sidebar-menu noPrint">
    <ul class="menu">      
        <li class="sidebar-item <?php if (MENU == 'lista') { echo 'active'; } ?>">
            <a href="./lista.php" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Lista</span>
            </a>
        </li> 

        <li class="sidebar-item <?php if (MENU == 'credenciais') { echo 'active'; } ?>">
            <a href="./credenciais.php" class='sidebar-link'>
                <i class="bi bi-people-fill"></i>
                <span>Credenciais de pacientes</span>
            </a>
        </li> 

        <li class="sidebar-item <?php if (MENU == 'protocolos') { echo 'active'; } ?>">
            <a href="./protocolos.php" class='sidebar-link'>
                <i class="bi bi-xorg"></i>
                <span>Protocolos</span>
            </a>
        </li> 

        <li class="sidebar-item <?php if (MENU == 'configuracoes') { echo 'active'; } ?>">
            <a href="./configuracoes.php" class='sidebar-link'>
                <i class="bi bi-xorg"></i>
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