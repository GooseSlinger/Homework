$(document).ready(function() {
    $("form").submit(function(event) {
        var formData = {
            user_name: $("#user_name").val(),
            user_last_name: $("#user_last_name").val(),
            user_second_name: $("#user_second_name").val(),
        };

        $.ajax({
            type: "POST",
            url: "dadata.php",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function(result) {
            console.log(result);
            console.log(result.patronymic);

            $("#result").html(
                '<p>Полное имя: ' + result.result + '</p>' +
                '<p>В лице: ' + result.result_genitive + '</p>' +
                '<p>Кому: ' + result.result_dative + '</p>' +
                '<p>Согласовано: ' + result.result_ablative + '</p>' + 
                '<p>Имя: ' + result.name + '</p>' +
                '<p>Фамилия: ' + result.surname + '</p>' +
                '<p>Отчество: ' + result.patronymic + '</p>' +
                '<p>Пол: ' + result.gender + '</p>'
            );

        });

        event.preventDefault();
    });
});