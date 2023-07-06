$(document).ready(function() {
   $('#form').submit(function(event) {
      var senha = $('#senha').val();
      var confirmarSenha = $('#confirmarSenha').val();

      // Remover a classe de erro do campo de senha
      $('#senha').removeClass('error-input');
      $('#senhaError').hide().empty();

      // Verificar se as senhas são iguais
      if (senha !== confirmarSenha) {
         $('#senhaError').text('As senhas não correspondem.').show();
         $('#senha').addClass('error-input');
         event.preventDefault(); // Impede o envio do formulário
         return;
      }

      // Criptografar a senha usando MD5
      var senhaCriptografada = md5(senha); // Supondo que você já tenha uma função md5() para criptografar

      // Atualizar o valor do campo de senha com a senha criptografada
      $('#senha').val(senhaCriptografada);
   });
});