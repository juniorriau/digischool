jQuery(document).ready(function($) {

// Hamzh Tabs
	$(".hamzh-tabs").tabs();

// Hamzh Toggle
	$(".hamzh-toggle").each( function () {
		var $this = $(this);
		if( $this.attr('data-id') == 'closed' ) {
			$this.accordion({ header: '.hamzh-toggle-title', collapsible: true, active: false  });
		} else {
			$this.accordion({ header: '.hamzh-toggle-title', collapsible: true});
		}

		$this.on('accordionactivate', function( e, ui ) {
			$this.accordion('refresh');
		});

		$(window).on('resize', function() {
			$this.accordion('refresh');
		});
	});


jQuery('.skillbar').each(function(){
	jQuery(this).find('.skillbar-bar').animate({
		width:jQuery(this).attr('data-percent')
	},2000);
});


});

