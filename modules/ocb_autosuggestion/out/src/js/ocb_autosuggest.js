function showDetailsFromArticle( message ) {
    window.location.href = message;
} 

jQuery.widget( "custom.catcomplete", jQuery.ui.autocomplete, {
	_renderMenu: function( ul, items ) {
		var that = this,
		currentCategory = "";
		jQuery.each( items, function( index, item ) {
			if ( item.category != currentCategory ) {
				ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
				currentCategory = item.category;
			}
			that._renderItemData( ul, item );
		});
	},
	_renderItem: function( ul, item ) {
		return jQuery( "<li></li>" )
			.data( "item.autocomplete", item )
			.append( "<a>" + "<div style='width:30px; text-align:center;float:left;padding-right:5px;'><img src='" + item.image + "' style='max-height: 30px; max-width: 30px;'/></div><span class='title'>" + item.label + "</span></a>" )
			.appendTo( ul );
	}
});
	
jQuery( "#searchParam" ).catcomplete({
    source: source,
    minLength: 2,
    delay:200,
    select: function( event, ui ) {
        showDetailsFromArticle(ui.item.link);
    }
});


