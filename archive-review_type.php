<?php
/*
 * CUSTOM POST TYPE ARCHIVE TEMPLATE
 *
 * This is the custom post type archive template. If you edit the custom post type name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is called "register_post_type( 'bookmarks')",
 * then your template name should be archive-bookmarks.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>
            <div class="row text-center mt-lg-5 mt-2 mb-lg-5 mb-2">
                <div class="col">
                    <h1><?php post_type_archive_title(); ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php $count = 0; ?>
                    <?php if (have_posts()) : ?>
                        <div class="row">
                            <?php while (have_posts()) : the_post(); $count++;?>
                                <div class="col-lg-6 col-xl-4 col-12">
                                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf hvr-glow' ); ?> role="article">
                                            <a href="<?php the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="img-fluid w-100"></a>
                                            <header class="article-header">
                                                <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                                <p class="byline vcard"><?php
                                                    printf( __( 'Posted', 'bonestheme').' <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> '.__( 'by',  'bonestheme').' <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
                                                </p>
                                                <p class="mt-2 font-weight-bold">Rating: <?php the_field('rating');?>/8</p>
                                                <div class="rating" data-rating="<?php the_field('rating');?>">
                                                    <i class="star-1">★</i>
                                                    <i class="star-2">★</i>
                                                    <i class="star-3">★</i>
                                                    <i class="star-4">★</i>
                                                    <i class="star-5">★</i>
                                                    <i class="star-6">★</i>
                                                    <i class="star-7">★</i>
                                                    <i class="star-8">★</i>
                                                </div>
                                            </header>
                                            <section class="entry-content cf">
                                                <?php the_excerpt(); ?>
                                            </section>
                                            <?php
                                            $location = get_field('location');
                                            if( !empty($location) ):
                                                ?>
                                                <div class="acf-map">
                                                    <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                                                </div>
                                            <?php endif; ?>
                                        </article>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                    <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <?php bones_page_navi(); ?>
            </div>

<?php get_footer(); ?>
