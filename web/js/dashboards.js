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
function dashHome(){
    $('#dashboard-booster-home').css({'display':''});
    $('#dashboard-booster-inProgress').css({'display':'none'});
    $('#dashboard-booster-done').css({'display':'none'});
}
function dashProject(){
    $('#dashboard-booster-home').css({'display':'none'});
    $('#dashboard-booster-inProgress').css({'display':''});
    $('#dashboard-booster-done').css({'display':'none'});
}
function dashDone(){
    $('#dashboard-booster-home').css({'display':'none'});
    $('#dashboard-booster-inProgress').css({'display':'none'});
    $('#dashboard-booster-done').css({'display':''});
}