'use strict';
(function($) {
  // Customm functions

  var ie = (function(){
    var undef,rv = -1; // Return value assumes failure.
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf('MSIE ');
    var trident = ua.indexOf('Trident/');

    if (msie > 0) {
      // IE 10 or older => return version number
      rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    } else if (trident > 0) {
      // IE 11 (or newer) => return version number
      var rvNum = ua.indexOf('rv:');
      rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
    }

    return ((rv > -1) ? rv : undef);
  }());
  // disable/enable scroll (mousewheel and keys) from http://stackoverflow.com/a/4770179
  // left: 37, up: 38, right: 39, down: 40,
  // spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
  var keys = [32, 37, 38, 39, 40], wheelIter = 0;

  function preventDefault(e) {
    e = e || window.event;
    if (e.preventDefault)
    e.preventDefault();
    e.returnValue = false;
  }

  function keydown(e) {
    for (var i = keys.length; i--;) {
      if (e.keyCode === keys[i]) {
        preventDefault(e);
        return;
      }
    }
  }

  function touchmove(e) {
    preventDefault(e);
  }

  function wheel(e) {
    // for IE
    //if( ie ) {
      //preventDefault(e);
    //}
  }

  function disable_scroll() {
    window.onmousewheel = document.onmousewheel = wheel;
    document.onkeydown = keydown;
    document.body.ontouchmove = touchmove;
  }

  function enable_scroll() {
    window.onmousewheel = document.onmousewheel = document.onkeydown = document.body.ontouchmove = null;
  }
  var docElem = window.document.documentElement,
    scrollVal,
    isRevealed,
    noscroll,
    isAnimating,
    container = '#container';

  function scrollY() {
    return window.pageYOffset || docElem.scrollTop;
  }

  function scrollPage() {
    scrollVal = scrollY();

    if( noscroll && !ie ) {
      if( scrollVal < 0 ) return false;
      // keep it that way
      window.scrollTo( 0, 0 );
    }

    if( $(container).hasClass( 'notrans' ) ) {
      $(container).removeClass( 'notrans' );
      return false;
    }
    if ( $( container ).hasClass('animated') ) {
      return false;
    }
    if( isAnimating ) {
      return false;
    }

    if( scrollVal <= 0 && isRevealed ) {
      toggle(0);
    }
    else if( scrollVal > 0 && !isRevealed ){
      toggle(1);
    }
  }

  function toggle( reveal ) {
    isAnimating = true;

    if( reveal ) {
      $( container ).addClass( 'modify' );
    }
    else {
      noscroll = true;
      disable_scroll();
      $( container ).removeClass( 'modify' );
    }

    // simulating the end of the transition:
    setTimeout( function() {
      isRevealed = !isRevealed;
      isAnimating = false;
      if( reveal ) {
        noscroll = false;
        enable_scroll();
        if ( $( container ).hasClass('only-once') ) {
          $( container ).addClass( 'animated' );
        }
      }
    }, 1200 );
  }




  /**************/
  // Trigger paralax
  if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {
    $('body').addClass('mobile');
    $('#ios-notice').removeClass('hidden');
    $('.parallax-container').height( $(window).height() * 0.5 | 0 );
  } else {
    $(window).resize(function(){
      var parallaxHeight = Math.max($(window).height() * 0.7, 200) | 0;
      $('.parallax-container').height(parallaxHeight);
    }).trigger('resize');
  }
  $(window).trigger('resize');
  // Awesome Header trigger
  if ( $( container ).hasClass('animating-header') ) {
    // refreshing the page...
    var pageScroll = scrollY();
    noscroll = pageScroll === 0;

    disable_scroll();

    if( pageScroll ) {
      isRevealed = true;
      $( container ).addClass( 'notrans' );
      $( container ).addClass( 'modify' );
    }

    window.addEventListener( 'scroll', scrollPage );
    $('button.trigger').on('click', function() { toggle( 'reveal' ); });
  };
  // Gallery trigger
  $('div[id^="gallery"].gallery').each(function(index, elem) {
    var grid = new Masonry(elem, {
      itemSelector: '.gallery-item',
      gutter: 15
    });
    var imgLoad = new imagesLoaded(elem);
    imgLoad.on('progress', function(instance, image) {
      grid.layout();
    })
  });
  // Tracking trigger
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-91610966-1', 'auto');
  ga('send', 'pageview');

})(jQuery);