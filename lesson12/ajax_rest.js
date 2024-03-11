$(document).ready(function () {
    $("form").submit(function (event) {
      var formData = {
        query: $("#ip").val(),
      };
      var url = "http://suggestions.dadata.ru/suggestions/api/4_1/rs/iplocate/address?ip=";
      var token = "4816d32581c10dbb73f99ec07447534b259d358a";
  
      $.ajax({
        type: "GET",
        url: url + formData.query,
        beforeSend: function(xhr) {
                   xhr.setRequestHeader("Authorization", "Token "+ token) 
              },
        data: '',
        dataType: "json",
        encode: true,
      }).done(function (result) {
        $("#result").html(
            '<p>Полученные данные: ' + '<pre>' + JSON.stringify(result, null, 2) + '</pre>' + '</p>'
        );
        console.log(result);
      });
  
      event.preventDefault();
    });
  });