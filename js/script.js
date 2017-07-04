jQuery( document ).ready(function($) {
	$('.pw-gallery').each(function() {
		var instance = this;

		$('input[type=button]', instance).click(function() {
			var gallerysc = '[gallery ids="' + $('input[type=hidden]', instance).val() + '"]';
			wp.media.gallery.edit(gallerysc).on('update', function(g) {
				var id_array = [];
				var fileGroup = [];
				
				$( ".cmb2-media-status li" ).remove();
				
				$.each(g.models, function(id, img) { 
				
					id_array.push(this.id); 
					var width = this.attributes.sizes.thumbnail.width ? this.attributes.sizes.thumbnail.width  : 150;
					var height = this.attributes.sizes.thumbnail.height ? this.attributes.sizes.thumbnail.height  : 150;

					uploadStatus = '<li class="img-status"><img width="'+width+'" height="'+height+'" src="' + this.attributes.sizes.thumbnail.url+ '" class="attachment-150x150" alt=""></li>';
					fileGroup.push( uploadStatus );
				
				});
				
					$('input[type=hidden]', instance).val(id_array.join(","));
				
				$( fileGroup ).each( function() {

					$('.cmb2-media-status').slideDown().append(this);
				});
			});
		});
	});
});
