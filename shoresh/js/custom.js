 // Add SlickNav Mobile Menu
jQuery(function(){
    jQuery('#primary-menu').slicknav();
    jQuery('.slicknav_menu').insertBefore('#site-navigation');
    
});
//Open sub menus on Focus
jQuery( ".menu-item-has-children a" ).focus(function($this) {
   jQuery(this).parents(".sub-menu").addClass('focusopenenr');
});
jQuery( ".menu-item-has-children a" ).focusout(function($this) {
   jQuery(this).parents(".sub-menu").removeClass('focusopenenr');
});

jQuery( document ).ready(function() {
    if ( jQuery('html').attr('lang') == 'he-IL' ) {
      jQuery('.slicknav_menutxt').text('תפריט ראשי')
} else {
    // do that
}
});