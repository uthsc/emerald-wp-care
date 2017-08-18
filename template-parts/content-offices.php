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

<!--<a style="border: 1px solid;" href="--><?php //the_permalink(); ?><!--" class="column column-block " id="post---><?php //the_ID(); ?><!--" --><?php //post_class('blogpost-entry'); ?>
<!--    <header>-->
<!--        <h2>--><?php //the_title(); ?><!--</h2>-->
<!--    </header>-->
<!--    <div class="entry-content">-->
<!--        --><?php //the_content( __( 'Continue reading...', 'foundationpress' ) ); ?>
<!--    </div>-->
<!--    <footer>-->
<!--        --><?php //$tag = get_the_tags(); if ( $tag ) { ?><!--<p>--><?php //the_tags(); ?><!--</p>--><?php //} ?>
<!--        --><?php //edit_post_link('Edit Post','',''); ?>
<!--    </footer>-->
<!--</a>-->

<a href="<?php the_permalink(); ?>" class="button large column column-block " id="post-<?php the_ID(); ?>" <?php post_class('blogpost-entry'); ?>>


    <?php the_title(); ?>


</a>