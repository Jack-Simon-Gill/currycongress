<?php get_header(); ?>

                    <div class="row mt-5 mb-5 justify-content-around">
                        <div class="col">
                            <h1 class="page-title text-center" itemprop="headline"><?php _e( 'Search Results for:', 'bonestheme' ); ?> <?php echo esc_attr(get_search_query()); ?></h1>
                        </div>
                    </div>
                    <div class="row justify-content-around mb-5">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="col-lg-6 col-xl-4 col-12">
                            <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf hvr-glow' ); ?> role="article">
                                <a href="<?php the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="img-fluid w-100"></a>
                                <header class="article-header">
                                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                    <?php if ( get_post_type( get_the_ID() ) == 'review_type' ) {?>
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
                                    <?php } ?>
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
								<?php bones_page_navi(); ?>
							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Sorry, No Results.', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Try your search again.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the search.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>
<?php get_footer(); ?>
