(function($) {
  // Disable responsive for Tablet
  const DESKTOP_VIEWPORT = 1280;
  let autoScaleViewport = () => {
    let initScale = 1,
      isPortrait = window.matchMedia("(orientation: portrait)").matches;
    let $viewport = $('meta[name="viewport"]');
    if (!$viewport.length) {
      $viewport = $('<meta name="viewport" content="" />');
    }
    let viewportWidth = window.screen.width;
    let viewportHeight = window.screen.height;
    if (isPortrait) {
      if (viewportWidth > viewportHeight) {
        viewportWidth = viewportHeight;
      }
    } else {
      if (viewportWidth < viewportHeight) {
        viewportWidth = viewportHeight;
      }
    }
    // initScale = Math.round(viewportWidth * 100 / DESKTOP_VIEWPORT) / 100;
    initScale = parseFloat(viewportWidth / DESKTOP_VIEWPORT).toFixed(1);
    if (initScale > 1) {
      initScale = 1;
    }
    $viewport.attr('content', `width=${DESKTOP_VIEWPORT}, initial-scale=${initScale}, maximum-scale=1`);
    $viewport.prependTo($('head'));
    if (!$('html').hasClass('pg-loaded')) {
      $('html').addClass('pg-loaded');
    }
    // console.log(`screen orientaion changed, angle = ${orientation} scale = ${initScale}`);
  };
  $.browser['device'] = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
  const IS_TABLET = ($.browser.device && window.screen.width >= 768);
  if (IS_TABLET) {
    $('html').removeClass('pg-loaded');
    let _autoScaleViewport = () => {
      setTimeout(autoScaleViewport, 222);
    };
    _autoScaleViewport();
    $(window).on('orientationchange', _autoScaleViewport);
  }
})(jQuery);
