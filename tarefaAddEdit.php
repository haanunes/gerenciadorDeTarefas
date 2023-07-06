<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/control/checarUsuarioLogado.php';
?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/vo/Tarefa.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/dao/TarefaDAO.php';

$tarefa = null;
if (isset($_GET['id'])){
    $tarefa = TarefaDAO::getInstance()->getById($_GET['id']);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo ($tarefa==null?"Adicionar":"Editar") ?> Tarefa</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/gerenciadorDeTarefas/components/cabecalho.php";
        ?>

        <main>
            <div class="form-container">
                <h2><?php echo ($tarefa==null?"Adicionar":"Editar") ?> Tarefa</h2>
                <?php
                if (isset($_GET['erro'])) {
                    echo "<p class='erroLogin'>Preencha todos os campos.</p>";
                }
                ?>
                <form action="control/tarefa.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo ($tarefa==null?"0":$tarefa->getId()) ?>" />

                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" value="<?php echo ($tarefa==null?"":$tarefa->getTitulo()) ?>" required>

                    <label for="descricao">Descrição:</label>
                    <textarea id="descricao" name="descricao" required ><?php echo ($tarefa==null?"":$tarefa->getDescricao()) ?></textarea>


                    <label for="dataPrazo">Data de Prazo:</label>
                    <input type="date" id="dataPrazo" name="dataPrazo" required value="<?php echo ($tarefa==null?"":$tarefa->getDataPrazo()) ?>">

                    <label for="idUsuarioResponsavel">Usuário Responsável:</label>
                    <select id='idUsuarioResponsavel' name='idUsuarioResponsavel'>
                        <option value='' >Selecione</option>
                        <?php
                        require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/model/bo/UsuarioBO.php';
                        $listaUsuarios = UsuarioBO::listarUsuariosOrdenadoPorNomeAscendente();
                        foreach ($listaUsuarios as $usuario) {
                            echo "<option value='" . $usuario->getId() . "' ".($tarefa==null?"":($tarefa->getIdUsuarioResponsavel()==$usuario->getId()?" selected ":""))." >" . $usuario->getNome() . "</option>";
                        }
                        ?>
                    </select>
                    
                    <label for="concluida">Concluída:</label>
                    <select id='concluida' name='concluida'>
                        <option value='Não' <?php echo ($tarefa!=null&&$tarefa->getConcluida()=="Não"?"selected":"")?> >Não</option>
                        <option value='Sim' <?php echo ($tarefa!=null&&$tarefa->getConcluida()=="Sim"?"selected":"")?> >Sim</option>
                    </select>

                    <label for="cor">Cor:</label>
                    <input type="color" id="cor" name="cor" required value="<?php echo ($tarefa==null?"":$tarefa->getCor()) ?>">

                    <input type="submit" value="Salvar">
                </form>
            </div>
        </main>

    </body>
</html>