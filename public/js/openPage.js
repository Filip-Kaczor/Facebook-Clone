function loadContent(url) {
    $.ajax(url, {
        success: function(response) {
            $('#mainCenter').html(response)

            var root = "/facebook"
            url = url.replace(root, '')
            console.log(url)
            $('.modal a').removeClass('navModalOption-active')
            $('.modal a i').removeClass('navModalIcon-active')
            var target = $('.modal a[href=\"'+url+'\"]')
            var target2 = $('.modal a[href=\"'+url+'\"] i')
            target.addClass('navModalOption-active')
            target2.addClass('navModalIcon-active')
        }
    });
}

function handleRouting() {
    var root = "/facebook"
    var path = location.pathname
    var hash = location.hash

    if(hash != "") {
        hash = hash.replace("#", "").split("/")
        loadContent(path)
        eval("openModal('" + hash[0] + "', " + hash[1] +")")
    }else {
        loadContent(path)
    }

}

$('body').on('click', 'a', function(e) {
    e.preventDefault()
    var root = "/facebook"
    var url = $(this).attr('href')
    if(root+url !== location.pathname) {
        history.pushState(null, '', root+url)
        handleRouting()
    }
});

$(window).bind("popstate", function() {
    handleRouting(location.href)
});