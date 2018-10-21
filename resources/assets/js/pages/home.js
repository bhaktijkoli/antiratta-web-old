require('./../scripts/tubular');

$(()=> {
  $('.count').counterUp();
})
$('#intro-video').YTPlayer({
  fitToBackground: true,
  videoId: 'GEPhLqwKo6g',
  playerVars: {
    modestbranding: 0,
    autoplay: 1,
    autohide: 0,
    controls: 0,
    showinfo: 1,
    branding: 0,
    rel: 0,
  }
});
