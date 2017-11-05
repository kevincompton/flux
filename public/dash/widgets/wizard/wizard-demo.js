/* Form wizard */
$(function() {
    "use strict";

    var data;
    var tabs = $('#form-wizard ul li');
    var step;

    $('#form-wizard').bootstrapWizard({
        'tabClass': ''
    });
    
    $(".wizard_form").submit(function(event){
        event.preventDefault();
        data = $(this).serialize();

        if(step == 4) {
            location.reload();
        }

        postData(data);
        next();

    });

    $("button.plan_select").on("click", function() {
        $("input#plan").val($(this).data("plan"));
    });

    fetchStep();

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
                setStep(data);
            }
        });
    }

    disable();

});
