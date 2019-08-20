
(function ($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
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
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).addClass('active');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).removeClass('active');
            showPass = 0;
        }
        
    });

    $(document).ready(function() {

        var enrollType;
        //  $("#div_id_As").hide();
        $("input[name='As']").change(function() {
            memberType = $("input[name='select']:checked").val();
            providerType = $("input[name='As']:checked").val();
            toggleIndividInfo();
        });

        $("input[name='select']").change(function() {
            memberType = $("input[name='select']:checked").val();
            toggleIndividInfo();
            toggleLearnerTrainer();
        });

        function toggleLearnerTrainer() {

            if (memberType == 'P' || enrollType=='company') {
                $("#cityField").hide();
                $("#providerType").show();
                $(".provider").show();
                $(".locationField").show();
                if(enrollType=='INSTITUTE'){
                    $(".individ").hide();
                }

            }
            else {
                $("#providerType").hide();
                $(".provider").hide();
                $('#name').show();
                $("#cityField").hide();
                $(".locationField").show();
                $("#instituteName").hide();
                $("#cityField").show();

            }
        }
        function toggleIndividInfo(){

            if(((typeof memberType!=='undefined' && memberType == 'TRAINER')||enrollType=='INSTITUTE') && providerType=='INDIVIDUAL'){
                $("#instituteName").hide();
                $(".individ").show();
                $('#name').show();
            }
            else if((typeof memberType!=='undefined' && memberType == 'TRAINER')|| enrollType=='INSTITUTE'){
                $('#name').hide();
                $("#instituteName").show();
                $(".individ").hide();
            }
        }


    });



})(jQuery);