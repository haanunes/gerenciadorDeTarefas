<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/control/checarUsuarioLogado.php';
?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/vo/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/UsuarioDAO.php';

$usuario = null;
if (isset($_GET['id'])) {
    $usuario = UsuarioDAO::getInstance()->getById($_GET['id']);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo ($usuario == null ? "Adicionar" : "Editar") ?> Usuário</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/md5.min.js"></script>
        <script src="js/addUsuario.js"></script>
    </head>
    <body>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/gerenciadorDeTarefas/components/cabecalho.php";
        ?>

        <main>
            <div class="form-container">
                <h2><?php echo ($usuario == null ? "Adicionar" : "Editar") ?> Usuário</h2>
                <?php
                if (isset($_GET['erro'])) {
                    echo "<p class='erroLogin'>Preencha todos os campos.</p>";
                }
                ?>
                <form id='form' action="control/usuario.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo ($usuario == null ? "0" : $usuario->getId()) ?>" />

                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?php echo ($usuario == null ? "" : $usuario->getNome()) ?>" required>

                    <label for="email">E-mail:</label>
                    <input type='email' id="email" name="email" required value='<?php echo ($usuario == null ? "" : $usuario->getEmail()) ?>'/>

                    <?php if ($usuario == null) { ?>
                        <div id="senhaError" class="error-message"></div>
                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" required >

                        <label for="confirmarSenha">Confirmar Senha:</label>
                        <input type="password" id="confirmarSenha" name="confirmarSenha" required >
                    <?php } ?>

                    <input type="submit" value="Salvar">
                </form>
            </div>
        </main>

    </body>
</html>