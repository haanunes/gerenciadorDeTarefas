function encryptPassword(event) {
  event.preventDefault();

  var passwordField = document.getElementById("senha");
  var password = passwordField.value;

  // Criptografar a senha usando o MD5
  var hashedPassword = md5(password);

  // Atribuir o hash criptografado ao campo de senha
  passwordField.value = hashedPassword;

  // Enviar o formulário para o servidor
  var form = event.target;
  form.submit();
}