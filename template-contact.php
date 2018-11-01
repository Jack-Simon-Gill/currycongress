<?php
/*
 Template Name: Contact
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>
<?php


?>
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
            <div class="row justify-content-around mb-5">
                <div class="col-lg-8 col-12 white-bg p-5">
                    <div class="row justify-content-around">
                        <div class="col-lg-6 col-12">
                            <form class="w-100" id="contact-form">
                                <div class="form-group  w-100">
                                    <label for="fullName">Your full name*</label>
                                    <input type="text" required class="form-control mw-100" name="fullName" id="fullName">
                                </div>
                                <div class="form-group">
                                    <label for="email">Your email*</label>
                                    <input type="email" required class="form-control mw-100" name="email" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="subject">Subject*</label>
                                    <input type="text" required class="form-control mw-100" name="subject" id="subject">
                                </div>
                                <div class="form-group">
                                    <label for="message">Message*</label>
                                    <textarea id="message" name="message" rows="5" required></textarea>
                                </div>
                                <button class="btn btn-primary float-right" type="submit">Send</button>
                            </form>
                            <div class="alert alert-success w-100 text-center p-5 d-none" role="alert" id="success">
                                Your message has been received, thank you!
                            </div>
                        </div>
                    </div>
                </div>
			</div>

<script>
    jQuery( document ).ready(function($) {
        $('#contact-form').submit(function (e) {
            e.preventDefault();
            var button_content = $(this).find('button[type=submit]');
            button_content.html('Sending...');
            $.ajax({
                data: {
                    action: 'send_contact',
                    fullName: $('#fullName').val(),
                    email: $('#email').val(),
                    subject: $('#subject').val(),
                    message: $('#message').val()
                },
                type: 'post',
                url: ajaxurl,
                success: function (data) {
                    $('#contact-form').last().addClass("d-none");
                    $('#success').removeClass("d-none");
                }
            });
        });
    });
</script>
<?php get_footer(); ?>

