$('.menu-trigger').on('click', function () {
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $('nav').removeClass('open');
        $('.overlay').removeClass('open');
        $('.batsu').fadeOut(100);
    } else {
        $(this).addClass('active');
        $('nav').addClass('open');
        $('.overlay').addClass('open');
        $('.batsu').fadeIn(100);
    }
});
$('.overlay').on('click', function () {
    if ($(this).hasClass('open')) {
        $(this).removeClass('open');
        $('.menu-trigger').removeClass('active');
        $('nav').removeClass('open');
        $('.batsu').fadeOut(100);
    }
});
$('.batsu').on('click', function () {
    if ($(this).hasClass('open')) {
        $(this).removeClass('open');
        $('.menu-trigger').removeClass('active');
        $('nav').removeClass('open');
        $('.batsu').fadeOut(100);
    }
});
