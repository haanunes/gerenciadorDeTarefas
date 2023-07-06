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
                <p>Por favor, faça login para continuar. Para teste, pode utilizar o email: <span style='color:blue'>ana@gmail.com</span> e senha: <span style='color:blue'>123</span>. Este usuário já está salvo no arquivo de backup.</p>
                <p>Para melhor descrever, esta tela de login realiza criptografia com md5 antes de realizar o login utilizando JS (parte da solicitação do teste). Caso o usuário não informe as credenciais corretas, irá retornar para esta página com um parâmetro get e informando o erro.</p>
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