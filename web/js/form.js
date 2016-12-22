$( document ).ready(function() {
    if ($('#fos_user_registration_form_typeproject_0:checked').val() !== undefined){
        society();
    } else{
        project();
    }
});
$('#fos_user_registration_form_typeproject_0').click(function() {
    society();
});
$('#fos_user_registration_form_typeproject_1').click(function() {
    project();
});
function society(){
    $('#siretGroup').css({'display':'none'});
    $('#siretGroup input').val("");
}
function project(){
    $('#siretGroup').css({'display':''});
}