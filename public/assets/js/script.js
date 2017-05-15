$(document).ready(function() {
    var owlitem = $(".item-carousel");
    owlitem.owlCarousel({
        navigation: false,
        pagination: true,
        items: 5,
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 3],
        itemsTabletSmall: [660, 2],
        itemsMobile: [400, 1]
    });
    $("#nextItem").click(function() {
        owlitem.trigger('owl.next');
    })
    $("#prevItem").click(function() {
        owlitem.trigger('owl.prev');
    })
    var featuredListSlider = $(".featured-list-slider");
    featuredListSlider.owlCarousel({
        navigation: false,
        pagination: false,
        items: 5,
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 3],
        itemsTabletSmall: [660, 2],
        itemsMobile: [400, 1]
    });
    $(".featured-list-row .next").click(function() {
        featuredListSlider.trigger('owl.next');
    })
    $(".featured-list-row .prev").click(function() {
        featuredListSlider.trigger('owl.prev');
    })
    $("#ajaxTabs li > a").click(function() {
        $("#allAds").empty().append("<div id='loading text-center'> <br> <img class='center-block' src='images/loading.gif' alt='Loading' /> <br> </div>");
        $("#ajaxTabs li").removeClass('active');
        $(this).parent('li').addClass('active');
        $.ajax({
            url: this.href,
            success: function(html) {
                $("#allAds").empty().append(html);
                $('.tooltipHere').tooltip('hide');
            }
        });
        return false;
    });
    urls = $('#ajaxTabs li:first-child a').attr("href");
    $("#allAds").empty().append("<div id='loading text-center'> <br> <img class='center-block' src='images/loading.gif' alt='Loading' /> <br>  </div>");
    $.ajax({
        url: urls,
        success: function(html) {
            $("#allAds").empty().append(html);
            $('.tooltipHere').tooltip('hide');
        }
    });
    $('.list-view,#ajaxTabs li a').click(function(e) {
        e.preventDefault();
        $('.grid-view,.compact-view').removeClass("active");
        $('.list-view').addClass("active");
        $('.item-list').addClass("make-list");
        $('.item-list').removeClass("make-grid");
        $('.item-list').removeClass("make-compact");
        $('.item-list .add-desc-box').removeClass("col-sm-9");
        $('.item-list .add-desc-box').addClass("col-sm-7");
        $(function() {
            $('.item-list').matchHeight('remove');
        });
    });
    $('.grid-view').click(function(e) {
        e.preventDefault();
        $('.list-view,.compact-view').removeClass("active");
        $(this).addClass("active");
        $('.item-list').addClass("make-grid");
        $('.item-list').removeClass("make-list");
        $('.item-list').removeClass("make-compact");
        $('.item-list .add-desc-box').removeClass("col-sm-9");
        $('.item-list .add-desc-box').addClass("col-sm-7");
        $(function() {
            $('.item-list').matchHeight();
            $.fn.matchHeight._apply('.item-list');
        });
    });
    $(function() {
        $('.row-featured .f-category').matchHeight();
        $.fn.matchHeight._apply('.row-featured .f-category');
    });
    $(function() {
        $('.has-equal-div > div').matchHeight();
        $.fn.matchHeight._apply('.row-featured .f-category');
    });
    $('.compact-view').click(function(e) {
        e.preventDefault();
        $('.list-view,.grid-view').removeClass("active");
        $(this).addClass("active");
        $('.item-list').addClass("make-compact");
        $('.item-list').removeClass("make-list");
        $('.item-list').removeClass("make-grid");
        $('.item-list .add-desc-box').toggleClass("col-sm-9 col-sm-7");
        $(function() {
            $('.adds-wrapper .item-list').matchHeight('remove');
        });
    });
    $('.long-list').hideMaxListItems({
        'max': 8,
        'speed': 500,
        'moreText': 'View More ([COUNT])'
    });
    $('.long-list-user').hideMaxListItems({
        'max': 12,
        'speed': 500,
        'moreText': 'View More ([COUNT])'
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $(".scrollbar").scroller();
    $("select.selecter").selecter({
        label: "Select An Item"
    });
    $(".selectpicker").selecter({
        customClass: "select-short-by"
    });
    $(window).bind('resize load', function() {
        if ($(this).width() < 767) {
            $('.cat-collapse').collapse('hide');
            $('.cat-collapse').on('shown.bs.collapse', function() {
                $(this).prev('.cat-title').find('.icon-down-open-big').addClass("active-panel");
            });
            $('.cat-collapse').on('hidden.bs.collapse', function() {
                $(this).prev('.cat-title').find('.icon-down-open-big').removeClass("active-panel");
            })
        } else {
            $('.cat-collapse').removeClass('out').addClass('in').css('height', 'auto');
        }
    });
    $(".tbtn").click(function() {
        $('.themeControll').toggleClass('active')
    })
    $("input:radio").click(function() {
        if ($('input:radio#job-seeker:checked').length > 0) {
            $('.forJobSeeker').removeClass('hide');
            $('.forJobFinder').addClass('hide');
        } else {
            $('.forJobFinder').removeClass('hide');
            $('.forJobSeeker').addClass('hide')
        }
    })
    $(".filter-toggle").click(function() {
        $('.mobile-filter-sidebar').prepend("<div class='closeFilter'>X</div>");
        $(".mobile-filter-sidebar").animate({
            "left": "0"
        }, 250, "linear", function() {});
        $('.menu-overly-mask').addClass('is-visible');
    })
    $(".menu-overly-mask").click(function() {
        $(".mobile-filter-sidebar").animate({
            "left": "-251px"
        }, 250, "linear", function() {});
        $('.menu-overly-mask').removeClass('is-visible');
    })
    $(document).on('click', '.closeFilter', function() {
        $(".mobile-filter-sidebar").animate({
            "left": "-251px"
        }, 250, "linear", function() {});
        $('.menu-overly-mask').removeClass('is-visible');
    });
});