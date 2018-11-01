<?php get_header(); ?>
<div itemscope itemtype="http://schema.org/Place">
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="hentry mb-0">
                        <?php
                        if ( function_exists('yoast_breadcrumb') ) {
                            yoast_breadcrumb( '<p id="breadcrumbs" class="m-0 p-3">','</p>' );
                        }
                        ?>
                    </div>
                </div>
            </div>
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="img-fluid w-100">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php get_template_part( 'curry-formats/format', get_post_format() ); ?>
            <?php endwhile; ?>
            <?php else : ?>
                <article id="post-not-found" class="hentry cf">
                    <header class="article-header">
                        <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                    </header>
                    <section class="entry-content">
                        <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                    </section>
                    <footer class="article-footer">
                        <p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
                    </footer>
                </article>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
