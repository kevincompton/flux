
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

$(function() {
  $('.type-toggle').click(function() {
    if($('.type-toggle.consolidation').is(':checked')) { 
      $('.consolidation-tab').show();
      $('.creditor-tab').hide();
    } else {
      $('.consolidation-tab').hide();
      $('.creditor-tab').show();
    }
  });


  $("#contact-modal").on("change", function() {
    if ($(this).is(":checked")) {
      $("body").addClass("modal-open");
    } else {
      $("body").removeClass("modal-open");
    }
  });

  $(".modal-fade-screen, .modal-close").on("click", function() {
    $(".modal-state:checked").prop("checked", false).change();
  });

  $(".modal-inner").on("click", function(e) {
    e.stopPropagation();
  });
});



 $(function () {

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

require('rangeslider.js/dist/rangeslider.min.js');

//custom slider javascript
var $income = $('input[type="range"]#income');
var $debt = $('input[type="range"]#debt');
var $handle;
var $handle2;

$income
  .rangeslider({
    polyfill: false,
    onInit: function() {
      $handle = $("#income_range").find('.rangeslider__handle', this.$range);
      updateHandle($handle[0], this.value);
    }
  })
  .on('input', function() {
    updateHandle($handle[0], this.value);
  });
$debt
  .rangeslider({
    polyfill: false,
    onInit: function() {
      $handle2 = $("#debt_range").find('.rangeslider__handle', this.$range);
      updateHandle($handle2[0], this.value);
    }
  })
  .on('input', function() {
    updateHandle($handle2[0], this.value);
  });

function updateHandle(el, val) {
  el.textContent = " " + "$" + val + " ";
}

$(document).ready(function(){
  
  $(".mobile-toggle").on('click', function() {
    $('.mobile-nav').fadeToggle();
  });

  //when slider changes, hide start message
  $("input#income").on("change", function() {
    $("#helper.income").fadeOut("slow");
  });

  $("input#debt").on("change", function() {
    $("#helper.debt").fadeOut("slow");
  });

  //promo-box
  $("#js-promo-box").hide();
  $("#promo-link").on("click", function(){
    $("#js-promo-box").slideToggle();
    return false;
  });
  
});

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