var dashboardNavBackground = '#363636';
var dashboardNavColor = '#ffffff';


$( document ).ready(function() {
    dashProject();
    colorFocus('#project-in-progress');
});
$('#project-home').click(function() {
    dashHome();
    colorFocus('#project-home');
});
$('#project-in-progress').click(function() {
    dashProject();
    colorFocus('#project-in-progress');
});
$('#project-done').click(function() {
    dashDone();
    colorFocus('#project-done');
});
$('#messenger').click(function() {
    dashMessenger();
    colorFocus('#messenger');
});
$('#options').click(function() {
    dashOptions();
    colorFocus('#options');
});
function dashHome(){
    $('#dashboard-booster-home').css({'display':''});
    $('#dashboard-booster-inProgress').css({'display':'none'});
    $('#dashboard-booster-done').css({'display':'none'});
    $('#dashboard-messenger').css({'display':'none'});
    if($('#dashboard-options')) $('#dashboard-options').css({'display':'none'});
}
function dashProject(){
    $('#dashboard-booster-home').css({'display':'none'});
    $('#dashboard-booster-inProgress').css({'display':''});
    $('#dashboard-booster-done').css({'display':'none'});
    $('#dashboard-messenger').css({'display':'none'});
    if($('#dashboard-options')) $('#dashboard-options').css({'display':'none'});
}
function dashDone(){
    $('#dashboard-booster-home').css({'display':'none'});
    $('#dashboard-booster-inProgress').css({'display':'none'});
    $('#dashboard-booster-done').css({'display':''});
    $('#dashboard-messenger').css({'display':'none'});
    if($('#dashboard-options')) $('#dashboard-options').css({'display':'none'});
}
function dashMessenger(){
    $('#dashboard-booster-home').css({'display':'none'});
    $('#dashboard-booster-inProgress').css({'display':'none'});
    $('#dashboard-booster-done').css({'display':'none'});
    $('#dashboard-messenger').css({'display':''});
    if($('#dashboard-options')) $('#dashboard-options').css({'display':'none'});
}
function dashOptions(){
    $('#dashboard-booster-home').css({'display':'none'});
    $('#dashboard-booster-inProgress').css({'display':'none'});
    $('#dashboard-booster-done').css({'display':'none'});
    $('#dashboard-messenger').css({'display':'none'});
    if($('#dashboard-options')) $('#dashboard-options').css({'display':''});
}
function colorFocus(id){
    $('#project-home').css({'background-color':dashboardNavBackground, 'color':dashboardNavColor});
    $('#project-in-progress').css({'background-color':dashboardNavBackground, 'color':dashboardNavColor});
    $('#project-done').css({'background-color':dashboardNavBackground, 'color':dashboardNavColor});
    $('#messenger').css({'background-color':dashboardNavBackground, 'color':dashboardNavColor});
    $('#options').css({'background-color':dashboardNavBackground, 'color':dashboardNavColor});

    $(id).css({'background-color':dashboardNavColor, 'color':dashboardNavBackground});
}