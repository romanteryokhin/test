require('./bootstrap');
$(document).ready(function() {

    $("#sendMail").on('click', function() {

        var name = $("#comment_name").val().trim();
        var message = $("#comment_message").val().trim();

         if (name == "") {
            $("#errorMess").addClass('alert-danger').text("Введите имя");
            return false;
        } else if (message == "") {
            $("#errorMess").addClass('alert-danger').text("Введите сообщение");
            return false;
        }

        $("#errorMess").text("");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/ajax/add_comment',
            type: 'POST',
            cache: false,
            data: { "_token": $('meta[name="csrf-token"]').attr('content'), 'name': name, 'message': message },
            dataType: 'html',
            beforeSend: function() {
                $("#sendMail").prop('disabled', true);
            },
            success: function(data) {
                //if (!data) {
                //    alert('Error! Message not sent!')
                //} else {
                    $("#comment_form").trigger('reset')
                //}
                $("#sendMail").prop('disabled', false);
                $("#errorMess").addClass('alert-success').text("Спасибо за комментарий");

                setTimeout(function(){
                    window.location.href = '/';
                }, 3000);
            }
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

    });
});
