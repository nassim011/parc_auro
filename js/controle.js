$(".tabs a").click(function (e) {

    var $a =$(this);
    var $li =$a.parent();
    $li.siblings('.active').removeClass();
    $li.addClass('active');

})