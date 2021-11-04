(function ($) {
    'use strict';
    $('.mean-menu').meanmenu({
        meanScreenWidth: "991"
    });
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 150) {
            $('.navbar-area').addClass("is-sticky");
        } else {
            $('.navbar-area').removeClass("is-sticky");
        };
        var scrolled = $(window).scrollTop();
        if (scrolled > 300) $('.go-top').addClass('active');
        if (scrolled < 300) $('.go-top').removeClass('active');
    });
    $('.offer-slider').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        mouseDrag: false,
        thumbs: false,
        thumbsPrerendered: true,
        items: 1,
        dots: true,
        autoHeight: true,
        autoplay: true,
        smartSpeed: 1500,
        autoplayHoverPause: true,
        animateOut: "slideOutDown",
        animateIn: "slideInDown",
    });
    $('.product-categories-slider').owlCarousel({
        items: 1,
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayHoverPause: true,
        margin: 0,
        smartSpeed: 1500,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1200: {
                items: 4,
            }
        }
    });
    $('.testimonials-slider').owlCarousel({
        items: 1,
        loop: true,
        margin: 30,
        nav: true,
        dots: true,
        autoplay: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1200: {
                items: 3,
            }
        }
    });
    $('.feedback-slider').owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,
    });
    $('.featured-slider').owlCarousel({
        items: 1,
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayHoverPause: true,
        margin: 30,
        smartSpeed: 1500,
        navText: ["<i class='flaticon-left-arrow'></i>", "<i class='flaticon-right-arrow'></i>", ],
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            768: {
                items: 3,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });
    $('.hero-slider').owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        nav: true,
        dots: true,
        autoplay: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        navText: ["<i class='flaticon-left-arrow'></i>", "<i class='flaticon-right-arrow'></i>", ],
    });
    $('.partner-slider').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: false,
        autoplay: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            414: {
                items: 1,
            },
            576: {
                items: 3,
            },
            768: {
                items: 3,
            },
            992: {
                items: 4,
            },
            1200: {
                items: 4,
            },
        },
    });
    $('.related-product').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: false,
        autoplay: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            414: {
                items: 1,
            },
            576: {
                items: 2,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1200: {
                items: 4,
            },
        },
    });
    $('.go-top').on('click', function () {
        $("html, body").animate({
            scrollTop: "0"
        }, 50);
    });
    $('.accordion').find('.accordion-title').on('click', function () {
        $(this).toggleClass('active');
        $(this).next().slideToggle('fast');
        $('.accordion-content').not($(this).next()).slideUp('fast');
        $('.accordion-title').not($(this)).removeClass('active');
    });

    function makeTimer() {
        var endTime = new Date("november  30, 2021 17:00:00 PDT");
        var endTime = (Date.parse(endTime)) / 1000;
        var now = new Date();
        var now = (Date.parse(now) / 1000);
        var timeLeft = endTime - now;
        var days = Math.floor(timeLeft / 86400);
        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
        if (hours < "10") {
            hours = "0" + hours;
        }
        if (minutes < "10") {
            minutes = "0" + minutes;
        }
        if (seconds < "10") {
            seconds = "0" + seconds;
        }
        $("#days").html(days + "<span>Days</span>");
        $("#hours").html(hours + "<span>Hours</span>");
        $("#minutes").html(minutes + "<span>Minutes</span>");
        $("#seconds").html(seconds + "<span>Seconds</span>");
    }
    setInterval(function () {
        makeTimer();
    }, 300);
    $(window).on('load', function () {
        $('.preloader').addClass('preloader-deactivate');
    })
    $(".newsletter-form").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            formErrorSub();
            submitMSGSub(false, "Please enter your email correctly.");
        } else {
            event.preventDefault();
        }
    });

    function callbackFunction(resp) {
        if (resp.result === "success") {
            formSuccessSub();
        } else {
            formErrorSub();
        }
    }

    function formSuccessSub() {
        $(".newsletter-form")[0].reset();
        submitMSGSub(true, "Thank you for subscribing!");
        setTimeout(function () {
            $("#validator-newsletter").addClass('hide');
        }, 4000)
    }

    function formErrorSub() {
        $(".newsletter-form").addClass("animated shake");
        setTimeout(function () {
            $(".newsletter-form").removeClass("animated shake");
        }, 1000)
    }

    function submitMSGSub(valid, msg) {
        if (valid) {
            var msgClasses = "validation-success";
        } else {
            var msgClasses = "validation-danger";
        }
        $("#validator-newsletter, #validator-newsletter-2").removeClass().addClass(msgClasses).text(msg);
    }
    $(".newsletter-form").ajaxChimp({
        url: "https://Envy Theme.us20.list-manage.com/subscribe/post?u=60e1ffe2e8a68ce1204cd39a5&amp;id=42d6d188d9",
        callback: callbackFunction
    });
    $(".others-option-for-responsive .dot-menu").on("click", function () {
        $(".others-option-for-responsive .container .container").toggleClass("active");
    });
    if ($('.wow').length) {
        var wow = new WOW({
            mobile: false
        });
        wow.init();
    }
    $(".burger-menu").on('click', function () {
        $('.sidebar-modal').toggleClass('active');
    });
    $(".sidebar-modal-close-btn").on('click', function () {
        $('.sidebar-modal').removeClass('active');
    });
    $("#range-slider").slider({
        range: true,
        min: 500,
        max: 10000,
        values: [500, 10000],
        slide: function (event, ui) {
            $("#price-amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });
    $("#price-amount").val("$" + $("#range-slider").slider("values", 0) +
        " - $" + $("#range-slider").slider("values", 1));
    $('.accordion-widget').find('.accordion-widget-title').on('click', function () {
        $(this).toggleClass('active');
        $('.accordion-widget-content').toggleClass('open');
        $(this).next().slideToggle('800');
    });
    $('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');
    $('.tab ul.tabs li').on('click', function (g) {
        var tab = $(this).closest('.tab'),
            index = $(this).closest('li').index();
        tab.find('ul.tabs > li').removeClass('current');
        $(this).closest('li').addClass('current');
        tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
        tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();
        g.preventDefault();
    });
    $('.input-counter').each(function () {
        var spinner = jQuery(this),
            input = spinner.find('input[type="text"]'),
            btnUp = spinner.find('.plus-btn'),
            btnDown = spinner.find('.minus-btn'),
            min = input.attr('min'),
            max = input.attr('max');
        btnUp.on('click', function () {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
        btnDown.on('click', function () {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
    });
    var bigimage = $("#big");
    var thumbs = $("#thumbs");
    var syncedSecondary = true;
    bigimage.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav: true,
        autoplay: true,
        dots: false,
        loop: true,
        responsiveRefreshRate: 200,
        navText: ["<i class='bx bx-left-arrow-alt'></i>", "<i class='bx bx-right-arrow-alt'></i>", ]
    }).on("changed.owl.carousel", syncPosition);
    thumbs.on("initialized.owl.carousel", function () {
        thumbs.find(".owl-item").eq(0).addClass("current");
    }).owlCarousel({
        items: 5,
        dots: false,
        nav: false,
        navText: ["<i class='bx bx-left-arrow-alt'></i>", "<i class='bx bx-right-arrow-alt'></i>", ],
        smartSpeed: 200,
        slideSpeed: 500,
        slideBy: 4,
        responsiveRefreshRate: 100
    }).on("changed.owl.carousel", syncPosition2);

    function syncPosition(el) {
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - el.item.count / 2 - 0.5);
        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }
        thumbs.find(".owl-item").removeClass("current").eq(current).addClass("current");
        var onscreen = thumbs.find(".owl-item.active").length - 1;
        var start = thumbs.find(".owl-item.active").first().index();
        var end = thumbs.find(".owl-item.active").last().index();
        if (current > end) {
            thumbs.data("owl.carousel").to(current, 100, true);
        }
        if (current < start) {
            thumbs.data("owl.carousel").to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            bigimage.data("owl.carousel").to(number, 100, true);
        }
    }
    thumbs.on("click", ".owl-item", function (e) {
        e.preventDefault();
        var number = $(this).index();
        bigimage.data("owl.carousel").to(number, 300, true);
    });
})(jQuery);
