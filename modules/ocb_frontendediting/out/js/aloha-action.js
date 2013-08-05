Aloha.ready(function() {
    Aloha.require( ['aloha', 'aloha/jquery'], function( Aloha, jQuery) {
        Aloha.bind('aloha-editable-deactivated', function(){
            var content     = Aloha.activeEditable.getContents();
            var oxId        = Aloha.activeEditable.obj.attr('oxid');
            var tableField  = Aloha.activeEditable.obj.attr('tableField');

            var request = jQuery.ajax({
                url: requesturl,
                type: "POST",
                data: {
                        content : content,
                        oxId : oxId,
                        tableField : tableField
                },
                dataType: "html"
            });

            request.done(function(msg)
            {
                if(msg != 'Inhalt gespeichert.')
                {
                    jQuery("#debug").html( msg ).show().delay(10000).fadeOut();  
                }
            });
        });
    });
});
