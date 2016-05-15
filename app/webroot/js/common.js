/**
 * Created by sujav on 12/23/2015.
 */

jQuery(document).on("submit", "#frmAddNewPary", function (event) {
    event.preventDefault();

    $.ajax({
        url: site_url + 'ajax/addNewParty',
        type: 'post',
        dataType: 'json',
        data: $(this).serialize(),
        success: function (data) {
            if (data.errors) {
                var error_html = "";
                $(data.errors).each(function (field, message) {
                    if(message.username)
                        error_html += "<li class='error-message'>" + message.username + "</li>";
                    if(message.first_name)
                        error_html += "<li class='error-message'>" + message.first_name + "</li>";
                    if(message.last_name)
                        error_html += "<li class='error-message'>" + message.last_name + "</li>";
                });
                if (error_html)
                    $("#addPartyMessages").html(error_html).show();
            }else{
                $("#frmAddNewPary")[0].reset();
                $('#addNewPartyModal').modal('hide')
            }
        }
    });
});

$(function() {
    //TODO 2 It would be great to have a fadeIn while the slide down is happening.
    //http://greensock.com/docs/#/HTML5/GSAP/TweenLite/
    $('#flashMessage,#Message').slideDown({duration: 800});//.fadeIn(800);
    setTimeout(function(){$('#flashMessage,#Message').slideUp({duration: 1000, queue: false}).fadeOut(1000);}, 5000);
//    $('#flashMessage').slideDown(500).delay(5000).slideUp({duration: 1000, queue: false;}).fadeOut(1000);
});