$(function(){
    $('name').blur(function(){
        if($(this).val().length < 4){
            $(this).parent().find('.custom-alert').fadeIn(300);
        } else{
            $(this).parent().find('.custom-alert').fadeOut(300);
        }
    });
});
