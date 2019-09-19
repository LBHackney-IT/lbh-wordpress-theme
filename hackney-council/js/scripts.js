var $ = jQuery;
(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		// if (jQuery) {  
		// 	// jQuery is loaded  
		// 	alert("Yeah! jQuery is active");
		// } else {
		// 	// jQuery is not loaded
		// 	alert("jQuery doesn't Work");
		// }

		// $(document).ready(function($) {
		// 	$('#accordion .accordionButton').click(function() {
		// 		var content = $(this).closest('.content').find('.accordionContent');
		// 		$('#accordion .accordionContent').not(content).slideUp();
		// 		content.slideDown();
		// 	});

		// });

		$(document).ready(function() {
			
			$('.article-title').on('click', function () {
				/*クリックでコンテンツを開閉*/
				$(this).next().slideToggle(200);
				/*矢印の向きを変更*/
				$(this).toggleClass('open');
			  });
			  

		  });
		  


	});
	
})(jQuery, this);
