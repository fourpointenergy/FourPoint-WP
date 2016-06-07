$(document).ready(function() {


  // staff portal bio cards = flip on click
  var $employeeCard = $('.employee-bio');
  $employeeCard.on('click', function() {
    $(this).toggleClass('flip');
  });

});