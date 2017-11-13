
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

 $(function () {

    $('.type-toggle').click(function() {
    if($('.type-toggle.consolidation').is(':checked')) { 
      $('.consolidation-tab').show();
      $('.creditor-tab').hide();
    } else {
      $('.consolidation-tab').hide();
      $('.creditor-tab').show();
    }
  });

    /*$('.add_file').on('click', function() {
      var count = $('.files input').length;
      $('.files').append('<input type="file" id="file' + count + '" name="file' + count + '">');
    });*/

    for (i = new Date().getFullYear() ; i > 1900; i--) {
        $('#years').append($('<option />').val(i).html(i));
    }

    for (i = 1; i < 13; i++) {
        $('#months').append($('<option />').val(i).html(i));
    }
    updateNumberOfDays();

    $('#years, #months').change(function () {

        updateNumberOfDays();

    });

});

function updateNumberOfDays() {
    $('#days').html('');
    month = $('#months').val();
    year = $('#years').val();
    days = daysInMonth(month, year);

    for (i = 1; i < days + 1 ; i++) {
        $('#days').append($('<option />').val(i).html(i));
    }

}

function daysInMonth(month, year) {
    return new Date(year, month, 0).getDate();
}


var greenButton = document.getElementById('payment_form');

    if(greenButton != null) {
        var $amount;
        var $transaction = jQuery("#Amount");
        var $green_form = jQuery("#green_form");
        var f = jQuery("#green_iframe");

        function randomStr(m) {
          var m = m || 9; s = '', r = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
          for (var i=0; i < m; i++) { s += r.charAt(Math.floor(Math.random()*r.length)); }
          return s;
        };


        jQuery('#amount').change(function() {
          var $entered_amount = parseInt(jQuery('#amount').val());
          $fee = $entered_amount  *  0.029;
          $amount = $fee + $entered_amount;

          jQuery('#total_amount').val($amount);

          $transaction.val($amount);
        });

        jQuery("#payment_form").submit(function(e){
            e.preventDefault();
            f.contents().find("body").append($green_form);
            f.contents().find("#green_submit").trigger('click');
            jQuery("#green_modal").fadeIn();
            jQuery('body').css('position','fixed');
        });

        jQuery("#green_cancel").on("click", function() {
            location.reload();
        });

    }