<article <?php post_class('masonry__brick entry format-link'); ?> data-aos="fade-up">

	<div class="entry__thumb">
		<div class="link-wrap">
			<?php 
				the_excerpt();
			 ?>
			<cite>
				<a target="_blank" href="<?php get_the_permalink(); ?>"><?php the_title(); ?></a>
			</cite>
		</div>
	</div>

</article> <!-- end article -->