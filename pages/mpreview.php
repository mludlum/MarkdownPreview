<?php
ob_clean();
header('Content-Type: text/javascript');

?>
$(document).ready(function() {
        function updatePreview(mpId, $el)
        {
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
                           console.log( "error converting markdown" );
                        });
                        //.always(function() {
                        //});
        }
        $('textarea.form-control').each(function(index, el) {
                var $el = $(el);
                var mpId = 'mp-'+el.id;
                var timerId = undefined;
                var html = '<div id="'+mpId+'" class="markdown-preview" data="'+el.id+'"></div>';
                $el.parent().append(html);
                $el.keyup(function() {
                        if (timerId === undefined) {
                                timerId = setTimeout(function() {
                                        updatePreview(mpId, $el);
                                        timerId = undefined;
                                }, 5000)
                        }
                });
                $el.blur(function() {
                        updatePreview(mpId, $el);
                });
        });
});
