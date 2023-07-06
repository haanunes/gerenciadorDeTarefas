<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/control/checarUsuarioLogado.php';
?>

<?php
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/listarUsuarios.js"></script>

        <script src="js/modal.js"></script>
    </head>
    <body>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/gerenciadorDeTarefas/components/cabecalho.php";
        ?>

        <main>
            <div class="form-container">
                <h2>Listar Usuários</h2>

                <form id="formConsulta">
                    <div>
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" placeholder="Nome">
                    </div>
                    <div>
                        <label for="email">E-mail:</label>
                        <input type="text" id="email" placeholder="E-mail">
                    </div>
                </form>
                <table class="table" id='tabela'>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </main>
        <!-- Modal de confirmação -->
        <!-- Modal de confirmação -->
        <div id="confirmModal" class="modal">
            <div class="modal-content">
                <h2>Confirmação de Remoção</h2>
                <p>Deseja realmente remover este item?</p>
                <div class="modal-buttons">
                    <a id="confirmBtn" class='button-link button-red'>Remover</a>
                    <a id="cancelBtn" class='button-link button-blue'>Cancelar</a>
                </div>
            </div>
        </div>

    </body>
</html>