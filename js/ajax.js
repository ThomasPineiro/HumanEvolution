// Trouver un vrai plugin
// $.ajax({
//     method: 'GET',
//     url: 'personnage.php',
//     timeout: 30000,
//     dataType: 'json'
//     success: ,
//     error: ,
//   });

$.ajax ({
    type: "POST",
    url: "ajax.php",
    // data: {},
    dataType: "json",
    contentType: "application/json",
    timeout: 30000,
    success: function(showResults){
        $("#table").html(showResults);
    },
    error: {}
});