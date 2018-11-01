<?php get_header(); ?>
                        <div class="row mt-5 mb-5 justify-content-around">
                            <div class="col">
                                <h1 class="page-title text-center" itemprop="headline">News</h1>
                            </div>
                        </div>
                            <div class="row justify-content-around mb-5">
                                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                    <div class="col-lg-6 col-xl-4 col-12">
                                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf hvr-glow' ); ?> role="article">
                                            <a href="<?php the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="img-fluid w-100"></a>
                                            <header class="article-header">
                                                <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                                <p class="byline vcard mb-3"><?php
                                                    printf( __( 'Posted', 'bonestheme').' <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> '.__( 'by',  'bonestheme').' <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
                                                </p>
                                            <section>
                                                <?php the_excerpt(); ?>
                                            </section>
                                        </article>
                                    </div>
                                <?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>


                            </div>


<?php get_footer(); ?>
