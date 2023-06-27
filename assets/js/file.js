function options() {
  var video = $("#modal-content video").get(0)
  var progressBar = $('.progress-bar')


  function updateProgressBar() {
      var progress = (video.currentTime / video.duration) * 100;
      progressBar.find('.progress').css('width', progress + '%');
      requestAnimationFrame(updateProgressBar);
    }
  
    $(video).on('play', function() {
      requestAnimationFrame(updateProgressBar);
    });
  
    progressBar.on('click', function(event) {
      var progressWidth = progressBar.width();
      var offsetX = event.pageX - progressBar.offset().left;
      var clickTime = (offsetX / progressWidth) * video.duration;
      video.currentTime = clickTime;
    });

}