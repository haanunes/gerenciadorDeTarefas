<!DOCTYPE html>
<html>
    <head>
        <title>Tela de Login</title>
        <link rel="stylesheet" type="text/css" href="css/style-login.css">
        <script src="js/md5.min.js"></script>
        <script src="js/script.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>Gerenciador de Tarefas</h1>
                <p>Por favor, faça login para continuar.</p>
                <?php 
                if(isset($_GET['erro'])){
                    echo "<p class='erroLogin'>E-mail ou senha incorretos.</p>";
                }
                ?>
            </div>
            <form  action="control/login.php" method="POST" onsubmit="encryptPassword(event)">
                <input type="email" name="email" placeholder="E-mail">
                <input type="password" name="senha" id="senha" placeholder="Senha">
                <button type="submit">Entrar</button>
            </form>
        </div>
    </body>
</html>