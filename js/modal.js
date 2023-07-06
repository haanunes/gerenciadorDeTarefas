$(document).ready(function() {
  var link;

   $(document).on('click', '.openModalBtn', function (event) {
    event.preventDefault();
    var link = $(this).data('link');
    $('#confirmModal').css('display', 'block');
    $('#confirmBtn').attr('href', link); // Definir o link do botão de confirmação do modal
  });


  // Confirmar remoção
  $('#confirmBtn').on('click', function() {
    window.location.href = link;
    console.log('Item removido');
    $('#confirmModal').css('display', 'none');
  });

  
  $('#cancelBtn').on('click', function() {
    $('#confirmModal').css('display', 'none');
  });
});