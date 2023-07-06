AOS.init({
    duration: 1200,
});

function focusSearch() {
    document.getElementById("input-search").focus()
}

function copy(id) {
    $.ajax({
      url: 'app/models/ajax/post_copy.php',
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

function showOption(name, id) {
    $('.show-option-box').remove("")
    var current = $("#showOption-"+name+"-"+id)
    if(!current.hasClass('show-option-box')) {
        $.ajax({

            url: 'app/models/ajax/'+name+'_option_ajax.php',
            method: 'GET',
            data: {id:id},
    
            success: function(data) {
                current.append(data)                
            }
    
        })
    }
}

$(document).on("click", function(a) {

    if (!$(a.target).closest(".show-option-box").length) {
        var active = $(".show-option-box")
        active.removeClass("show")
        active.remove()
    }

});