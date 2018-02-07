<?php
/**
 * The front page template file
 */
get_header(); 
?>

<html>
	<body>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="intro">
  			<div class="headlinetext">
  				<?php the_content(); ?>
  			</div>
		</div>

		<?php endwhile;
		endif; ?>
		<?php wp_footer(); ?>
	</body>
</html>