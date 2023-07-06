$(document).ready(function () {
    // Manipular os eventos de tecla pressionada e alteração do campo
    $('#titulo, #idUsuarioResponsavel, #idUsuarioCriador, #dataCriacaoInicial, #dataCriacaoFinal, #dataPrazoInicial, #dataPrazoFinal, #concluida').on('change', function () {
        var titulo = $('#titulo').val();
        var idUsuarioResponsavel = $('#idUsuarioResponsavel').val();
        var idUsuarioCriador = $('#idUsuarioCriador').val();
        var concluida = $('#concluida').val();
        var dataCriacaoInicial = $('#dataCriacaoInicial').val();
        var dataCriacaoFinal = $('#dataCriacaoFinal').val();
        var dataPrazoInicial = $('#dataPrazoInicial').val();
        var dataPrazoFinal = $('#dataPrazoFinal').val();

        // Realizar a busca somente se houver algum valor nos campos
        if (titulo || concluida|| idUsuarioResponsavel || idUsuarioCriador || dataCriacaoInicial !== null || dataCriacaoFinal !== null || dataPrazoInicial !== null || dataPrazoFinal !== null) {
            buscarTarefas(titulo, idUsuarioResponsavel, idUsuarioCriador, dataCriacaoInicial, dataCriacaoFinal, dataPrazoInicial, dataPrazoFinal, concluida);
        } else {
            // Limpar a tabela se os campos estiverem vazios
            $('#tabela tbody').empty();
        }
    });

    $('#titulo').on('keyup', function () {
        var titulo = $('#titulo').val();
        var idUsuarioResponsavel = $('#idUsuarioResponsavel').val();
        var idUsuarioCriador = $('#idUsuarioCriador').val();
        var dataCriacaoInicial = $('#dataCriacaoInicial').val();
        var dataCriacaoFinal = $('#dataCriacaoFinal').val();
        var dataPrazoInicial = $('#dataPrazoInicial').val();
        var dataPrazoFinal = $('#dataPrazoFinal').val();
         var concluida = $('#concluida').val();
        // Realizar a busca somente se houver algum valor nos campos
        if (titulo ||concluida|| idUsuarioResponsavel || idUsuarioCriador || dataCriacaoInicial !== null || dataCriacaoFinal !== null || dataPrazoInicial !== null || dataPrazoFinal !== null) {
            buscarTarefas(titulo, idUsuarioResponsavel, idUsuarioCriador, dataCriacaoInicial, dataCriacaoFinal, dataPrazoInicial, dataPrazoFinal, concluida);
        } else {
            // Limpar a tabela se os campos estiverem vazios
            $('#tabela tbody').empty();
        }
    });

    // Função para buscar as tarefas
    function buscarTarefas(titulo, idUsuarioResponsavel, idUsuarioCriador, dataCriacaoInicial, dataCriacaoFinal, dataPrazoInicial, dataPrazoFinal,concluida) {
        // Enviar solicitação AJAX para buscar os dados
        $.ajax({
            url: 'control/listarBuscaTarefasJSON.php',
            type: 'POST',
            dataType: 'json',
            data: {
                titulo: titulo,
                idUsuarioResponsavel: idUsuarioResponsavel,
                idUsuarioCriador: idUsuarioCriador,
                dataCriacaoInicial: dataCriacaoInicial,
                dataCriacaoFinal: dataCriacaoFinal,
                dataPrazoInicial: dataPrazoInicial,
                dataPrazoFinal: dataPrazoFinal,
                concluida:concluida
            },
            success: function (response) {
                // Limpar a tabela antes de adicionar os novos dados
                $('#tabela tbody').empty();

                // Verificar se há resultados
                if (response.length > 0) {
                    // Iterar pelos resultados e adicionar cada linha na tabela
                    for (var i = 0; i < response.length; i++) {
                        var tarefa = response[i];

                        var linha = '<tr>';
                        linha += '<td>' + tarefa.id + '</td>';
                        linha += '<td>' + tarefa.titulo + '</td>';
                        linha += '<td>' + tarefa.descricao + '</td>';
                        linha += '<td>' + tarefa.dataCriacao + '</td>';
                        linha += '<td '+classDataAtrasada(tarefa.dataPrazo,tarefa.concluida)+'>' + tarefa.dataPrazo + '</td>';
                        linha += '<td>' + tarefa.usuarioCriador + '</td>';
                        linha += '<td>' + tarefa.usuarioResponsavel + '</td>';
                        linha += '<td>' + tarefa.concluida + '</td>';
                        linha += '<td style="background-color:' + tarefa.cor + '"></td>';
                        linha += '<td><a href="tarefaAddEdit.php?id=' + tarefa.id + '" class="button-link button-blue">Editar</a>'
                        linha += '    <a data-link="./control/tarefaDel.php?id=' + tarefa.id + '" class="button-link button-red openModalBtn">Excluir</a></td>'
                        linha += '</tr>';

                        $('#tabela tbody').append(linha);
                    }
                } else {
                    // Exibir uma mensagem caso não haja resultados
                    var linhaVazia = '<tr><td colspan="9">Nenhum resultado encontrado</td></tr>';
                    $('#tabela tbody').append(linhaVazia);
                }
            },
            error: function () {
                // Tratar erros, se necessário
                var linhaErro = '<tr><td colspan="9">Erro ao realizar a busca</td></tr>';
                $('#tabela tbody').append(linhaErro);
            }
        });
    }

    // Acionar a consulta quando a página for carregada
    buscarTarefas('', '', '', null, null, null, null);

    // Verificar se a data está atrasada
    function classDataAtrasada(data,concluida) {
        var dataAtual = new Date(); 
        var dataPrazo = new Date(data);
        dataAtual.setHours(0, 0, 0, 0);
        dataPrazo.setHours(0, 0, 0, 0);
        if(concluida=="Sim"){
             return "style='color : green'"; // Data atrasada
        }
        else if (dataPrazo < dataAtual) {
            return "style='color : red'"; // Data atrasada
        } else if (dataPrazo > dataAtual) {
              return "style='color : blue'"; // Data não está atrasada
        }else{
               return "style='color : orange'"; // entrega é hoje
        }
    }
});