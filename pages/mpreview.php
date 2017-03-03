<?php
ob_clean();
header('Content-Type: text/javascript');

?>
$(document).ready(function() {
	$('#update_bug_form,#report_bug_form').find('textarea.form-control').each(function(index, el) {
		var $el = $(el);
		var mpId = 'mp-'+el.id;
		var html = '<div id="'+mpId+'" class="markdown-preview" data="'+el.id+'"></div>';
		$el.parent().append(html);
		$el.blur(function() {
			var data =  {markdown: $el.val()};
			var $target = $('#'+mpId);
			$.ajax({
			  url: '<?php echo plugin_page('mpconvert.php') ?>',
			  data: data,
			  dataType: 'html' 
			}).done(function(data) {
				$target.html(data);
			})
			.fail(function() {
			   alert( "error" );
			});
			//.always(function() {
  			//});
		});
	});
});
