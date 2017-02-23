jQuery(document).ready(function($){
	(function() {
		var hash = window.location.hash;

		$('#mcqueen-nav li a').click(function(e){
			var li = $(this).parent();
			var href = $(this).attr('href');
			li.addClass('current').siblings().removeClass('current');
			$('.mcqueen-group').hide();
			$(href+'-t').fadeIn();
			if ($.cookie != undefined) {
				$.cookie('tob_group', href, { expires: 7});/*** remember open section ***/
			}
		});

		if(hash){
			$('#mcqueen-nav li a[href='+hash+']').trigger('click');
		} else {
			if ($.cookie != undefined) {
				if ($.cookie('tob_group') != null) {
					$('#mcqueen-nav li a[href='+$.cookie('tob_group')+']').trigger('click');
				}
			}
		}

		$('input[type="submit"]#reset').click(function(){
			return confirm('Please note: Restoring default options will erase all custom styles and text you have saved.');
		});

		$('#mytheme_option_name-enable_swipe_gallery').click(function(){
			if($(this).is(':checked')){
				$('#mytheme_option_name-enable_scroll_gallery').prop('checked', false);
			}
		});
		$('#mytheme_option_name-enable_scroll_gallery').click(function(){
			if($(this).is(':checked')){
				$('#mytheme_option_name-enable_swipe_gallery').prop('checked', false);
			}
		});
	})();

	(function() {
		/*** Color Picker ***/
		$('.colorpicker').wpColorPicker();
		$('.mcqueen-field-upload').on('click', '.thumb-delete', function(e){
			var parent = $(this).parents('.mcqueen-field-content');
			parent.find('input[type="text"]').val('');
			parent.find('.thumb-preview').empty();
		});



		/*** Insert an Image ***/
		$('.mcqueen-field-upload').on('wpinsertmedia', '.tob-media-manager-show', function(e, media_attachment){
			media_attachment = media_attachment[0];
			if(media_attachment.sizes.medium === undefined){
				medium = media_attachment.url;
			} else {
				medium = media_attachment.sizes.medium.url;
			}
			var parent = $(this).parents('.mcqueen-field-content');

			parent.find('.thumb-preview').html('<div class="thumb-preview"><img src="'+medium+'" alt="thumb"><span class="thumb-delete"></span></div>');
			parent.find('input[type="text"]').val(media_attachment.url);
		});

		/*** Insert Images ***/
		$('.mcqueen-field-images').on('wpinsertmedia', '.tob-media-manager-show', function(e, media_attachments){
			var parent = $(this).parents('.mcqueen-field-content'),
				thumbnail,
				media_attachment,
				ids = parent.find('input[type="text"]').val(),
				ids_array;
			if (ids != ''){
				ids_array = ids.split(',');
			} else {
				ids_array = [];
			}


			for(i=0; i < media_attachments.length; ++i ){
				media_attachment = media_attachments[i];
				if (media_attachment.sizes.thumbnail == undefined) {
					thumbnail = media_attachment.url;
				} else {
					thumbnail = media_attachment.sizes.thumbnail.url;
				}

				parent.find('.mcqueen-images').append('<div class="thumb"><img src="'+thumbnail+'" alt="thumbnail"><span data-id="'+media_attachment.id+'" class="thumb-delete"></span></div>');
				ids_array.push(media_attachment.id);

			}
			parent.find('input[type="text"]').val(ids_array);
		});

		/*** Delete Images ***/
		$('.mcqueen-field-images').on('click', '.thumb-delete', function(e){
			var parent = $(this).parents('.mcqueen-field-content'),
				ids = parent.find('input[type="text"]').val();

			ids_array = ids.split(',');
			ids_array = remove_array_element($(this).data('id'), ids_array);
			console.log(ids_array);
			parent.find('input[type="text"]').val(ids_array);
			$(this).parents('.thumb').empty();
		});

		/*** Textbox Checkbox ***/
		$('#mytheme_option_name-full_version_url_checkbox').on('click', function(e){
			if ($(this).is(':checked')) {
				$('#mytheme_option_name-full_version_enable').val(1);
			} else {
				$('#mytheme_option_name-full_version_enable').val(0);
			}
		});
		if ($('#mytheme_option_name-full_version_enable').val() == 1) {
			$('#mytheme_option_name-full_version_url_checkbox').prop('checked',true);
		} else {
			$('#mytheme_option_name-full_version_url_checkbox').prop('checked',false);
		}

	})();

	(function() {
		if(typeof(wp.media) != "function"){
			return;
		}
		// Prepare the variable that holds our custom media manager.
		var tob_media_frame;
		var current_textbox = false;

		// Bind to our click event in order to open up the new media experience.
		$(document.body).on('click', '.tob-media-manager-show', function(e){
			// Prevent the default action from occuring.
			e.preventDefault();
			console.log('testing');
			current_textbox = $(this);

			// If the frame already exists, re-open it.
			if (tob_media_frame) {
				tob_media_frame.uploader.uploader.param('uploadaction', 'theme-options');
				tob_media_frame.open();
				return;
			}

			tob_media_frame = wp.media.frames.tob_media_frame = wp.media({
				className: 'media-frame tob-media-frame',
				frame: 'select',
				multiple: true,
				title: 'Select',
				library: {
					type: 'image'
				},
				button: {
					text:  'Insert'
				}
			});

			tob_media_frame.on('select', function(){
				// Grab our attachment selection and construct a JSON representation of the model.
				var media_attachment = tob_media_frame.state().get('selection').toJSON(),
					medium = '';
				current_textbox.trigger('wpinsertmedia', [media_attachment]);
			});

			// Now that everything has been set, let's open up the frame.
			tob_media_frame.open();
		});
	})();


});
function remove_array_element(needle, items){
	needle += '';
	while (items.indexOf(needle) !== -1) {
		items.splice(items.indexOf(needle), 1);
	}
	return items;
}