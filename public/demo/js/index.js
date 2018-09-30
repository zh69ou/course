$(function () {
    $('.nav-btn').click(function () {
        $('header nav').slideToggle(300);
    });
    $('#closeNav').click(function () {
        $('header nav').slideUp(300);
    });

    $('.slick').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        accessibility: false,
        pauseOnHover: false, // 悬停时停止播放，
        pauseOnFocus: false, // 点击后停止播放
        arrows: false,
        dots: true
    });

    // 周三课堂slick
    $('.latest-slick').slick({
        centerMode: true,
        slidesToShow: 3,
        centerPadding: '100px',
        responsive: [
            {
                breakpoint: 950,
                settings: {
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 2
                }
            }, 
            {
                breakpoint: 520,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });

    // 倒计时
    var startTime = 1546272000000;
    var countdownDay = $('#countdownDay'),
        countdownHours = $('#countdownHours'),
        countdownMinutes = $('#countdownMinutes'),
        countdownSeconds = $('#countdownSeconds');

    function DisTime(miniSec) {
        var totalSeconds = miniSec / 1000;
        var day = parseInt(totalSeconds / 3600 / 24);
        var hours = parseInt(totalSeconds / 3600 % 24);
        var minutes = parseInt(totalSeconds / 60 % 60);
        var seconds = parseInt(totalSeconds % 60);
        
        countdownDay.text(day);
        countdownHours.text(hours);
        countdownMinutes.text(minutes);
        countdownSeconds.text(seconds);
    }

    setInterval(function () {
        DisTime(startTime - new Date().getTime());
    }, 1000);
});