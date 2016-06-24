$(document).ready(function() {


  // staff portal bio cards = flip on click
  var $employeeCard = $('.employee-bio');
  $employeeCard.on('click', function() {
    $(this).toggleClass('flip');
  });

  var employeeSort = new EmployeeSort();

});


// sorting for the company directory
function EmployeeSort() {

  // button for office sort
  this.$officeSelect = $('.office-btn');

  // button for name sort
  this.$nameSelect = $('.name-btn');

  // item to hide/show
  this.$sortItem = $('.employee-bio-container');
  
  this.sortByOffice();
  this.sortByName();
}

// sort by office
EmployeeSort.prototype.sortByOffice = function() {
  var _this = this;

  this.$officeSelect.on('click', function(e) {
    e.preventDefault();

    // switch active class to selected button to make blue
    $('.office-btn').removeClass('active');
    $(this).addClass('active');

    // the name button current active
    var nameItemActive = $('.name-sort').data('active-name');

    var selectedOffice = $(this).data('office-selected');

    // loop through cards
    _this.$sortItem.each(function() {

        // the name button current active
        var itemOffice = $(this).data('office');

        // if selected office (button) matches item's office and selected name (button) matches item's name OR selected office (button) matches item's office and selected name (button) is all, fade in
        if(selectedOffice == itemOffice && nameItemActive == $(this).data('name') || selectedOffice == itemOffice && nameItemActive == 'all') {
            $(this).addClass('card-visible').removeClass('card-hidden');

        // if office is all and name is all, fade everything in.
        } else if(selectedOffice == 'all' && nameItemActive == 'all') {
            $(this).addClass('card-visible').removeClass('card-hidden');

        // if office is all and chosen name is same as active name (button)
        } else if(selectedOffice == 'all' && nameItemActive == $(this).data('name')) {
            $(this).addClass('card-visible').removeClass('card-hidden');
        } else {
            $(this).removeClass('card-visible').addClass('card-hidden');
        }

    });

     // assign selected office to container element
    $('.office-sort').data('active-office', selectedOffice);

  });
};

EmployeeSort.prototype.sortByName = function() {
    var _this = this;

    this.$nameSelect.on('click', function(e) {
        e.preventDefault();

        // switch active class to selected button to make blue
        $('.name-btn').removeClass('active');
        $(this).addClass('active');

        // the office button current active
        var officeItemActive = $('.office-sort').data('active-office');

        // get the name clicked item
        var selectedName = $(this).data('name-selected');

        // loop through names
        _this.$sortItem.each(function() {

            // name of card
            var itemName = $(this).data('name');

            // name of office, selected card
            var officeName = $(this).data('office');

            // if selected name matches name of card and office matches chosen office
            if(selectedName == itemName && officeItemActive == officeName || selectedName == itemName && officeItemActive == 'all' ) {
                $(this).addClass('card-visible').removeClass('card-hidden');
            }
            else if(selectedName == 'all' && officeItemActive == 'all') {
                $(this).addClass('card-visible').removeClass('card-hidden');
            }

            // if selected name is all and office matches chosen office
            else if(selectedName == 'all' && officeItemActive == officeName) {
                $(this).addClass('card-visible').removeClass('card-hidden');
            } 

            // if nothing matches, fade out those items
            else {
                $(this).addClass('card-hidden').removeClass('card-visible');
            }
        });

        // assign selected name to container element
        $('.name-sort').data('active-name', selectedName);

    });
};
