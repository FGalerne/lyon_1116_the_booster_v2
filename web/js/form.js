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
$('#boosteMail').css({'border':'1px solid red'}).click(function() {
    $(this).css({'border':''});
    $('#duplicateMessageMail').css({'display':'none'});
});
$('#boosteSiret').css({'border':'1px solid red'}).click(function() {
    $(this).css({'border':''});
    $('#duplicateMessageSiret').css({'display':'none'});
});
function society(){
    $('#phoneGroup').css({'display':''});
    $('#siretGroup').css({'display':'none'});
    $('#duplicateMessageSiret').css({'display':'none'});
}
function project(){
    $('#phoneGroup').css({'display':'none'});
    $('#siretGroup').css({'display':''});
}