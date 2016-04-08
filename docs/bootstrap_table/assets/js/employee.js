/**
 * Created by sujav on 3/22/2016.
 */

$(document).ready(function () {
    console.log("employee ready!");
});

$(document).on("click", ".view_empolyee", function () {
    var employee_id = $(this).attr("id");
    $.ajax({
        method: "POST",
        url: "../ajax.php",
        dataType: "json",
        data: {employee_id: employee_id, action: "get_employee"},
        success: function (response) {
            console.log(response);

        }
    });

});
