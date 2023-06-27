$(document).on("click", "#modal-pause", function () {
    var video = $("#modal-content video").get(0);

    if( video.paused !== true) {
        pauseModal()
    } else {
        playModal()
    }
})

$(document).on("click", "#modal-volume", function () {
    var video = $("#modal-content video")

    if( video.prop('muted') ) {
        unmuteModal()
    } else {
        muteModal()
    }
})

function pauseModal() {
    if($("#modal-pause i").hasClass("fa-pause")) {
        $("#modal-pause i").toggleClass('fa-pause fa-play')
        $("#modal-content video").get(0).pause()
        console.log("pause story")
    }
}

function playModal() {
    if($("#modal-pause i").hasClass("fa-play")) {
        $("#modal-pause i").toggleClass('fa-play fa-pause')
        $("#modal-content video").get(0).play()
        console.log("play story")
    }
}

function muteModal() {
    if($("#modal-volume i").hasClass("fa-volume-high")) {
        $("#modal-volume i").toggleClass('fa-volume-high fa-volume-xmark')
        $("#modal-content video").prop('muted', true);
        console.log("mute story")
    }
}

function unmuteModal() {
    if($("#modal-volume i").hasClass("fa-volume-xmark")) {
        $("#modal-volume i").toggleClass('fa-volume-xmark fa-volume-high')
        $("#modal-content video").prop('muted', false);
        console.log("unmute story")
    }
}