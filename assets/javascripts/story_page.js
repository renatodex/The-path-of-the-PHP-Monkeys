$(document).ready(function(){
    //LARGURA-------------------------->
    $largura = $(window).width()/2;

    $largTotal = 0;
    $("div.contend").each(function(){
        $largTotal += $(this).width();
    });

    $("#main").css("width", $largTotal);
    $("#main").css("margin-left", $largura - 477);

    //ALTURA--------------------------->
    $altura = $(window).height();

    $("#main").css("height", $altura);
    $("#main div.contend").css("height", $("#main").height() - 45);
    $("#main div.contend ul li").css("height", $("div.contend").height());
    $("#rodape").css("margin-top", $("#main").height() - 45);
});

$(window).resize(function(){
    $largura = $(window).width()/2;
    $("#main").css("margin-left", $largura - 477);

    $altura = $(window).height();
    $("#main").css("height", $altura);
    $("#main div.contend").css("height", $("#main").height() - 45);
    $("#main div.contend ul li").css("height", $(".contend").height());
    $("#rodape").css("margin-top", $altura-45);
});

$(function() {
    $('a.play').bind('click',function(event){
        var $anchor = $(this);

        var $elemento = $($anchor.attr('href')+' ul li.main');
        console.log(["Elemento=",$elemento].join('')) ;
        var $v1 = $(window).width()/2;
        console.log(["v1=",$v1].join(''));
        var $v2 = ($elemento.width()/2);
        console.log(["v2=",$v1].join(''));
        var $desconto = $v1 - $v2 - 100;
        console.log(["Desconto=",$desconto].join(''));

        $(window).scrollTo($elemento, 1500, {offset:-$desconto});

    });
});