    </div>
			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-12">
                        <p class="source-org copyright mt-3">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
                    </div>

                    <div class="col-lg-4 col-12">
                        <nav role="navigation">
                            <?php wp_nav_menu(array(
                            'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
                            'container_class' => '',         // class of container (should you choose to use it)
                            'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
                            'menu_class' => 'nav',            // adding custom nav class
                            'theme_location' => 'footer-links',             // where it's located in the theme
                            'before' => '',                                 // before the menu
                            'after' => '',                                  // after the menu
                            'link_before' => '',                            // before each link
                            'link_after' => '',                             // after each link
                            'depth' => 0,                                   // limit the depth of the nav
                            'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
                            )); ?>
                        </nav>
                    </div>
                </div>
            </div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
