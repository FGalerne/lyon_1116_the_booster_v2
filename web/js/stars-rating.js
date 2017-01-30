$( document ).ready(function() {
    $('#3').addClass('star-active').prevAll().addClass('star-active');
});
$(".rating").find('li').click(function() {
    $(".star-active").removeClass('star-active');
    $(this).addClass('star-active').prevAll().addClass('star-active');
    stars = $(this).prev().find('.star-active').length;

    note = $(this).attr('id');

    notefield = "#booster_bundle_notes_" + $(".rating").attr('id');

    $(notefield).val(note);

});

//booster_bundle_notes_booster_type_boosterNote
//booster_bundle_notes_society_type_societyNote