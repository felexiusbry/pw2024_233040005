$(document).ready(function () {
  // submit form dengan AJAX
  $('#form-cari').keyup(function (event) {
    event.preventDefault();
    var keyword = $('#keyword').val();
    searchFilm(keyword);
  });

  // fungsi untuk mencari Film
  function searchFilm(keyword) {
    $.ajax({
      url: 'ajax/ajax_search.php',
      type: 'GET',
      data: { keyword: keyword },
      success: function (response) {
        $('#container').html(response);
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  }
});
