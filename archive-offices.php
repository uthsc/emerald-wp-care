<?php get_header(); ?>
    <div id="page" role="main">

        <!-- Row for main content area -->
        <div class="row">
            <!--Main Content-->
            <div class="columns">
                <article class="row small-up-2 medium-up-6 large-up-8" data-equalizer>
                    <h1>Offices</h1>
                    <hr>
                    <?php if (have_posts()) : ?>
                        <?php /* Start the Loop */ ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('template-parts/content', get_post_type()); ?>
                        <?php endwhile; ?>

                    <?php else : ?>
                        <?php get_template_part('template-parts/content', 'none'); ?>

                    <?php endif; // End have_posts() check. ?>

                    <?php /* Display navigation to next/previous pages when applicable */ ?>
                    <?php
                    if (function_exists('foundationpress_pagination')) :
                        foundationpress_pagination();
                    elseif (is_paged()) :
                        ?>
                        <nav id="post-nav">
                            <div class="post-previous"><?php next_posts_link(__('&larr; Older posts', 'foundationpress')); ?></div>
                            <div class="post-next"><?php previous_posts_link(__('Newer posts &rarr;', 'foundationpress')); ?></div>
                        </nav>
                    <?php endif; ?>
                </article>
            </div>
        </div>
    </div>

<?php get_footer();

