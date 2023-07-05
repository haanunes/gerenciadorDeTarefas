$(document).ready(function() {
  var link;

  $('.openModalBtn').on('click', function() {
    link = $(this).data('link');
    $('#confirmModal').css('display', 'block');
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