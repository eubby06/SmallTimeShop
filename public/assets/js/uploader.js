
var Uploader = {

	form: $('#imageUploader'),
	input: $('#imageUploader input:file'),
	button: $('#imageUploader button.fileInput'),
	progressBarWrapper: $('.progress'),
	progressBar: $('.progress-bar'),
	uploadUrl: '/admin/photos/upload/',

	init: function() {

		Uploader.form.submit(function(e) {
			e.preventDefault();

			var productId 	= Uploader.form.find('input:hidden').val();
			var data 		= new FormData(this);

			Uploader.progressBarWrapper.removeClass('hide');
			Uploader.upload(data, productId);
		});

		Uploader.input.change(function(e) {
			e.preventDefault();
			Uploader.form.submit();
		});

		Uploader.button.click(function(e) {
			e.preventDefault();
			Uploader.input.trigger('click');
		});
	},

	upload: function(data, productId) {
			
			$.ajax({
				xhr: function() {
			     var xhr = new window.XMLHttpRequest();

			     xhr.upload.addEventListener("progress", function(evt){

			       if (evt.lengthComputable) {

			         var percentComplete = Math.floor(evt.loaded / evt.total * 100) + '%';

			         Uploader.progressBar.css('width', percentComplete);
			         Uploader.progressBar.text(percentComplete + ' Complete (success)');
			       }

			     }, false);

			     return xhr;
			   },
				type: 'POST',
				url: Uploader.uploadUrl + productId,
				data: data,
		        processData: false, // Don't process the files
		        contentType: false,
		        success: function(data) {

		        	Uploader.progressBarWrapper.fadeOut(2000, function(){

		        		$(this).addClass('hide');
		        		window.location.reload(true);
		        		});
		        	}
				});
	}
}

$(function(){
	Uploader.init();
});
