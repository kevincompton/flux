/* Form wizard */

// need to activate if element is present

$(function() {

var wizard = document.getElementById('form-wizard');

if(wizard != null) {

    "use strict";
    var parent = this;

    var data;
    var tabs = $('#form-wizard ul li');
    var step;

    fetchStep();

    $('#form-wizard').bootstrapWizard({
        'tabClass': ''
    });
    
    $(".wizard_form").submit(function(event){
        event.preventDefault();
        data = $(this).serialize();

        if(parent.step == 3) {
            window.location.replace("/poa");
        } else {
            parent.step = parent.step + 1;
        }

        postData(data);

        next();

    });

    $("button.plan_select").on("click", function() {
        $("input#plan").val($(this).data("plan"));
    });

    function next() {
        enable();
        $('#form-wizard').bootstrapWizard('next');
        disable();
    }

    function setStep(step) {
        enable();
        $('#form-wizard').bootstrapWizard('show', step);
        disable();
    }

    function disable()
    {
        tabs.each( function() {
            $('#form-wizard').bootstrapWizard('disable', $(this).index());
        });
    }

    function enable()
    {
        tabs.each( function() {
            $('#form-wizard').bootstrapWizard('enable', $(this).index());
        });
    }

    function postData(data) {

        $.ajax({
            type:'POST',
            url: '/dashboard/onboard/',
            data: data,
            dataType: 'json',
            processData:false,
            success : function(data) {
                
            }
        });

    }

    function fetchStep() {
        $.ajax({
            type:'GET',
            url: '/dashboard/onboard/step',
            dataType: 'json',
            processData:false,
            success : function(data) {
                parent.step = data;
                setStep(data);
            }
        });
    }

    disable();

}

    

});
