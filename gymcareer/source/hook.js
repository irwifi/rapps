let iframe_width, iframe_height, source;

$(function() {
  iframe_width = $("#source_hook").attr("data-width");
  if(iframe_width > window.innerWidth) {
    iframe_width = window.innerWidth
  }
  iframe_height = (iframe_width * 15) / 16;
  source = $("#source_hook").attr("data-source");

  $("#source_hook").after("<iframe id='source_iframe' src='" + source + "' frameborder='2' scrolling='no' width='" + iframe_width + "px' height='" + iframe_height + "px'></iframe> ");
  $("#source_iframe").css({"position": "relative", "display": "block", "margin": "0 auto", "z-index": "999991"});
});
