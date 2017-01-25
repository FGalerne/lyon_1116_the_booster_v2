$(".rating").find('li').click(function() {
    $(".star-active").removeClass('star-active');
    $(this).addClass('star-active').prevAll().addClass('star-active');
    stars = $(this).prev().find('.star-active').length;
    console.log(stars);
    note = $(this).attr('id');
    console.log(note);
    notefield = "#booster_bundle_notes_" + $(".rating").attr('id');
    console.log(notefield);
    $(notefield).val(note);

});

//booster_bundle_notes_booster_type_boosterNote
//booster_bundle_notes_society_type_societyNote