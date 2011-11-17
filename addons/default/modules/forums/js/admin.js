(function($) {
    $(function() {
        /**
         * Sortable forums
         */
        $('table.forums tbody').sortable({
			handle: 'td',
			helper: 'clone',
			start: function(event, ui) {
				$('tr').removeClass('alt');
			},
			update: function() {
				order = new Array();
				$('tr', this).each(function(){
					order.push( $(this).find('input[name="action_to[]"]').val() );
				});
				order = order.join(',');
				
				$.post(BASE_URI + 'index.php/admin/forums/ajax_forum_order', { order: order }, function() {
					$('tr').removeClass('alt');
					$('tr:even').addClass('alt');
				});
			},
			stop: function(event, ui) {
				$("tbody tr:nth-child(even)").livequery(function () {
					$(this).addClass("alt");
				});
			}
			
	}).disableSelection();
        
        /**
         * Sortable categories
         */
        $('table.forum_categories tbody').sortable({
			handle: 'td',
			helper: 'clone',
			start: function(event, ui) {
				$('tr').removeClass('alt');
			},
			update: function() {
				order = new Array();
				$('tr', this).each(function(){
					order.push( $(this).find('input[name="action_to[]"]').val() );
				});
				order = order.join(',');
				
				$.post(BASE_URI + 'index.php/admin/forums/ajax_category_order', { order: order }, function() {
					$('tr').removeClass('alt');
					$('tr:even').addClass('alt');
				});
			},
			stop: function(event, ui) {
				$("tbody tr:nth-child(even)").livequery(function () {
					$(this).addClass("alt");
				});
			}
			
	}).disableSelection();
		
    });
})(jQuery);