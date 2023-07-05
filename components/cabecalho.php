<header>
    <h1>Dashboard</h1>
    
    <nav>
        <ul>
            <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/gerenciadorDeTarefas/dashboard.php"; ?>">Home</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Tarefas</a>
                <div class="dropdown-content">
                    <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/gerenciadorDeTarefas/tarefaAddEdit.php"; ?>">Cadastrar</a>
                    <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/gerenciadorDeTarefas/tarefaList.php"; ?>">Listar</a>
                    <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/gerenciadorDeTarefas/tarefas.php"; ?>">Gerenciar</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Usuários</a>
                <div class="dropdown-content">
                    <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/gerenciadorDeTarefas/usuarioAddEdit.php"; ?>">Cadastrar</a>
                    <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/gerenciadorDeTarefas/usuarioList.php"; ?>">Listar</a>
                </div>
            </li>
            <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/gerenciadorDeTarefas/sair.php"; ?>">Logout</a></li>
        </ul>
    </nav>
</header>