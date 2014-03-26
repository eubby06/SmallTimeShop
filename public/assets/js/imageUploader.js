"use strict";

(function($, App){

	App.Model = function(){

		var self = this;
		var uploadUrl = '/admin/photos/upload/4';
		var $progress = $('.progress');
		var $progressBar = $progress.find('.progress-bar');

		self.upload = function(data) {

			$progress.removeClass('hide');

			$.ajax({
				xhr: function()
			   {
			     var xhr = new window.XMLHttpRequest();
			     //Upload progress
			     xhr.upload.addEventListener("progress", function(evt){

			       if (evt.lengthComputable) {

			         var percentComplete = Math.floor(evt.loaded / evt.total * 100) + '%';

			         $progressBar.css('width', percentComplete);
			         $progressBar.text(percentComplete + ' Complete (success)');
			       }

			     }, false);

			     return xhr;
			   },
				type: 'POST',
				url: uploadUrl,
				data: data,
		        processData: false, // Don't process the files
		        contentType: false,
		        success: function(data) {

		        	$progress.fadeOut(2000, function(){

		        		$(this).addClass('hide');

		        	});
		        }
				});
		};
	};

	App.Controller = function(model, element) {
		var $form 	= $(element);
		var $input 	= $form.find('input:file');

		$form
			.on('submit', function(event) {

				event.stopPropagation();
				event.preventDefault();
;
				var data = new FormData(this);

				model.upload(data);
			});
	};

})(jQuery, window.ImageUploader || (window.ImageUploader= {}));


$(function(){

	ImageUploader.Controller(new ImageUploader.Model(), "#imageUploader");

});