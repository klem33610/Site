function show_Table(table) {
  $(table).find(".other_text").each(function(){
    $(this).show(300);
    $('#cardMembre').each(function(){
      $(this).css('width','100%');
    })
  })
}
function search(id) {
  var col = $(id).attr('id');
  // Declare variables
  var input, filter, table, tr, td, i;
  filter = $(id).val().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g, "");
  table = $('#Membres');
  tr = $('tr').length;

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 1; i < tr; i++) {
    td = $('tr').eq(i).children().filter('.' + col);
    if (td) {
      var str = $(td).text();
      var string = str.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
      if (string.toUpperCase().indexOf(filter) > -1) {
        $('tr').eq(i).show();
      } else {
        $('tr').eq(i).hide();
      }
    }
  }
}
function sortTable(id) {
  var col = $(id).attr('id');
  var j, z;
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = $('#Membres');
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc";
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = $('tr').length;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows - 1); i++) {
      j = $('tr').eq(i);
      z = $('tr').eq(i + 1)
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = $('tr').eq(i).children().filter('.' + col);
      y = $('tr').eq(i + 1).children().filter('.' + col);
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if ($(x).text().toLowerCase() > $(y).text().toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if ($(x).text().toLowerCase() < $(y).text().toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      $(j).before(z);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
