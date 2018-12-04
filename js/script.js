var $ = jQuery.noConflict();
jQuery(document).ready(function($) {
    $(window).scroll(getRandomValue);
    $('.carousel').carousel();
    $('.slider').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
});

var flag = false;
function getRandomValue() {
    var day = new Date();
    var elect = 17;
    var cloth = 20;
    var furniture = 15;

    elect = elect + Math.floor((100/7) * day.getDay());
    cloth = cloth + Math.floor((100/7) * day.getDay()) - day.getDay();
    furniture = furniture + Math.floor((100/7) * day.getDay());

    if(document.getElementById('random-elect')){
        if(!flag && isVisible(document.getElementById('random-elect'))) {
            printNumbersInterval('random-elect', elect);
            printNumbersInterval('random-cloth', cloth);
            printNumbersInterval('random-furniture', furniture);
            flag = true;
        } else {
            if(document.getElementById('random-elect') && isVisible(document.getElementById('random-elect'))) {
                document.getElementById('random-elect').innerHTML = elect;
                document.getElementById('random-cloth').innerHTML = cloth;
                document.getElementById('random-furniture').innerHTML = furniture;
            }
        }
    }

}

getRandomValue();

function printNumbersInterval(elem, count) {
    var i = 1;
    var timerId = setInterval(function() {
        if(document.getElementById(elem)){
            document.getElementById(elem).innerHTML = i;
            if (i == count) clearInterval(timerId);
            i++;
        }

    }, 100);
}

function isVisible(tag) {
    var t = $(tag);
    var w = $(window);
    var wt = w.scrollTop();
    var tt = t.offset().top;
    var tb = tt + t.height();
    return ((tb <= wt + w.height()) && (tt >= wt));
}