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
        <script src="js/listarTarefas.js"></script>

        <script src="js/modal.js"></script>
    </head>
    <body>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/gerenciadorDeTarefas/components/cabecalho.php";
        ?>

        <main>
            <div class="form-container">
                <h2>Listar Tarefas</h2>

                <form id="formConsulta">
                    <div>
                        <label for="titulo">Título:</label>
                        <input type="text" id="titulo" placeholder="Título">
                    </div>
                    <div>
                    <label for="idUsuarioResponsavel">Usuário Responsável:</label>
                    <select id='idUsuarioResponsavel'>
                        <option value='' >Selecione</option>
                        <?php
                        require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/bo/UsuarioBO.php';
                        $listaUsuarios = UsuarioBO::listarUsuariosOrdenadoPorNomeAscendente();
                        foreach ($listaUsuarios as $usuario) {
                            echo "<option value='" . $usuario->getId() . "' >" . $usuario->getNome() . "</option>";
                        }
                        ?>
                    </select>
                     </div>
                    <div>
                    <label for="idUsuarioCriador">Usuário Criador:</label>
                    <select id='idUsuarioCriador'>
                        <option value='' >Selecione</option>
                        <?php
                        require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/bo/UsuarioBO.php';
                        $listaUsuarios = UsuarioBO::listarUsuariosOrdenadoPorNomeAscendente();
                        foreach ($listaUsuarios as $usuario) {
                            echo "<option value='" . $usuario->getId() . "' >" . $usuario->getNome() . "</option>";
                        }
                        ?>
                    </select>
                     </div>
                    <div>
                    <label >Data de Criação:</label>
                    <input type="date" id="dataCriacaoInicial" placeholder="Data de Criação Inicial">
                    <input type="date" id="dataCriacaoFinal" placeholder="Data de Criação Final">
                     </div>
                    <div>
                    <label >Data de Prazo:</label>
                    <input type="date" id="dataPrazoInicial" placeholder="Data de Prazo Inicial">
                    <input type="date" id="dataPrazoFinal" placeholder="Data de Prazo Final">
                    </div>
                </form>
                <table class="table" id='tabela'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th class='fixed-column'>Descrição</th>
                            <th>Data de Criação</th>
                            <th>Data de Prazo</th>
                            <th>Usuário Criador</th>
                            <th>Usuário Responsável</th>
                            <th>Cor</th>
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