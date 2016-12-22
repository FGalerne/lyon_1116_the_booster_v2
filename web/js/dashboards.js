$( document ).ready(function() {
    dashHome();
});
$('#project-home').click(function() {
    dashHome();
});
$('#project-in-progress').click(function() {
    dashProject();
});
$('#project-done').click(function() {
    dashDone();
});
$('#messenger').click(function() {
    dashMessenger();
});
function dashHome(){
    $('#dashboard-booster-home').css({'display':''});
    $('#dashboard-booster-inProgress').css({'display':'none'});
    $('#dashboard-booster-done').css({'display':'none'});
    $('#dashboard-messenger').css({'display':'none'});
}
function dashProject(){
    $('#dashboard-booster-home').css({'display':'none'});
    $('#dashboard-booster-inProgress').css({'display':''});
    $('#dashboard-booster-done').css({'display':'none'});
    $('#dashboard-messenger').css({'display':'none'});
}
function dashDone(){
    $('#dashboard-booster-home').css({'display':'none'});
    $('#dashboard-booster-inProgress').css({'display':'none'});
    $('#dashboard-booster-done').css({'display':''});
    $('#dashboard-messenger').css({'display':'none'});
}
function dashMessenger(){
    $('#dashboard-booster-home').css({'display':'none'});
    $('#dashboard-booster-inProgress').css({'display':'none'});
    $('#dashboard-booster-done').css({'display':'none'});
    $('#dashboard-messenger').css({'display':''});
}