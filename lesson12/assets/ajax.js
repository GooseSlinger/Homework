$(document).ready(function() {
    $("form").submit(function(event) {
        var formData = {
            ipClient: $("#ip").val(),
        };

        $.ajax({
            type: "POST",
            url: "dadata.php",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function(result) {
            $("#result").html(
                '<p>Ваш ip находится в городе: ' + result.unrestricted_value + '</p>'
            );

        });

        event.preventDefault();
    });
});