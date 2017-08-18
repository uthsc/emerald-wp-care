<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

    <div id="page" role="main">
      <div class="row">

        <!--Main Content-->
        <article class="columns medium-push-2 medium-10 large-7">
          <h1>UTHSC News</h1><hr>

<!--            --><?php //get_uthsc_orbit_slider() ?>

            <?php if ( have_posts() ) : ?>

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
                <?php endwhile; ?>

            <?php else : ?>
                <?php get_template_part( 'template-parts/content', 'none' ); ?>

            <?php endif; // End have_posts() check. ?>

            <?php /* Display navigation to next/previous pages when applicable */ ?>
            <?php
            if ( function_exists( 'foundationpress_pagination' ) ) :
                foundationpress_pagination();
            elseif ( is_paged() ) :
                ?>
              <nav id="post-nav">
                <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
                <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
              </nav>
            <?php endif; ?>
        </article>

        <!--Left sidebar-->
        <div class="columns medium-pull-10 small-4 medium-2 large-pull-7 ">
          <aside class="" id="sticky-sidebar" data-sticky-container>
            <div class="sticky" data-sticky data-top-anchor="sticky-sidebar" data-btm-anchor="sticky-sidebar-end:top" data-sticky-on="medium">
                <?php dynamic_sidebar( 'left-sidebar-widgets' ); ?>
            </div>
          </aside>
        </div>

        <!--Right Sidebar-->
        <div class="columns small-8 medium-11 large-3">
          <aside class="sidebar" id="sticky-sidebar" data-sticky-container>
            <div class="sticky" data-sticky data-top-anchor="sticky-sidebar" data-btm-anchor="sticky-sidebar-end:top" data-sticky-on="large">
              <?php get_sidebar(); ?>
            </div>
          </aside>
        </div>


      </div>
    </div>

<?php get_footer();
