i = prompt ("Choose test number");

$("#test").click(function ()
{
    $.ajax ({
        type: "POST",
        url: "../partieAjax.php",
        data: 'nbPerso='+ i,
        dataType: "json",
        timeout: 3000,
        success:  function(data) {
            for (n = 0; n < i; n++) {
                creationCellule(n);

                $(".taille" + n).html(data[n][2] + ' cm');
                $(".sexe" + n).html(data[n][3]);
                var age = parseInt($(".age" + n).html());
                var taille = parseFloat($(".taille" + n).html());
                var sexe = $(".sexe" + n).html().substring(0,5);

                all = [age, taille, sexe, data[n][1], data[n][0]];
                tabPersonnage.push(all);
            }
        },
        error:  function() {
            console.log();
        },
    });
});


    function creationCellule(n) {
        // Ajoute une div avec le personnage et toutes ses informations
        $('.wrapper').append("<div class='grid_col'><div class='row'><img class='img img"+ n +"' src='img/bebe.svg'/></div><div class='row responsive_row'><span class='sexe"+ n +"'></span><span>&nbsp;/&nbsp;</span><span class='age"+ n +"'>0</span><span>&nbsp;ans&nbsp;/&nbsp;</span><span class='taille"+ n +"'></span></div></div>");
    }

tabPersonnage = [];

function evolution(n) {
    
    $(".age" + n).html(tabPersonnage[n][0] + ' ans / ');
    $(".taille" + n).html(tabPersonnage[n][1].toFixed(1) + ' cm');

    tabPersonnage[n][0]++;

    if (tabPersonnage[n][0] < tabPersonnage[n][4] ) {
        if (tabPersonnage[n][0] <= 3) {
            tabPersonnage[n][1] = tabPersonnage[n][1] + (20*growth);
            $(".img" + n).attr('src', 'img/bebe.svg');
        } else if (tabPersonnage[n][0] <= 12) {
            tabPersonnage[n][1] = tabPersonnage[n][1] + (5*growth);
            $(".img" + n).attr('src', 'img/enfant.svg');
        } else if (tabPersonnage[n][0] <= 17) {
            tabPersonnage[n][1] = tabPersonnage[n][1] + 2;
            $(".img" + n).attr('src', 'img/' + tabPersonnage[n][2] + 'A.svg');
        } else if (tabPersonnage[n][0] <= 50) {
            $(".img" + n).attr('src', 'img/' + tabPersonnage[n][2] + 'J.svg');
        }   else if (tabPersonnage[n][0] <= 70) {
            $(".img" + n).attr('src', 'img/' + tabPersonnage[n][2] + 'M.svg');
        } else {
            tabPersonnage[n][1] = tabPersonnage[n][1] - 0.1;
            $(".img" + n).attr('src', 'img/' + tabPersonnage[n][2] + 'V.svg');
        };
    } else {
        $(".img" + n).attr('src', 'img/rip.svg');
        tabPersonnage[n][0] = tabPersonnage[n][4];
    }
};

function chrono() {
    var year = parseInt($(".chrono").html());
    var chrono = setInterval(function() {
        $(".chrono").html(year);
        for (n = 0; n < 9; n++) {
            evolution(n);
        }
        year++;
        if (year > 2000) {
            clearInterval(chrono);
        }
    }, 100);
}