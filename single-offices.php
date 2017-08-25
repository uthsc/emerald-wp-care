<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrTxR-KtWbAX4BmI6ph7mrjHRmURS0Yu8"></script>

<?php
//if 'show hero' image has been selected
if (get_field('uthsc_show_post_hero_image', $post_id)) {
    //if a hero image has been uploaded
    $hero_img = get_field('uthsc_post_hero_image');
    if (!empty($hero_img)) {

        //load the post hero image
        get_template_part('template-parts/uthsc-post-hero');
    } else {
        //otherwise load the featured image
        get_template_part('template-parts/featured-image');
    }
}
?>
    <div id="single-post" role="main" class="row">

        <?php do_action('foundationpress_before_content'); ?>
        <?php while (have_posts()) :
        the_post(); ?>
        <div class="columns">
            <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
                <header>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                <?php do_action('foundationpress_post_before_entry_content'); ?>
                <div class="entry-content">
                    <div class="row">
                        <div class="columns medium-6 large-8">
                            <!--============================================-->
                            <?php
                            $care_image = uthsc_get_acf('care_image_url', get_the_ID(), '', '');
                            if (!empty($care_image)): ?>
                                <figure class="uthsc-figure thumbnail">
                                    <img src="<?php echo uthsc_get_acf('care_image_url', get_the_ID(), '', ''); ?>"
                                         alt="<?php echo uthsc_get_acf('care_image_alt', get_the_ID(), '', ''); ?>"
                                         width="100%"
                                         height="">
                                    <figcaption><?php echo uthsc_get_acf('care_image_caption', get_the_ID(), '', ''); ?></figcaption>
                                </figure>
                            <?php endif; ?>

                            <!--============================================-->
                            <?php

                            $image = get_field('care_upload_image');
                            if (!empty($image)): ?>

                                <figure class="uthsc-figure thumbnail">
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                                    <figcaption><?php echo uthsc_get_acf('care_image_caption', get_the_ID(), '', ''); ?></figcaption>
                                </figure>
                            <?php endif; ?>

                            <!--============================================-->
                            <?php
                            $care_iframe = uthsc_get_acf('care_iframe', get_the_ID(), '', '');
                            if (!empty($care_iframe)): ?>
                                <figure class="uthsc-figure thumbnail care-streetview-iframe">
                                    <?php echo uthsc_get_acf('care_iframe', get_the_ID(), '', ''); ?>
                                    <figcaption><?php echo uthsc_get_acf('care_image_caption', get_the_ID(), '', ''); ?></figcaption>
                                </figure>
                            <?php endif; ?>
                            <!--============================================-->

                            <?php echo uthsc_get_acf('care_description', get_the_ID(), '', ''); ?>
                            <!--                                --><?php //the_content(); ?>
                        </div>
                        <div class="columns medium-6 large-4 callout">
                            <?php

                            $location = get_field('care_map');

                            if (!empty($location)):
                                ?>
                                <div class="acf-map">
                                    <div class="marker" data-lat="<?php echo $location['lat']; ?>"
                                         data-lng="<?php echo $location['lng']; ?>"></div>
                                </div>
                            <?php endif; ?>


                            <dl class="care-office-list">
                                <dt><span class="fa fa-link fa-fw"></span> <a
                                            href="<?php echo uthsc_get_acf('care_webpage_link', get_the_ID(), '', ''); ?>"><?php echo uthsc_get_acf('care_webpage_link_text', get_the_ID(), '', ''); ?></a>
                                </dt>
                                <dt>
                                    <span class="fa fa-phone fa-fw"></span> <?php echo uthsc_get_acf('care_phone', get_the_ID(), '', ''); ?>
                                </dt>
                                <dt><span class="fa fa-envelope fa-fw"></span> <a
                                            href="mailto:<?php echo uthsc_get_acf('care_email', get_the_ID(), '', ''); ?>"><?php echo uthsc_get_acf('care_email', get_the_ID(), '', ''); ?></a>
                                </dt>


                                <dt>
                                    <span class="fa fa-clock-o fa-fw"></span> <?php echo uthsc_get_acf('care_hours', get_the_ID(), '', ''); ?>
                                </dt>
                                <dt><span class="fa fa-map-marker fa-fw"
                                          style="height: 2.5rem;float: left;margin-top: 0.2rem;"></span> <?php echo uthsc_get_acf('care_address', get_the_ID(), '', ''); ?>
                                </dt>
                            </dl>


                            <a class="button large fa fa-comment expanded"> Contact this office</a>


                        </div>
                    </div>
                </div>
                <!--                        --><?php //echo do_shortcode('[offices]'); ?>



                <?php edit_post_link(__('Edit', 'foundationpress'), '<span class="edit-link">', '</span>'); ?>
        </div>
        <footer>
            <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'foundationpress'), 'after' => '</p></nav>')); ?>
            <p><?php the_tags(); ?></p>
        </footer>
        <!--      --><?php //the_post_navigation(); ?>
        <?php do_action('foundationpress_post_before_comments'); ?>
        <?php comments_template(); ?>
        <?php do_action('foundationpress_post_after_comments'); ?>
        </article>
    </div>
<?php endwhile; ?>

<?php do_action('foundationpress_after_content'); ?>

    </div>
<?php get_footer();
