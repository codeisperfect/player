(function($){
	
	//Tooltip
	var tooltip = $('<div id="tooltip" />').css({
		position: 'absolute',
		top: -17,
		left: 2
	}).hide();
	
	//Range slider
	$(".slider").each(function () {
		var begin = $(this).data("begin"),
            end = $(this).data("end");

        $(this).slider({
            range: "min",
            value: 0,
            min: begin,
            max: end,
            slide: function (event, ui) {
				var mop = 10000;
				var slideramount = ("#" + $(this).attr("id") + "_amount");
				var p1 = $(slideramount).val();
				var vpp = 5;
				var cash = mop-(p1*vpp);
				var sliderresult = ("#" + $(this).attr("id") + "_inr");
				
				$('#msg').text(cash);
				$(sliderresult).val("INR "+cash);
				
				tooltip.text(ui.value);
				//update text box quantity
				var slideramount = ("#" + $(this).attr("id") + "_amount");
				$(slideramount).val(ui.value);
				var slideramount1 = ("#" + $(this).attr("id") + "_qwe");
				$(slideramount1).val(ui.value);
				$(this).find(".ui-slider-handle").append(tooltip).hover(function() {
					tooltip.show()
				}, function() {
					tooltip.hide()
				})
			}
        })

        //initialise text box quantity
        var slideramount = ("#" + $(this).attr("id") + "_amount");
			$(slideramount).val($(this).slider("value"));
		});

    //When text box is changed, update slider
    $('.amount').change(function () {
        var value = this.value,
        selector = $(this).parent('p').next();
        selector.slider("value", value);
		
		var mop = 10000;
		var slideramount = ("#" + $(this).attr("id"));
		var p1 = $(slideramount).val();
		var vpp = 5;
		var cash = mop-(p1*vpp);
		var sliderresult = ("#" + $(this).next().attr("id"));
		$('#msg').text(cash);
		$(sliderresult).val("INR "+cash);
    });
	
	
	//Tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	
	
    // switch forms
    $('.open_register_form').click(function(e) {
        e.preventDefault();
        $('#login_form').removeClass().addClass('animated fadeOutDown');
        setTimeout(function() {
            $('#login_form').removeClass().hide();
            $('#register_form').show().addClass('animated fadeInUp');
        }, 700);
    })
    $('.open_login_form').click(function(e) {
        e.preventDefault();
        $('#register_form').removeClass().addClass('animated fadeOutDown');
        setTimeout(function() {
            $('#register_form').removeClass().hide();
            $('#login_form').show().addClass('animated fadeInUp');
        }, 700);
    })


	$('.toggle-btn').each(function() {
	  $(this).toggles({
		clickable: !$(this).hasClass('noclick'),
		dragable: !$(this).hasClass('nodrag'),
		click: ($(this).attr('rel')) ? $('.'+$(this).attr('rel')) : undefined,
		on: !$(this).hasClass('off'),
		checkbox: ($(this).data('checkbox')) ? $('.'+$(this).data('checkbox')) : undefined,
		ontext: $(this).data('ontext') || 'ON',
		offtext: $(this).data('offtext') || 'OFF'

	   });
	});
	

		
})(jQuery); 