<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <?php 
        wp_head();
    ?>
    <?php wp_body_open(); ?>

</head>


<body id="top" <?php body_class(); ?>>
    
    <section class="s-pageheader <?php if(is_home()){
        echo "s-pageheader--home";
    } ?>">
        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <?php  
                        if (has_custom_logo()) {
                            the_custom_logo();
                        }else{
                    ?>

                    <h1><a href="<?php echo site_url(); ?>"><?php echo get_bloginfo('name'); ?></a></h1>

                    <?php 
                        } 
                    ?>

                </div> <!-- end header__logo -->

                <?php 
                
                if (is_active_sidebar( 'header-social' )) {
                    dynamic_sidebar( 'header-social' );
                }

                ?>

                <a class="header__search-trigger" href="#0"></a>

                <div class="header__search">

                    <?php echo get_search_form(); ?>
                    <a href="#0" title="Close Search" class="header__overlay-close"><?php _e( 'Close', 'philosophy' ); ?></a>
                </div>  <!-- end header__search -->


                <?php get_template_part('template-parts/common/navigation'); ?>

            </div> <!-- header-content -->
        </header> <!-- header -->

        <?php 
            if (is_home()):
        ?>
       <?php get_template_part( 'template-parts/blog-home/featured' ); ?>
       <?php 
            endif;
        ?>

    </section> <!-- end s-pageheader -->