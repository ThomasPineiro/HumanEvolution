// Trouver un vrai plugin
// $.ajax({
//     method: 'GET',
//     url: 'personnage.php',
//     timeout: 30000,
//     dataType: 'json'
//     success: ,
//     error: ,
//   });
$("#btn").click(function(){
    $.ajax ({
        type: "POST",
        url: "instanciation.php",
        data: {},
        dataType: "json",
        // contentType: "application/json",
        timeout: 30000,
        success: function(showResults){
            $("#table").html(showResults);
            console.log('victoire');
        },
        error: function(){
            $("#table").append('connexion failed');
        }
    });
});