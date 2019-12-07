$ = jQuery;

$(function(){
    $(".index input[type='text'], .index select").val("");

    $(".index input[type='text'], .index select").focusout(function(){
        if($(this).val() != ""){
            $(this).addClass("has-content");
        } else {
            $(this).removeClass("has-content");
        }
    });
});