function getKeyByValue(object, value) {
    return Object.keys(object).filter(k=>JSON.stringify(object[k])===JSON.stringify(value));
}

function navModal(name, string, id) {
    const array = string.split(",").map(Number);
    let current = parseInt(getKeyByValue(array, id))
    var prevs = $("#modal-prevs")
    var next = $("#modal-next")

    if(current !== 0) {
        prevs.attr('onclick', "openModal('"+name+"', "+array[current-1]+", true)")
        prevs.removeClass("swiper-button-disabled")
    }else {
        prevs.attr('onclick', "")
        prevs.addClass("swiper-button-disabled")
    }

    if(current !== array.length -1) {
        next.attr('onclick', "openModal('"+name+"', "+array[current+1]+", true)")
        next.removeClass("swiper-button-disabled")
    }else {
        next.attr('onclick', "")
        next.addClass("swiper-button-disabled")
    }
}

function openModal(name, id, push) {       
    $.ajax({

        url: 'app/models/ajax/'+name+'_ajax.php',
        method: 'POST',
        data: {id:id},

        success: function(data) {
            console.log(data)
            var data = $.parseJSON(data)

            var type = data[0]
            var date = data[1]
            var content = data[2]
            var text = data[3]
            var hashtags = data[4]
            var username = data[5]
            var profile_pic = data[6]

            if(content.split('.').pop() == "webp") {
                content = "<img src='"+content+"'>"
            }else if(content.split('.').pop() == "webm") {
                content = "<video autoplay muted loop><source src='"+content+"' type='video/webm'></video>"
            }

            $("#modal-container").addClass(name+"-container")
            $("#modal-container").attr('name', name)
            $("#modal-date").html(date)
            $("#modal-content").html(content)
            $(".modal-href").attr('href', "/@"+username)
            $("#modal-username").html(username)
            $("#modal-img").attr('src',profile_pic)

            if(name == "story") {
                var string = $("#stories").attr('stories')
                navModal(name, string, id)

                if(type == "img") {
                    console.log("story - img")
                    $("#modal-top-right").empty()
                }else if(type == "video") {
                    console.log("story - video")
                    $("#modal-top-right").html("<div id='modal-pause' class='modal-option pointer'><i class='fa-solid fa-pause'></i></div><div id='modal-volume' class='modal-option pointer'><i class='fa-solid fa-volume-xmark'></i></div>")
                }

            }else if (name == "post") {
                var string = $("#posts").attr('posts')
                navModal(name, string, id)

                if(type == "img") {
                    console.log("post - img")
                    $("#modal-options").empty()
                }else if(type == "video") {
                    console.log("post - video")
                    $("#modal-options").html("<div id='modal-pause' class='modal-option pointer'><i class='fa-solid fa-pause'></i></div><div id='modal-volume' class='modal-option pointer'><i class='fa-solid fa-volume-xmark'></i></div><div class='progress-bar pointer'><div class='progress-back'></div><div class='progress'></div></div>")
                    options()
                }

            }

            if(push) {
                history.pushState(null, '', location.pathname+'#'+name+'/'+id)
            }

            $("header").css("margin-right", "12px")
            $("main").css("margin-right", "12px")
            $("body").addClass("modalFade")
            $("#modal").css("z-index", "999")
            $("#modal").css("opacity", "1")

        }

    })
}

function closeModal(push) {

    if(push) {
        window.location.href.split('#')[0]
        history.pushState(null, '', window.location.href.split('#')[0])
    }

    $("header").css("margin-right", "0px")
    $("main").css("margin-right", "0px")
    $("body").removeClass("modalFade")
    $("#modal").css("z-index", "-1")
    $("#modal").css("opacity", "0")

    $("#modal-container").removeClass()
    $("#modal-container").attr('name', "")
    $("#modal-date").empty()
    $("#modal-content").empty()
    $("#modal-text").empty()
    $(".modal-href").attr('href', "")
    $("#modal-username").empty()
    $("#modal-img").attr('src', "")

    $("#modal-top-right").empty()
    $("#modal-options").empty()

}

$("#modal").on("click",function(e) {
    if(e.target.classList.contains('modal')) {
        return closeModal(true);
    }
});
