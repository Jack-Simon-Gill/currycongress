<?php get_header(); ?>
    <div class="row text-center">
        <div class="col mt-3">
            <img height="65" src="<?php echo site_icon_url($size=125); ?>">
            <h1 class="mt-3 main-h1"><?php bloginfo('name'); ?></h1>
            <h2 class="mb-5"><?php bloginfo('description'); ?></h2>
        </div>
    </div>
			<div class="row justify-content-around mb-5">
                <div class="col-12 col-lg-7 p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="white-bg">
                                <h2 class="p-5 m-0">Latest Review</h2>
                            </div>
                                <?php
                                $args = array( 'post_type' => 'review_type', 'posts_per_page' => 1 );
                                $loop = new WP_Query( $args );
                                while ( $loop->have_posts() ) : $loop->the_post();
                                    $date = get_the_date();
                                    $img = get_the_post_thumbnail_url(get_the_ID(),'full');
                                    echo '<div class="white-bg">';
                                        echo '<a href="'.get_the_permalink().'"><img src="'.$img.'" class="w-100 img-fluid d-block"></a>';
                                        echo '<h2 class="ml-5 mt-5 mb-3"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';
                                        echo '<h5 class="ml-5 mt-3 mb-3">'.get_field('address').'</h5>';
                                        echo '<p class="ml-5 mt-3 mb-3 font-weight-bold font-italic">'.$date.'</p>';
                                        echo '<div class="rating ml-5 mb-3" data-rating="'.get_field('rating').'">';
                                            echo '<i class="star-1">★</i>';
                                            echo '<i class="star-2">★</i>';
                                            echo '<i class="star-3">★</i>';
                                            echo '<i class="star-4">★</i>';
                                            echo '<i class="star-5">★</i>';
                                            echo '<i class="star-6">★</i>';
                                            echo '<i class="star-7">★</i>';
                                            echo '<i class="star-8">★</i>';
                                        echo '</div>';
                                        echo '<p class="pl-5 pr-5 pb-5">'.get_the_excerpt().'</p>';
                                    echo '</div>';
                                endwhile;
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="white-bg p-5">
                                <h2>Next Congress: <span id="timer"></span></h2>
                                <h3><?php the_field('next_curry','option'); ?></h3>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <?php
                    $args = array( 'post_type' => 'review_type', 'posts_per_page' => 2, 'offset' => 1 );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                        $date = get_the_date();
                        $img = get_the_post_thumbnail_url(get_the_ID(),'full');
                        echo '<div class="row mb-5">';
                            echo '<div class="col-12 white-bg p-5 hvr-glow">';
                                echo '<a href="'.get_the_permalink().'">';
                                    echo '<div class="border p-5 hvr-glow">';
                                        echo '<img src="'.$img.'" class="w-100 img-fluid d-block">';
                                        echo '<h4 class="mt-3 mb-3">'.get_the_title().'</h4>';
                                        echo '<h5 class="mt-3 mb-3">'.get_field('address').'</h5>';
                                        echo '<p class="mt-3 mb-3 font-italic">'.$date.'</p>';
                                        echo '<div class="rating" data-rating="'.get_field('rating').'">';
                                            echo '<i class="star-1">★</i>';
                                            echo '<i class="star-2">★</i>';
                                            echo '<i class="star-3">★</i>';
                                            echo '<i class="star-4">★</i>';
                                            echo '<i class="star-5">★</i>';
                                            echo '<i class="star-6">★</i>';
                                            echo '<i class="star-7">★</i>';
                                            echo '<i class="star-8">★</i>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</a>';
                            echo '</div>';
                        echo '</div>';
                    endwhile;
                    ?>
                    <?php wp_reset_query(); ?>
                </div>
			</div>
			<div class="row justify-content-around mb-5">
                <div class="col-lg-8 col-12 white-bg p-5">
                    <?php the_content(); ?>
                </div>
			</div>
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("<?php the_field('next_curry','option'); ?>").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

        // Output the result in an element with id="demo"
        document.getElementById("timer").innerHTML = days + " days, " + hours + " hours and "
            + minutes + " minutes ";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>
<?php get_footer(); ?>
