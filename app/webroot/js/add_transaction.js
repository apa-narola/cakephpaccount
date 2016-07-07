// disable enter key on input
// ref link : http://stackoverflow.com/questions/585396/how-to-prevent-enter-keypress-to-submit-a-web-form
$(function () {
    // CKEDITOR.replace('TransactionRemarks');
    CKEDITOR.replace('TransactionRemarks', {
        height: 45,
        enterMode: CKEDITOR.ENTER_BR,
    });
    var keyStop = {
        8: ":not(input:text, textarea, input:file, input:password)", // stop backspace = back
        13: "input:text, input:password", // stop enter = submit 

        end: null
    };
    $(document).bind("keydown", function (event) {
        var selector = keyStop[event.which];

        if (selector !== undefined && $(event.target).is(selector)) {
            event.preventDefault(); //stop event
        }
        return true;
    });

    // format currency indian style
    // ref link : https://github.com/BobKnothe/autoNumeric
    $("#TransactionAmount").autoNumeric("init", {
        vMin: "0",
        vMax: "9999999999",
        //aSep: ',',
        //aDec: ',', 
        //aSign: 'Rs.',
        //dGroup:'2s'
    });
});