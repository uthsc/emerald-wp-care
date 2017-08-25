<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>
<div class="care-office-button column column-block">
    <a href="<?php the_permalink(); ?>" class="button expanded"
       id="post-<?php the_ID(); ?>" <?php post_class('blogpost-entry'); ?> data-equalizer-watch>
        <?php the_title(); ?>
    </a>
</div>