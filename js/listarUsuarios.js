$(document).ready(function () {
    // Manipular os eventos 'input' e 'keyup' do campo de texto
    $('#nome, #email').on('input keyup', function () {
        // Obter os valores dos campos
        var nome = $('#nome').val();
        var email = $('#email').val();

        // Verificar se todos os campos estão vazios
        if (!nome && !email) {
            // Limpar a tabela se todos os campos estiverem vazios
            $('#tabela tbody').empty();
        }
        buscarTarefas(nome, email);

    });
    // Função para buscar as usuarios
    function buscarTarefas(nome, email) {
        // Enviar solicitação AJAX para buscar os dados
        $.ajax({
            url: 'control/listarBuscaUsuariosJSON.php',
            type: 'POST',
            dataType: 'json',
            data: {
                nome: nome,
                email: email,
            },
            success: function (response) {
                // Limpar a tabela antes de adicionar os novos dados
                $('#tabela tbody').empty();

                // Verificar se há resultados
                if (response.length > 0) {
                    // Iterar pelos resultados e adicionar cada linha na tabela
                    for (var i = 0; i < response.length; i++) {
                        var usuario = response[i];

                        var linha = '<tr>';
                        linha += '<td>' + usuario.id + '</td>';
                        linha += '<td>' + usuario.nome + '</td>';
                        linha += '<td>' + usuario.email + '</td>';
                        linha += '<td><a href="usuarioAddEdit.php?id=' + usuario.id + '" class="button-link button-blue">Editar</a>'
                        linha += '    <a data-link="./control/usuarioDel.php?id=' + usuario.id + '" class="button-link button-red openModalBtn">Excluir</a></td>'
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
    buscarTarefas('', '');

});