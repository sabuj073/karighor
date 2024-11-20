$(".banner_slider").slick({
    dots: false,
    arrows: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                infinite: true,
                dots: false,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
            },
        },
    ],
});
// Function to initialize Slick slider
function initializeSlickSlider(selector, options) {
    $(selector).slick(options);
}

// Common options for all sliders
const commonOptions = {
    dots: true,
    infinite: true,
    autoplay: false,
    autoplaySpeed: 3000,
    slidesToShow: 6,
    slidesToScroll: 6,
    margin: 10,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 6,
                slidesToScroll: 6,
                autoplay: true,
                autoplaySpeed: 3000,
                infinite: true,
                dots: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
    ],
};

// Initialize the brand slider with arrows disabled
initializeSlickSlider(".brand_slider", {
    ...commonOptions,
    arrows: false,
});
initializeSlickSlider(".blog_slider", {
    ...commonOptions,
    arrows: false,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                autoplay: true,
                autoplaySpeed: 3000,
                infinite: true,
                dots: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
    ],
});

// Initialize the product slider with arrows enabled
initializeSlickSlider(".product_slider", {
    ...commonOptions,
    arrows: true,
    dots: false,
    responsive: [
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
    ],
});

$(".hajj_umrah_slider").slick({
    dots: false,
    arrows: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    slidesToShow: 4,
    slidesToScroll: 4,
    margin: 10,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
                autoplay: true,
                autoplaySpeed: 3000,
                infinite: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
    ],
});
$(".review_slider").slick({
    dots: true,
    arrows: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    slidesToShow: 3,
    slidesToScroll: 3,
    margin: 10,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                autoplay: true,
                autoplaySpeed: 3000,
                infinite: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
    ],
});
$(".affiliation_slider").slick({
    dots: true,
    arrows: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    slidesToShow: 4,
    slidesToScroll: 4,
    margin: 10,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
                autoplay: true,
                autoplaySpeed: 3000,
                infinite: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
    ],
});
$(".pages_slider").slick({
    dots: false,
    arrows: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                infinite: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
    ],
});
$(".airline_slider").slick({
    dots: true,
    arrows: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    slidesToShow: 2,
    slidesToScroll: 2,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                autoplay: true,
                autoplaySpeed: 3000,
                infinite: true,
                dots: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: true,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
            },
        },
    ],
});
$(".flag_slider").slick({
    dots: false,
    arrows: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    slidesToShow: 6,
    slidesToScroll: 6,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 6,
                slidesToScroll: 6,
                autoplay: true,
                autoplaySpeed: 3000,
                infinite: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
    ],
});
$(".service_banner_slider").slick({
    dots: false,
    arrows: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
                autoplay: true,
                autoplaySpeed: 3000,
                infinite: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
    ],
});

// Accordion Box start
if ($(".accordion_box").length) {
    $(".accordion_box").on("click", ".acc-btn", function () {
        var outerBox = $(this).parents(".accordion_box");
        var target = $(this).parents(".accordion");

        if ($(this).next(".acc_body").is(":visible")) {
            $(this).removeClass("active");
            $(this).next(".acc_body").slideUp(300);
            $(outerBox).children(".accordion").removeClass("active-block");
        } else {
            $(outerBox).find(".accordion .acc-btn").removeClass("active");
            $(this).addClass("active");
            $(outerBox).children(".accordion").removeClass("active-block");
            $(outerBox).find(".accordion").children(".acc_body").slideUp(300);
            target.addClass("active-block");
            $(this).next(".acc_body").slideDown(300);
        }
    });
}
// Accordion Box end

$(".aiz-carousel")
    .not(".slick-initialized")
    .each(function () {
        var $this = $(this);

        var slidesPerViewXs = $this.data("xs-items");
        var slidesPerViewSm = $this.data("sm-items");
        var slidesPerViewMd = $this.data("md-items");
        var slidesPerViewLg = $this.data("lg-items");
        var slidesPerViewXl = $this.data("xl-items");
        var slidesPerView = $this.data("items");

        var slidesCenterMode = $this.data("center");
        var slidesArrows = $this.data("arrows");
        var slidesDots = $this.data("dots");
        var slidesRows = $this.data("rows");
        var slidesAutoplay = $this.data("autoplay");
        var slidesFade = $this.data("fade");
        var asNavFor = $this.data("nav-for");
        var infinite = $this.data("infinite");
        var focusOnSelect = $this.data("focus-select");
        var adaptiveHeight = $this.data("auto-height");

        var vertical = $this.data("vertical");
        var verticalXs = $this.data("vertical-xs");
        var verticalSm = $this.data("vertical-sm");
        var verticalMd = $this.data("vertical-md");
        var verticalLg = $this.data("vertical-lg");
        var verticalXl = $this.data("vertical-xl");

        slidesPerView = !slidesPerView ? 1 : slidesPerView;
        slidesPerViewXl = !slidesPerViewXl ? slidesPerView : slidesPerViewXl;
        slidesPerViewLg = !slidesPerViewLg ? slidesPerViewXl : slidesPerViewLg;
        slidesPerViewMd = !slidesPerViewMd ? slidesPerViewLg : slidesPerViewMd;
        slidesPerViewSm = !slidesPerViewSm ? slidesPerViewMd : slidesPerViewSm;
        slidesPerViewXs = !slidesPerViewXs ? slidesPerViewSm : slidesPerViewXs;

        vertical = !vertical ? false : vertical;
        verticalXl = typeof verticalXl == "undefined" ? vertical : verticalXl;
        verticalLg = typeof verticalLg == "undefined" ? verticalXl : verticalLg;
        verticalMd = typeof verticalMd == "undefined" ? verticalLg : verticalMd;
        verticalSm = typeof verticalSm == "undefined" ? verticalMd : verticalSm;
        verticalXs = typeof verticalXs == "undefined" ? verticalSm : verticalXs;

        slidesCenterMode = !slidesCenterMode ? false : slidesCenterMode;
        slidesArrows = !slidesArrows ? false : slidesArrows;
        slidesDots = !slidesDots ? false : slidesDots;
        slidesRows = !slidesRows ? 1 : slidesRows;
        slidesAutoplay = !slidesAutoplay ? false : slidesAutoplay;
        slidesFade = !slidesFade ? false : slidesFade;
        asNavFor = !asNavFor ? null : asNavFor;
        infinite = !infinite ? false : infinite;
        focusOnSelect = !focusOnSelect ? false : focusOnSelect;
        adaptiveHeight = !adaptiveHeight ? false : adaptiveHeight;

        var slidesRtl =
            $("html").attr("dir") === "rtl" && !vertical ? true : false;
        var slidesRtlXL =
            $("html").attr("dir") === "rtl" && !verticalXl ? true : false;
        var slidesRtlLg =
            $("html").attr("dir") === "rtl" && !verticalLg ? true : false;
        var slidesRtlMd =
            $("html").attr("dir") === "rtl" && !verticalMd ? true : false;
        var slidesRtlSm =
            $("html").attr("dir") === "rtl" && !verticalSm ? true : false;
        var slidesRtlXs =
            $("html").attr("dir") === "rtl" && !verticalXs ? true : false;

        $this.slick({
            slidesToShow: slidesPerView,
            autoplay: slidesAutoplay,
            dots: slidesDots,
            arrows: slidesArrows,
            infinite: infinite,
            vertical: vertical,
            rtl: slidesRtl,
            rows: slidesRows,
            centerPadding: "0px",
            centerMode: slidesCenterMode,
            fade: slidesFade,
            asNavFor: asNavFor,
            focusOnSelect: focusOnSelect,
            adaptiveHeight: adaptiveHeight,
            slidesToScroll: 1,
            prevArrow: `<button class="slick-prev" aria-label="Previous" type="button">
            <i class="fa-solid fa-arrow-left"></i>
            </button>`,
            nextArrow: `<button class="slick-next" aria-label="Next" type="button">
                    <i class="fa-solid fa-arrow-right"></i>
                    </button>`,
            responsive: [
                {
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: slidesPerViewXl,
                        vertical: verticalXl,
                        rtl: slidesRtlXL,
                    },
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: slidesPerViewLg,
                        vertical: verticalLg,
                        rtl: slidesRtlLg,
                    },
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: slidesPerViewMd,
                        vertical: verticalMd,
                        rtl: slidesRtlMd,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: slidesPerViewSm,
                        vertical: verticalSm,
                        rtl: slidesRtlSm,
                    },
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: slidesPerViewXs,
                        vertical: verticalXs,
                        rtl: slidesRtlXs,
                    },
                },
            ],
        });
    });
