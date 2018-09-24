function search(id) {
  var col = $(id).attr('id');
  // Declare variables
  var input, filter, table, tr, td, i;
  filter = $(id).val().toUpperCase();
  table = $('#Membres');
  tr = $('tr').length;

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 1; i < tr; i++) {
    td = $('tr').eq(i).children().filter('.' + col);
    console.log(td)
    if (td) {
      if ($(td).text().toUpperCase().indexOf(filter) > -1) {
        $('tr').eq(i).show();
      } else {
        $('tr').eq(i).hide();
      }
    }
  }
}
