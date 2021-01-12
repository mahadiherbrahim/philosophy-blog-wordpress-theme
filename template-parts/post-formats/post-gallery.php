<article <?php post_class('masonry__brick entry format-gallery'); ?> data-aos="fade-up">
    
    <?php 
        if(class_exists('Attachments')):
            $attachments = New Attachments("gallery");
            if ( $attachments ->exist() ) :
     ?>

    <div class="entry__thumb slider">
        <div class="slider__slides">
            <?php 
                while ( $attachment = $attachments->get() ) :
             ?>
            <div class="slider__slide">
                <?php 
                    echo wp_kses_post($attachments->image('philosophy_home_square')) ;
                 ?> 
            </div>
            <?php 
                endwhile;
             ?>
        </div>
    </div>
    <?php 
            endif;
        endif;
    ?>
    <?php 
        get_template_part( 'template-parts/common/post/summery' );
    ?>
    
</article> <!-- end article -->