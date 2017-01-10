$(document).ready(function () {
    $('.carousel').carousel({
        interval: 5000
    });
    $('.carousel').carousel('cycle');

    $('#top-nav').onePageNav({
        currentClass: 'active',
        changeHash: true,
        scrollSpeed: 500
    });


});


// animation
$(window).scroll(function () {
    $('#about,.album, ul li').each(function () {
        var elementPos = $(this).offset().top;

        var topOfWindow = $(window).scrollTop();
        if (elementPos < topOfWindow + 400) {
            $(this).addClass("animated fadeInUp");
        }
    });


    $('h3,h4').each(function () {
        var elementPos = $(this).offset().top;

        var topOfWindow = $(window).scrollTop();
        if (elementPos < topOfWindow + 500) {
            $(this).addClass("animated fadeInUp");
        }
    });


});

document.getElementById("signin").onclick = function () {
    location.href = "vueForm.php";
};

document.getElementById("index").onclick = function () {
    location.href = "vueAcceuil.php";
};

document.getElementById("signup").onclick = function () {
    location.href = "vueFormRegister.php";
};

document.getElementById("saisieTitre").onclick = function () {
    location.href = "vueSaisieMusiqueCreate.php";
};
