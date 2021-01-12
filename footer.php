    <section class="s-extra">

        <div class="row top">

            <div class="col-eight md-six tab-full popular">
                <h3>
                    <?php _e( 'Popular Posts', 'philosophy' ); ?>
                </h3>

                <div class="block-1-2 block-m-full popular__posts">

                    <?php  
                        $philosophy_popular_post = new WP_Query(array(
                            'posts_per_page' => 6,
                            'ignore_stricky_post'=> 1,
                            'orderby' => 'comment_count',
                        ));

                        while( $philosophy_popular_post -> have_posts() ):
                            $philosophy_popular_post -> the_post();
                    ?>
                        <article class="col-block popular__post">
                            <a href="<?php the_permalink(); ?>" class="popular__thumb">
                                <?php 
                                    the_post_thumbnail();
                                ?>
                            </a>
                            <h5><a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a></h5>
                            <section class="popular__meta">
                                    <span class="popular__author"><span><?php _e( 'By', 'philosophy' ); ?></span> <a href="<?php echo esc_url(get_the_author_posts(get_the_author_meta( 'ID' ))); ?>"><?php the_author(); ?></a></span>
                                <span class="popular__date"><span><?php _e( 'In', 'philosophy' ); ?></span> 
                                    <time datetime="2017-12-19">
                                        <?php echo get_the_date(); ?>
                                    </time>
                                </span>
                            </section>
                        </article>
                    <?php 
                        endwhile; 
                        wp_reset_query();
                    ?>
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->
            
            <div class="col-four md-six tab-full about">
                <?php 
                    if (is_active_sidebar('before-footer')) {
                       dynamic_sidebar('before-footer');
                    }
                ?>
            </div> <!-- end about -->

        </div> <!-- end row -->

        <div class="row bottom tags-wrap">
            <div class="col-full tags">
                <h3>Tags</h3>

                <div class="tagcloud">
                    <?php
                       the_tags( ' ', ' ', ' ');
                    ?>
                </div> <!-- end tagcloud -->
            </div> <!-- end tags -->
        </div> <!-- end tags-wrap -->

    </section> <!-- end s-extra -->


    <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-two md-four mob-full s-footer__sitelinks">
                        
                    <h4>
                        <?php _e( 'Quick Links', 'philosophy' ); ?>
                    </h4>

                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer-left',
                            'menu_id' => 'footer-left',
                            'menu_class' => 's-footer__linklist',
                        )); 
                    ?>

                </div> <!-- end s-footer__sitelinks -->

                <div class="col-two md-four mob-full s-footer__archives">
                        
                    <h4>
                        <?php _e( 'Archive', 'philosophy' ); ?>
                    </h4>

                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer-middle',
                            'menu_id' => 'footer-middle',
                            'menu_class' => 's-footer__linklist',
                        )); 
                    ?>

                </div> <!-- end s-footer__archives -->

                <div class="col-two md-four mob-full s-footer__social">
                        
                    <h4><?php _e( 'Social', 'philosophy' ); ?></h4>

                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer-right',
                            'menu_id' => 'footer-right',
                            'menu_class' => 's-footer__linklist',
                        )); 
                    ?>


                </div> <!-- end s-footer__social -->

                <div class="col-five md-full end s-footer__subscribe">
                        
                    <?php  
                        if (is_active_sidebar( 'footer-bottom-right' )) {
                            dynamic_sidebar( 'footer-bottom-right' );
                        }
                    ?>

                    <div class="subscribe-form">
                        <form id="mc-form" class="group" novalidate="true">

                            <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                
                            <input type="submit" name="subscribe" value="Send">
                
                            <label for="mc-email" class="subscribe-message"></label>
                
                        </form>
                    </div>

                </div> <!-- end s-footer__subscribe -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">
                <div class="col-full">
                    <div class="s-footer__copyright">
                        <?php  
                        if (is_active_sidebar( 'footer-bottom' )) {
                            dynamic_sidebar( 'footer-bottom' );
                        }
                    ?>
                    </div>

                    <div class="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"></a>
                    </div>
                </div>
            </div>
        </div> <!-- end s-footer__bottom -->

    </footer> <!-- end s-footer -->


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


    <?php 
   		wp_footer();
    ?>

</body>

</html>