var _____WB$wombat$assign$function_____=function(name){return (self._wb_wombat && self._wb_wombat.local_init && self._wb_wombat.local_init(name))||self[name];};if(!self.__WB_pmw){self.__WB_pmw=function(obj){this.__WB_source=obj;return this;}}{
let window = _____WB$wombat$assign$function_____("window");
let self = _____WB$wombat$assign$function_____("self");
let document = _____WB$wombat$assign$function_____("document");
let location = _____WB$wombat$assign$function_____("location");
let top = _____WB$wombat$assign$function_____("top");
let parent = _____WB$wombat$assign$function_____("parent");
let frames = _____WB$wombat$assign$function_____("frames");
let opens = _____WB$wombat$assign$function_____("opens");
$(document).ready(function() {
  $('.navbar-open').click(function(e) {
    $('#navbar').toggleClass('navbar-mobile');
    $('.mobile-nav-toggle').toggleClass('d-block');
    $('.mobile-nav-toggle').removeClass('d-none');
  });

  $('.mobile-nav-toggle').click(function(e) {
    $('#navbar').removeClass('navbar-mobile');
    $('.mobile-nav-toggle').removeClass('d-block');
    $('.mobile-nav-toggle').toggleClass('d-none');
  });

  $('.navbar .dropdown > a').click(function(e) {
    if ($('#navbar').hasClass('navbar-mobile')) {
      e.preventDefault();
      $(this).next().toggleClass('dropdown-active');
    }
  });

  $(window).scroll(function() {
    var scrollPosition = $(window).scrollTop();

    // Check if the user has scrolled down at least 200 pixels
    if (scrollPosition >= 100) {
      $('.menubar').addClass('fixed-pc');
      $('.topbar').addClass('fixed-mob');
    } else {
      $('.menubar').removeClass('fixed-pc');
      $('.topbar').removeClass('fixed-mob');
    }
  });
});

}
/*
     FILE ARCHIVED ON 16:10:03 Sep 03, 2024 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 12:33:03 Dec 02, 2025.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  captures_list: 0.662
  exclusion.robots: 0.024
  exclusion.robots.policy: 0.01
  esindex: 0.012
  cdx.remote: 57.624
  LoadShardBlock: 213.3 (3)
  PetaboxLoader3.datanode: 275.039 (5)
  PetaboxLoader3.resolve: 114.514 (2)
  load_resource: 205.701
  loaddict: 69.108
*/