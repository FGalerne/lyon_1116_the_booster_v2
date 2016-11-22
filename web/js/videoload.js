/**
 * Created by mechiche on 10/10/16.
 */


function youTubes_makeDynamic() {
    var $ytIframes = $('iframe[src*="youtube.com"]');
    $ytIframes.each(function (i,e) {
        var $ytFrame = $(e);
        var ytKey; var tmp = $ytFrame.attr('src').split(/\//); tmp = tmp[tmp.length - 1]; tmp = tmp.split('?'); ytKey = tmp[0];
        var $ytLoader = $('<div class="ytLoader">');
        $ytLoader.append($('<img class="cover" src="https://i.ytimg.com/vi/'+ytKey+'/hqdefault.jpg">'));

        $ytLoader.data('$ytFrame',$ytFrame);
        $ytFrame.replaceWith($ytLoader);
        $ytLoader.click(function () {
            var $ytFrame = $ytLoader.data('$ytFrame');
            $ytFrame.attr('src',$ytFrame.attr('src')+'?autoplay=1');
            $ytLoader.replaceWith($ytFrame);
        });
    });
    var $allVideos = $("iframe[src^='//www.youtube.com'], object, embed"),
        $fluidEl = $("figure");
    $allVideos.each(function() {
        $(this)
        // jQuery .data does not work on object/embed elements
            .attr('data-aspectRatio', this.height / this.width)
            .removeAttr('height')
            .removeAttr('width');
    });
    $(window).resize(function() {
        var newWidth = $fluidEl.width();
        $allVideos.each(function() {

            var $el = $(this);
            $el
                .width(newWidth)
                .height(newWidth * $el.attr('data-aspectRatio'));

        });

    }).resize();

};
$(document).ready(function () {youTubes_makeDynamic()});

