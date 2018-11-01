
              <?php
                /*
                 * This is the default post format.
                 *
                 * So basically this is a regular post. if you don't want to use post formats,
                 * you can just copy ths stuff in here and replace the post format thing in
                 * single.php.
                 *
                 * The other formats are SUPER basic so you can style them as you like.
                 *
                 * Again, If you want to remove post formats, just delete the post-formats
                 * folder and replace the function below with the contents of the "format.php" file.
                */
              ?>
              <div itemprop="review" itemscope itemtype="http://schema.org/Review">
                  <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

                    <header class="article-header entry-header text-center">

                      <h1 class="entry-title single-title" itemprop="headline" rel="bookmark" itemprop="name"><?php the_title(); ?></h1>
                        <div class="font-italic">
                        <span class="font-weight-bold">
                            <?php
                            $pricerating = get_field('price_rating');
                            for ($x = 0; $x < $pricerating; $x++) {
                                echo "£ ";
                            } ?>
                        </span>
                        <?php $pound = 5-$pricerating;
                        for ($x = 0; $x < $pound; $x++) {
                            echo "£ ";
                        } ?>
                        </div>


                      <p class="byline entry-meta vcard">

                        <?php printf( __( 'Posted', 'bonestheme' ).' %1$s %2$s',
                           /* the time the post was published */
                           '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
                           /* the author of the post */
                           '<span class="by"itemprop="author">'.__( 'by', 'bonestheme' ).'</span> <span class="entry-author author" itemprop="author">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
                        ); ?>
                      </p>
                        <hr>
                        <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
                            <meta itemprop="worstRating" content = "1">
                            <p class="mt-2 font-weight-bold">Overall rating: <span itemprop="ratingValue"><?php the_field('rating');?></span>/<span itemprop="bestRating">8</span></p>
                        </div>
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
                        <div class="row justify-content-center mb-lg-5 mb-2">
                            <div class="col-lg-4 col-12">
                                <p class="mt-2 font-weight-bold">Food: <?php the_field('food_rating');?>/8</p>
                                <div class="rating" data-rating="<?php the_field('food_rating');?>">
                                    <i class="star-1">★</i>
                                    <i class="star-2">★</i>
                                    <i class="star-3">★</i>
                                    <i class="star-4">★</i>
                                    <i class="star-5">★</i>
                                    <i class="star-6">★</i>
                                    <i class="star-7">★</i>
                                    <i class="star-8">★</i>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <p class="mt-2 font-weight-bold">Decor: <?php the_field('decor_rating');?>/8</p>
                                <div class="rating" data-rating="<?php the_field('decor_rating');?>">
                                    <i class="star-1">★</i>
                                    <i class="star-2">★</i>
                                    <i class="star-3">★</i>
                                    <i class="star-4">★</i>
                                    <i class="star-5">★</i>
                                    <i class="star-6">★</i>
                                    <i class="star-7">★</i>
                                    <i class="star-8">★</i>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <p class="mt-2 font-weight-bold">Service: <?php the_field('service_rating');?>/8</p>
                                <div class="rating" data-rating="<?php the_field('service_rating');?>">
                                    <i class="star-1">★</i>
                                    <i class="star-2">★</i>
                                    <i class="star-3">★</i>
                                    <i class="star-4">★</i>
                                    <i class="star-5">★</i>
                                    <i class="star-6">★</i>
                                    <i class="star-7">★</i>
                                    <i class="star-8">★</i>
                                </div>
                            </div>
                        </div>

                    </header> <?php // end article header ?>

                    <section class="entry-content cf" itemprop="description">

                        <?php
                        $quote = get_field('quote');
                        if ($quote != null) {
                            echo '<p class="quote text-center font-italic"><i class="fas fa-quote-left"></i> '.$quote.'... <i class="fas fa-quote-right"></i>';
                        } ?>
                        <?php
                        // the content (pretty self explanatory huh)
                        the_content();

                        /*
                         * Link Pages is used in case you have posts that are set to break into
                         * multiple pages. You can remove this if you don't plan on doing that.
                         *
                         * Also, breaking content up into multiple pages is a horrible experience,
                         * so don't do it. While there are SOME edge cases where this is useful, it's
                         * mostly used for people to get more ad views. It's up to you but if you want
                         * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
                         *
                         * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
                         *
                        */
                        wp_link_pages( array(
                          'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
                          'after'       => '</div>',
                          'link_before' => '<span>',
                          'link_after'  => '</span>',
                        ) );
                      ?>

                      <?php
                      if( have_rows('images') ) {
                          echo '<div class="row">';
                              while ( have_rows('images') ) : the_row();
                                $image = get_sub_field('image');
                                $caption = get_sub_field('caption');
                                    echo '<div class="col">';
                                        echo '<a class="example-image-link" href="'.$image['url'].'" data-lightbox="review-set" data-title="'.$caption.'"><img class="w-100 img-fluid" src="'.$image['url'].'" alt=""/></a>';
                                    echo '</div>';
                              endwhile;
                          echo '</div>';
                          } ?>
                    </section> <?php // end article section ?>
                      <?php

                      $location = get_field('location');
                      if( !empty($location) ):
                          ?>
                          <div class="acf-map">
                              <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                          </div>
                      <?php endif; ?>
                    <?php comments_template(); ?>

                  </article> <?php // end article ?>
              </div>