/**
 * Theme functions file.
 *
 * Contains handlers for navigation.
 */

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast'
   	});
});

function business_accounting_open() {
	jQuery(".sidenav").addClass('show');
}
function business_accounting_close() {
	jQuery(".sidenav").removeClass('show');
    jQuery( '.mobile-menu' ).focus();
}

function business_accounting_menuAccessibility() {
	var links, i, len,
	    business_accounting_menu = document.querySelector( '.nav-menu' ),
	    business_accounting_iconToggle = document.querySelector( '.nav-menu ul li:first-child a' );
    
	let business_accounting_focusableElements = 'button, a, input';
	let business_accounting_firstFocusableElement = business_accounting_iconToggle; // get first element to be focused inside menu
	let business_accounting_focusableContent = business_accounting_menu.querySelectorAll(business_accounting_focusableElements);
	let business_accounting_lastFocusableElement = business_accounting_focusableContent[business_accounting_focusableContent.length - 1]; // get last element to be focused inside menu

	if ( ! business_accounting_menu ) {
    	return false;
	}

	links = business_accounting_menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
	    links[i].addEventListener( 'focus', toggleFocus, true );
	    links[i].addEventListener( 'blur', toggleFocus, true );
	}

	// Sets or removes the .focus class on an element.
	function toggleFocus() {
      	var self = this;

      	// Move up through the ancestors of the current link until we hit .mobile-menu.
      	while (-1 === self.className.indexOf( 'nav-menu' ) ) {
	      	// On li elements toggle the class .focus.
	      	if ( 'li' === self.tagName.toLowerCase() ) {
	          	if ( -1 !== self.className.indexOf( 'focus' ) ) {
	          		self.className = self.className.replace( ' focus', '' );
	          	} else {
	          		self.className += ' focus';
	          	}
	      	}
	      	self = self.parentElement;
      	}
	}
    
	// Trap focus inside modal to make it ADA compliant
	document.addEventListener('keydown', function (e) {
	    let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

	    if ( ! isTabPressed ) {
	    	return;
	    }

	    if ( e.shiftKey ) { // if shift key pressed for shift + tab combination
	      	if (document.activeElement === business_accounting_firstFocusableElement) {
		        business_accounting_lastFocusableElement.focus(); // add focus for the last focusable element
		        e.preventDefault();
	      	}
	    } else { // if tab key is pressed
	    	if (document.activeElement === business_accounting_lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
		      	business_accounting_firstFocusableElement.focus(); // add focus for the first focusable element
		      	e.preventDefault();
	    	}
	    }
	});   
}

jQuery(function($){
	$('.mobile-menu').click(function () {
	    business_accounting_menuAccessibility();
  	});
  	$('.search-toggle').click(function () {
	    business_accounting_trapFocus($('.search-outer'));
  	});
});

function business_accounting_search_open() {
	jQuery(".search-outer").addClass('show');
}
function business_accounting_search_close() {
	jQuery(".search-outer").removeClass('show');
}

function business_accounting_trapFocus(elem) {

    var business_accounting_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');

    var business_accounting_firstTabbable = business_accounting_tabbable.first();
    var business_accounting_lastTabbable = business_accounting_tabbable.last();
    /*set focus on first input*/
    business_accounting_firstTabbable.focus();

    /*redirect last tab to first input*/
    business_accounting_lastTabbable.on('keydown', function (e) {
        if ((e.which === 9 && !e.shiftKey)) {
            e.preventDefault();
            business_accounting_firstTabbable.focus();
        }
    });

    /*redirect first shift+tab to last input*/
    business_accounting_firstTabbable.on('keydown', function (e) {
        if ((e.which === 9 && e.shiftKey)) {
            e.preventDefault();
            business_accounting_lastTabbable.focus();
        }
    });

    /* allow escape key to close insiders div */
    elem.on('keyup', function (e) {
        if (e.keyCode === 27) {
            elem.hide();
        }
        ;
    });
};