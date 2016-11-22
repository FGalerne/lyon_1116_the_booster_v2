/**
 * Created by mechiche on 28/09/16.
 */
/* Script qui permet de faire un défilement fluide d'un élément vers un autre

 */

$(document).ready(function () {
    $("#home_btn_jqbar1").click(function() {
        $('html,body').animate({
            scrollTop: $(".home_row_video").offset().top - $(".navbar").height()},'slow');
    });
    $(".how_btn_transon").click(function() {
        $('html,body').animate({
            scrollTop: $(".how_form_ext").offset().top - $(".navbar").height()},1000);
    });


});



