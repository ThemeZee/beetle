/**
 * Customizer-controls.js
 *
 * Add Theme Page, Theme Documentation and Rate this theme quick links to theme options panel in customizer
 *
 * @package Beetle
 */

( function( $ ) {

	// Add Theme Links
	if ('undefined' !== typeof beetle_theme_links) {
		
		// Theme Links Wrapper
		box = $('<div class="beetle-theme-links"></div>')
			.css({
				'margin-top' : '14px',
				'padding' : '2px 14px 14px',
				'line-height': '2',
				'font-size' : '14px',
				'clear' : 'both'
			});
		
		title = $('<h3></h3>').text(beetle_theme_links.title).css({ 'margin-bottom' : '4px' });
		
		// Theme Links
		themePage = $('<a class="beetle-theme-page"></a>')
			.attr('href', beetle_theme_links.themeURL)
			.attr('target', '_blank')
			.text(beetle_theme_links.themeLabel);
		
		themeDocu = $('<a class="beetle-theme-docu"></a>')
			.attr('href', beetle_theme_links.docuURL)
			.attr('target', '_blank')
			.text(beetle_theme_links.docuLabel);
		
		rateTheme = $('<a class="beetle-rate-theme"></a>')
			.attr('href', beetle_theme_links.rateURL)
			.attr('target', '_blank')
			.text(beetle_theme_links.rateLabel);
		
		// Add Links to Box
		content = box
			.append(title)
			.append(themePage).append("<br />")
			.append(themeDocu).append("<br />")
			.append(rateTheme);
		
		setTimeout(function () {
			$('#accordion-panel-beetle_options_panel .control-panel-content').append(content);
		}, 2000);

		// Remove accordion click event
		$('.beetle-theme-links a').on('click', function(e) {
			e.stopPropagation();
		});
	}
	
} )( jQuery );