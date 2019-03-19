
(function ($) {
    "use strict";


    /*==================================================================
    [ Validate after type ]*/
    $('.validate-input .input100').each(function(){
        $(this).on('blur', function(){
            if(validate(this) == false){
                showValidate(this);
            }
            else {
                $(this).parent().addClass('true-validate');
            }
        })    
    })
  
  
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
           $(this).parent().removeClass('true-validate');
        });
    });

     function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');

        $(thisAlert).append('<span class="btn-hide-validate">&#xf136;</span>')
        $('.btn-hide-validate').each(function(){
            $(this).on('click',function(){
               hideValidate(this);
            });
        });
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).removeClass('alert-validate');
        $(thisAlert).find('.btn-hide-validate').remove();
    }


    propcheckbox();


    $('#form_').trigger("reset");

})(jQuery);



$('#departement').change(function(event) {

   if($(this).val() == "Atlantique")
   {
        var tabcom = ["Abomey-Calavi", "Allada","Kpomassè","Ouidah","Sô-Ava","Toffo","Tori-Bossito","Zè"];

        $('#commune').html("");
        $('#commune').attr('disabled', false);

        for (var i = 0; i < tabcom.length; i++) {

            var o = new Option(tabcom[i], tabcom[i]);
            $(o).html(tabcom[i]);
            $("#commune").append(o);
        }

   }else if($(this).val() == "Littoral")
   {
        $('#commune').html("");
        $('#commune').attr('disabled', false);
        var o = new Option("Cotonou", "Cotonou");
        $(o).html("Cotonou");
        $("#commune").append(o);
   }else 
   {
        $('#commune').html("");
        $('#commune').attr('disabled', true);
   }


});

$("input[name=type_client]").change(function() 
{
    if ($(this).val() == "acheteur") 
    {
        $('#ignr').text('(Ignorez cette étape)');
        $("input[name='document[]']").each( function () {
            $(this).prop("disabled", true);
        });
        $("#aucun_document").prop("disabled", true);
        propcheckbox();
    }else
    {  
        $('#ignr').text("");
        $("input[name='document[]']").each( function () {
            $(this).prop("disabled", false);
        });
        $("#aucun_document").prop("disabled", false);
        propcheckbox();
    }
});


$("input[name='document[]']").change(function(event) {
    var count = 0;
    $("[name='document[]']:checked").each(function () {
        count++;
    });

    if(count == 0)
    {
        $('#aucun_document').attr('disabled', false);
        $("#aucun_document").prop("checked", true);
    }else
    {
        $('#aucun_document').attr('disabled', true);
        $("#aucun_document").prop("checked", false);
    }
});



function propcheckbox() {
    $("input[name='document[]']").each( function () {
        $(this).prop("checked", false);
    });
    $("#aucun_document").prop("checked", false);
    $("#certifie_exact").prop("checked", false);
}