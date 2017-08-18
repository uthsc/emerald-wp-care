<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrTxR-KtWbAX4BmI6ph7mrjHRmURS0Yu8"></script>
    <script type="text/javascript">
        (function($) {

            /*
            *  new_map
            *
            *  This function will render a Google Map onto the selected jQuery element
            *
            *  @type	function
            *  @date	8/11/2013
            *  @since	4.3.0
            *
            *  @param	$el (jQuery element)
            *  @return	n/a
            */

            function new_map( $el ) {

                // var
                var $markers = $el.find('.marker');


                // vars
                var args = {
                    zoom		: 16,
                    center		: new google.maps.LatLng(0, 0),
                    mapTypeId	: google.maps.MapTypeId.ROADMAP
                };


                // create map
                var map = new google.maps.Map( $el[0], args);


                // add a markers reference
                map.markers = [];


                // add markers
                $markers.each(function(){

                    add_marker( $(this), map );

                });


                // center map
                center_map( map );


                // return
                return map;

            }

            /*
            *  add_marker
            *
            *  This function will add a marker to the selected Google Map
            *
            *  @type	function
            *  @date	8/11/2013
            *  @since	4.3.0
            *
            *  @param	$marker (jQuery element)
            *  @param	map (Google Map object)
            *  @return	n/a
            */

            function add_marker( $marker, map ) {

                // var
                var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

                // create marker
                var marker = new google.maps.Marker({
                    position	: latlng,
                    map			: map
                });

                // add to array
                map.markers.push( marker );

                // if marker contains HTML, add it to an infoWindow
                if( $marker.html() )
                {
                    // create info window
                    var infowindow = new google.maps.InfoWindow({
                        content		: $marker.html()
                    });

                    // show info window when marker is clicked
                    google.maps.event.addListener(marker, 'click', function() {

                        infowindow.open( map, marker );

                    });
                }

            }

            /*
            *  center_map
            *
            *  This function will center the map, showing all markers attached to this map
            *
            *  @type	function
            *  @date	8/11/2013
            *  @since	4.3.0
            *
            *  @param	map (Google Map object)
            *  @return	n/a
            */

            function center_map( map ) {

                // vars
                var bounds = new google.maps.LatLngBounds();

                // loop through all markers and create bounds
                $.each( map.markers, function( i, marker ){

                    var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

                    bounds.extend( latlng );

                });

                // only 1 marker?
                if( map.markers.length == 1 )
                {
                    // set center of map
                    map.setCenter( bounds.getCenter() );
                    map.setZoom( 16 );
                }
                else
                {
                    // fit to bounds
                    map.fitBounds( bounds );
                }

            }

            /*
            *  document ready
            *
            *  This function will render each map when the document is ready (page has loaded)
            *
            *  @type	function
            *  @date	8/11/2013
            *  @since	5.0.0
            *
            *  @param	n/a
            *  @return	n/a
            */
// global var
            var map = null;

            $(document).ready(function(){

                $('.acf-map').each(function(){

                    // create map
                    map = new_map( $(this) );

                });

            });

        })(jQuery);
    </script>
<?php
//if 'show hero' image has been selected
if ( get_field('uthsc_show_post_hero_image', $post_id) ) {
    //if a hero image has been uploaded
    $hero_img = get_field('uthsc_post_hero_image');
    if ( !empty( $hero_img ) ){

        //load the post hero image
        get_template_part('template-parts/uthsc-post-hero');
    }
    else {
        //otherwise load the featured image
        get_template_part('template-parts/featured-image');
    }
}
?>
    <div id="single-post" role="main" class="row">

        <?php do_action( 'foundationpress_before_content' ); ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="columns">
                <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
                    <header>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>
                    <?php do_action( 'foundationpress_post_before_entry_content' ); ?>
                    <div class="entry-content">
                        <div class="row">
                            <div class="columns medium-6 large-8">
                                <figure class="uthsc-figure thumbnail care-streetview-iframe">
                                    <?php echo uthsc_get_acf('care_iframe', get_the_ID(), '', ''); ?>
                                    <figcaption><?php echo uthsc_get_acf('care_image_caption', get_the_ID(), '', ''); ?></figcaption>
                                </figure>
                                <?php echo uthsc_get_acf('care_description', get_the_ID(), '', ''); ?>
<!--                                --><?php //the_content(); ?>
                            </div>
                            <div class="columns medium-6 large-4 callout">
                                <?php

                                $location = get_field('care_map');

                                if( !empty($location) ):
                                    ?>
                                    <div class="acf-map">
                                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                                    </div>
                                <?php endif; ?>


                                        <dl class="care-office-list">
                                            <dt><span class="fa fa-link fa-fw"></span> <a href="<?php echo uthsc_get_acf('care_webpage_link', get_the_ID(), '', ''); ?>"><?php echo uthsc_get_acf('care_webpage_link_text', get_the_ID(), '', ''); ?></a></dt>
                                            <dt><span class="fa fa-phone fa-fw"></span> <?php echo uthsc_get_acf('care_phone', get_the_ID(), '', ''); ?></dt>
                                            <dt><span class="fa fa-envelope fa-fw"></span> <a href="mailto:<?php echo uthsc_get_acf('care_email', get_the_ID(), '', ''); ?>"><?php echo uthsc_get_acf('care_email', get_the_ID(), '', ''); ?></a></dt>


                                            <dt><span class="fa fa-clock-o fa-fw"></span> <?php echo uthsc_get_acf('care_hours', get_the_ID(), '', ''); ?></dt>
                                            <dt><span class="fa fa-map-marker fa-fw" style="height: 2.5rem;float: left;margin-top: 0.2rem;"></span> <?php echo uthsc_get_acf('care_address', get_the_ID(), '', ''); ?></dt>
                                        </dl>


                                        <a class="button large fa fa-comment expanded"> Contact this office</a>


                                </div></div>
                        </div>
                        <!--                        --><?php //echo do_shortcode('[offices]'); ?>



                        <?php edit_post_link( __( 'Edit', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
                    </div>
                    <footer>
                        <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
                        <p><?php the_tags(); ?></p>
                    </footer>
                    <!--      --><?php //the_post_navigation(); ?>
                    <?php do_action( 'foundationpress_post_before_comments' ); ?>
                    <?php comments_template(); ?>
                    <?php do_action( 'foundationpress_post_after_comments' ); ?>
                </article>
            </div>
        <?php endwhile;?>

        <?php do_action( 'foundationpress_after_content' ); ?>

    </div>
<?php get_footer();
