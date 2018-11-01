<?php get_header(); ?>

			<div class="row mt-5 mb-5 justify-content-around">
                <div class="col">
                    <h1 class="page-title text-center" itemprop="headline"><?php the_title(); ?></h1>
                </div>
            </div>
            <div class="row justify-content-around mb-5">
                <div class="col-lg-8 col-12 white-bg p-5">
                    <?php the_content(); ?>
                </div>
			</div>

<?php get_footer(); ?>
