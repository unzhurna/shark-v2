jQuery(document).ready(function($){

 //Superfish Menu
          $("ul.sf-menu").superfish({
            pathClass: 'current'
          });


    var url = window.location.pathname;

    if (url == '/') {
        jQuery('.sf-menu li > a[href="/"]').parent().addClass('active');
    } else {
        var urlRegExp = new RegExp(url.replace(/\/$/, '') + "$");
        jQuery('.sf-menu li > a').each(function () {
            if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
                jQuery(this).parent().addClass('active');
            }
        });
    }

    //Search Top
    $('#main-navigation li.search a').click(function(e){
      e.preventDefault();

      $('.search-form').slideToggle();
    });

    //Slicknav
      $('#main-navigation ul.sf-menu').slicknav({
        label: "Menu",
        prependTo: "#mobile-nav",
        closeOnClick: true
      });

    // jQuery sticky Menu
     $("#main-menu-wrapper").sticky({
        topSpacing:0,
        className: 'mainmenu-area-sticky',
    })

     //tab side


      $('.tab-side-button li').find('a.side-button').click(function(e){
      e.preventDefault();

      $('.tab-side-content').not($('#'+$(this).data('tab'))).hide();

       if($('#'+$(this).data('tab')).is(':visible')){
            $('#'+$(this).data('tab')).fadeOut();

             }else{
              $('#'+$(this).data('tab')).fadeIn();
          }

          $('.tab-side-button li').removeClass('active');
          $(this).parent().addClass('active');
     });

    $('.tab-side-button li a.side-button').eq(0).click().removeClass('active');


    //Page Home Slider
      $("#sliders").owlCarousel({
          autoplay: true,
          autoplayTimeout:3000,
          autoplayHoverPause:true,
          items: 1,
          loop : true,
          nav:false,
          responsive : {
            // breakpoint from 0 up
            0 : {
                dots: false,
            },
            // breakpoint from 480 up
            480 : {
                dots: false
            },
            // breakpoint from 768 up
            768 : {
               dots: true,
            }
        }
      });

      //Page Home Slider
      $("#sliders-client").owlCarousel({
          autoplay: true,
          autoplayTimeout:3000,
          autoplayHoverPause:true,
          loop: true,
          margin: 50,
          responsive : {
            // breakpoint from 0 up
            0 : {
                items: 1,
                nav: false,
            },
            // breakpoint from 480 up
            768 : {
                items: 5,
                stagePadding: 50,
                nav: true,
            }
        }
      });

      //Sales Home Slider
      $("#sales-sliders").owlCarousel({
          autoplay: true,
          autoplayTimeout:3000,
          autoplayHoverPause:true,
          loop: true,
          margin: 60,
          responsive : {
            // breakpoint from 0 up
            0 : {
                items: 1,
                nav: false,
            },
            // breakpoint from 480 up
            768 : {
                items: 4,
                stagePadding: 51,
                nav: true,
            }
        }
      });

       //Testimonials Slider
      $("#testimonials").owlCarousel({
          autoplay: true,
          autoplayTimeout:3000,
          autoplayHoverPause:true,
          loop:true,
          items: 2,
          responsive : {
            // breakpoint from 0 up
            0 : {
              nav:false,
            },
            // breakpoint from 480 up
            480 : {
              nav: false,
            },
            // breakpoint from 768 up
            960 : {
              dot:true,
              nav:false,
            }
        }
      });


    //Tab Home
    $("#tab-background-wrapper .tab-content > .tabscrollable").customScrollbar({
        skin: "default-skin",
        hScroll: true
      });

    //Single Page Next Post Slide

    var owlNextPost = $("#next-post-wrapper #next-post-slide");

        owlNextPost.owlCarousel({
          autoplay: false,
          loop:true,
          items: 1,
          nav: true,
        });



    // Bootstrap Mobile Menu fix
    $(".navbar-nav li a").click(function(){
        $(".navbar-collapse").removeClass('in');
    });

    //Panel Arrow
    $('.panel-default a').click(function(){
        $('.panel-default a .panel-heading').removeClass('active');

        $(this).find('.panel-heading').addClass('active');
    });

    var list = {facebook:'facebook', twitter:'twitter', linkedin:'linkedin', googlePlus:'google-plus'};

    $(function () {
        $('#icon-share').sharrre({
            share: {
                facebook    : true,
                twitter     : true,
                linkedin    : true,
                googlePlus  : true
            },
            buttons: {
                facebook: {},
                twitter: {},
                linkedin: {},
                googlePlus: {},
            },
            url: '<?php echo current_url() ?>',

            enableCounter   : false,
            enableHover     : false,
            enableTracking  : true,

            template: function () {
                content = '';
                jQuery.each(list, function(i, val) {
                    content += '<li class="'+ i +'"><a><i class="fa fa-'+ val +'"></i></a></li>';
                });
                return content;
            }(),

            render: function (api, options) {
                for (i in list) {
                    service = list[i];
                    $(api.element).on('click', '.' + service, function () {
                        api.openPopup(this.className);
                    });
                }
            }
        });
    });



}); jQuery();
