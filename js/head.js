// JavaScript Document



//***********head scrolltop***********//
$j=jQuery.noConflict();
$j(document).ready(function() {    
    var nav = $j('#nav');
            $j('#head-search').hide();
    $j(window).scroll(function () {
        if ($j(this).scrollTop() > 80) {
            nav.addClass("scroll-nav");
$j('#nav').hide();
$j('#head-search').show();
        } else {
            nav.removeClass("scroll-nav");
$j('#nav').show();
$j('#head-search').hide();
        }
    });
});


$j=jQuery.noConflict();
$j(document).ready(function() {    
    var nav = $j('#menu');
            $j('#head-search').hide();
    $j(window).scroll(function () {
        if ($j(this).scrollTop() > 80) {
            nav.addClass("scroll-nav");
$j('#menu').hide();
$j('#head-search').show();
        } else {
            nav.removeClass("scroll-nav");
$j('#menu').show();
$j('#head-search').hide();
        }
    });
});


/*******************check box**************************************/

$('#av').hide();
    $('#pressav').on('click', function () {
        $('#av').slideToggle('medium');
    });

$('#classes-checkb').hide();
    $('#press').on('click', function () {
        $('#classes-checkb').slideToggle('medium');
    });
$('#classes-checkb2').hide();
    $('#press2').on('click', function () {
        $('#classes-checkb2').slideToggle('medium');
    });

$('#classes-checkb3').hide();
    $('#press3').on('click', function () {
        $('#classes-checkb3').slideToggle('medium');
    });




$('#classes-checkb4').hide();
    $('#press4').on('click', function () {
        $('#classes-checkb4').slideToggle('medium');
    });




$('#classes-checkb5').hide();
    $('#press5').on('click', function () {
        $('#classes-checkb5').slideToggle('medium');
    });



$('#classes-checkb6').hide();
    $('#press6').on('click', function () {
        $('#classes-checkb6').slideToggle('medium');
    });

$('#classes-checkb7').hide();
    $('#press7').on('click', function () {
        $('#classes-checkb7').slideToggle('medium');
		
		
		
		});
	
	
	/********************************filters******************************/
	
		 $(function() {
$j( "#slider-range" ).bxSlider({
range: true,
min: 0,
max: 1000,
values: [ 75, 300 ],
slide: function( event, ui ) {
$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
}
});
$( "#amount" ).val( "$" + $j( "#slider-range" ).bxSlider( "values", 0 ) +
" - $" + $j( "#slider-range" ).bxSlider( "values", 1 ) );
});
		


 $(function() {
$j( "#slider-range2" ).bxSlider({
range: true,
min: 01,
max: 24,
values: [ 3, 24],
slide: function( event, ui ) {
$( "#amount2" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
}
});
$( "#amount2" ).val( "" + $j( "#slider-range2" ).bxSlider( "values", 0 ) +
" - " + $j( "#slider-range2" ).bxSlider( "values", 1 ) );
});
		
/********************************filters******************************/
	
/*	
$(function() {
    $j( "#datepicker" ).datepicker();
  });
		
*/		




/*
 $(function() {
            var offset = $(".filters").offset();
            var topPadding = 15;
            $(window).scroll(function() {
                if ($(window).scrollTop() > offset.top) {
                    $(".filters").stop().animate({
                        marginTop: $(window).scrollTop() - offset.top + topPadding
                    });
                } else {
                    $(".filters").stop().animate({
                        marginTop: 0
                    });
                };
            });
        });
*/    

