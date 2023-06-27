AOS.init({
    duration: 1200,
});

function focusSearch() {
    document.getElementById("input-search").focus()
}

function copy(id) {
    $.ajax({
      url: 'ajax/post_copy.php',
      method: 'GET',
      data: { id: id },
      success: function(data) {
        var $tempInput = $('<input>'); // Create a temporary input element
        $tempInput.val(data); // Set the input value to the data received from the AJAX request
        $('body').append($tempInput); // Append the input element to the body
        $tempInput.select(); // Select the input's text
        document.execCommand('copy'); // Execute the copy command
        $tempInput.remove(); // Remove the temporary input element
      }
    });
}  

function showPostOption(postId) {
    $('.post-option-box').remove("")
    var current = $(".post[post=\""+postId+"\"] .post-top-right")
    if(!current.hasClass('post-option-box')) {
        $.ajax({

            url: 'ajax/post_option_ajax.php',
            method: 'GET',
            data: {postId:postId},
    
            success: function(data) {
                current.append(data)                
            }
    
        })
    }
}

$(document).on("click", function(a) {

    if (!$(a.target).closest(".post-option-box").length) {
        var active = $(".post-option-box")
        active.removeClass("show")
        active.remove()
        console.log("xd")
    }

});