<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shoresh
 */

?>

	</div><!-- #content -->
<div class="fullwrapp">
   <aside id="secondary" class="widget-area"><?php
    if(is_active_sidebar('footer-sidebar-1')){
    dynamic_sidebar('footer-sidebar-1');
    }
    ?>
</aside>
</div>

	<footer id="colophon" class="site-footer">
		<div class="site-info">

<?php 
    
echo get_theme_mod('shoresh_footer_text','Copyright © 2019','shoresh');
 
?>
 

		</div><!-- .site-info -->
        <a id="button" class="gototop"></a>
	</footer>
		<!-- Back to top button -->
</div><!-- #page -->

<?php wp_footer(); ?>
 <script>
var btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

</script> 
</body>
</html>
