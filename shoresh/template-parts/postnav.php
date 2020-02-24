<?php
/**
 * Template part for displaying posts navigation
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shoresh
 */

?>

		<div class="navigation">
  <div class="nav-newer clear-fix">
    <?php $nextPost = get_next_post(); if($nextPost): ?>
      <?php if (has_post_thumbnail( $nextPost->ID ) ): ?>
        <?php $nextthumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($nextPost->ID), 'secondary-thumb' ); $nextthumbnail = $nextthumbnail[0]; ?>
      <?php else :
        $nextthumbnail = get_stylesheet_directory_uri() . '/images/default-featured.jpg'; ?>
      <?php endif; ?>
      <div class="thumb" style="background-image:url(<?php echo $nextthumbnail; ?>);"><a href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>"></a></div>
      <div class="entry">
        <div class="label"><?php echo __( 'Next post', 'shoresh' ); ?></div>
        <h4><?php next_post_link('%link'); ?></h4>
      </div>
    <?php endif; ?>
  </div>
  <div class="nav-older clear-fix">
    <?php $prevPost = get_previous_post(); if($prevPost): ?>
      <?php if (has_post_thumbnail( $prevPost->ID ) ): ?>
        <?php $prevthumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($prevPost->ID), 'secondary-thumb' ); $prevthumbnail = $prevthumbnail[0]; ?>
      <?php else :
        $prevthumbnail = get_stylesheet_directory_uri() . '/images/default-featured.jpg'; ?>
      <?php endif; ?>
      <div class="thumb" style="background-image:url(<?php echo $prevthumbnail; ?>);"><a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>"></a></div>
      <div class="entry">
        <div class="label"><?php echo __( 'Previous post', 'shoresh' ); ?></div>
        <h4><?php previous_post_link('%link'); ?></h4>
      </div>
    <?php endif; ?>
  </div>
</div>