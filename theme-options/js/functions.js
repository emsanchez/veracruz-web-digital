// JavaScript Document
jQuery(document).ready(function($) {
	$("#theme-options-panel").submit(function(event){
		event.preventDefault();
		var self = $(this);
		var data = self.serializeArray();
		$("#theme_options_preloader").css("display", "block");
		$("#theme_options_tick").css("display", "none");
		$.ajax({
				url: ajaxurl,
				type: 'post',
				dataType: 'json',
				data: data,
				success: function(json){
					console.log(data);
					$("#theme_options_preloader").css("display", "none");
					$("#theme_options_tick").css("display", "block");
				}
		});
	});
	
	//firts upload media slider
	$( '#uploadimage0' ).on( 'click', function() {
		var button = $(this);
		var send_attachment = wp.media.editor.send.attachment;
		wp.media.editor.send.attachment = function(props, attachment){
			$( '.img-preview-0').attr('src',attachment.url);
			$( '#slide-img-0' ).val(attachment.url);
			wp.media.editor.send.attachment = send_attachment;
		}
		wp.media.editor.open(button);
		return false;
	});
	
	/*template add-more*/
	$(document).on('click','#add-more',function() {
        var num_sliders = $("#content-img-slider .item-slider").length;
		$("#add-more").remove();
		var form_slider =   "<div class='item-slider'>";
				form_slider +=  "<a class='delete-slide'>";
				form_slider += 		"<img src='../wp-content/themes/evolucion-2014/theme-options/images/btn-close.png'>";
				form_slider += "</a>";
				form_slider += "<div class='col-md-2'>";
				form_slider += 		"<img class='img-preview-"+num_sliders+" img-full' src='../wp-content/themes/evolucion-2014/theme-options/images/dummy-83x83.png'>";
				form_slider += "</div>";
				form_slider += "<div class='col-md-10'>";
				form_slider += 		"<div class='form-group'>";
				form_slider += 			"<div class='col-md-9 sin-padding-left'>";
				form_slider += 				"<input type='text' class='form-control input-sm' id='slide-img-"+num_sliders+"' name='slide-img[]' placeholder='Url Slider'>";
				form_slider += 			"</div>";
				form_slider += 			"<div class='col-md-3 sin-padding-righ'>";
				form_slider += 				"<input type='button' class='button-primary form-control' value='Subir imagen' id='uploadimage"+num_sliders+"'/>";
				form_slider += 			"</div>";
				form_slider += 			"<div class='clearfix'></div>"; 
				form_slider += 		"</div>";
				form_slider += 		"<div class='form-group'>";
				form_slider += 			"<input type='text' class='form-control input-sm' id='slide-url-"+num_sliders+"' name='slide-url[]' placeholder='Link de slider'>";
				form_slider += 		"</div>";
				form_slider += 		"<div class='form-group'>";
				form_slider += 			"<input type='text' class='form-control input-sm' id='slide-title-"+num_sliders+"' name='slide-title[]' placeholder='Titúlo de slider'>";
				form_slider += 		"</div>";
				form_slider += "</div>";
				form_slider += "<div class='clearfix'></div>"
			form_slider += "</div>";
			form_slider += "<input type='button' id='add-more' class='btn-add-more' value='Add More'>";
			
        $("#content-img-slider").append(form_slider);
		
		$(document).on('click', '#uploadimage'+num_sliders , function() {
			var button = $(this);
			var send_attachment = wp.media.editor.send.attachment;
			wp.media.editor.send.attachment = function(props, attachment){
				$( '.img-preview-'+num_sliders).attr('src',attachment.url);
				$( '#slide-img-'+num_sliders ).val(attachment.url);
				wp.media.editor.send.attachment = send_attachment;
			}
			wp.media.editor.open(button);
			return false;
		});	
    });
	
	/*remove slide*/
	$(document).on('click','.delete-slide', function() {
		$(this).parent().remove();
	});
	
	/*
	$( ".edit-box" ).each(function( index ) {
		index++; */
		$( ".active-link" ).click(function(event) {
			event.preventDefault();
			$(this).parent('.textbox').toggleClass( "active" );
			
			if($('.textbox').hasClass( "active")){
				$('.textbox').replaceWith( "<textarea class='form-control' rows='10'>" + $('.textbox').text() + "</textarea>" );
				$('#box_conocenos').val($('.textbox textarea').val());
				$(this).text('Finalizar');
			}else{
				$('.textbox textarea').replaceWith( "<p>" + $('.textbox textarea').val() + "</p>" );
				$('#box_conocenos').val($('.textbox').text());
				$(this).text('Editar');
			}
		});
	//});
	
});
	
