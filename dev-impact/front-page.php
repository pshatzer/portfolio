<?php
	/**
	 * The front page template file
	 */
	get_header(); 
	$video = get_field('bg_video');
	$bio = get_field('bio');
?>

<html>
	<body>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="intro">
  			<div class="headlinetext">
  				<?php the_content(); ?>
  			</div>
  			<video id="header-video" width="100%" height="100%" autoplay loop>
  				<source src="<?php echo $video; ?>"  type="video/mp4" />
  			</video>
		</div>

		<?php 
		endwhile;
		endif; 
		?>
		<div id="wrap" class="wrapper">
			<div id="port" class="portfolio">
				<div class="portfolio-inner"><?php echo $bio; ?></div>
			</div>
			<?php $contentCount = 0;
			$args = array(
            'post_type' => 'project',
            'suppress_filters' => false,
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
	        );

	        $query = new WP_Query( $args );
	        if ( $query->have_posts() ) :
	        while ( $query->have_posts() ) : $query->the_post();
	    	
	    	$inlineLink = get_field('work_link');
	    	$sectionBgColor = get_field('section_color');
	    	$sideBgColor = get_field('sidebar_bg_color');
	    	$sideFontColor = get_field('sidebar_font_color');
	    	$mainBgColor = get_field('main_bg_color');
	    	$mainFontColor = get_field('main_font_color');
	    	$company = get_field('work_company');
	    	$title = get_field('work_title');
	    	$location = get_field('work_location');
	    	$time = get_field('work_length');
	    	$desc = get_field('work_description');
	    	$url = get_field('work_site');
	    	$iframe = get_field('work_iframe');
	    	$dark = get_field('work_dark');
	    	
	    	if (has_term('gannett', 'project_type')){
	        	$companyUrl = 'http://gannettgovernmentmedia.com';
	    	} elseif (has_term('prophecy', 'project_type')){
	    		$companyUrl = 'http://awordofprophecy.com';
	    	} elseif (has_term('vanchic', 'project_type')){
	    		$companyUrl = 'http://vanchic.com';
	    	} elseif (has_term('onward', 'project_type')){
	    		$companyUrl = 'http://onwardsearch.com';
	    	} elseif (has_term('spine', 'project_type')){
	    		$companyUrl = 'http://spinellc.com';
	    	}
	    	
	    	if (!empty($sideFontColor) || !empty($mainFontColor)) { ?>
	        <style>
	        	<?php 
	        		if (!empty($sideFontColor)) { ?>
	        		.content.section-<?php echo $contentCount; ?> .sidebar, .content.section-<?php echo $contentCount; ?> .sidebar2, .content.section-<?php echo $contentCount; ?> .sidebar3, .content.section-<?php echo $contentCount; ?> .sidebar4 {
	        			color:<?php echo $sideFontColor; ?>;
	        		}
	        	<?php }
	        		if (!empty($mainFontColor)) { ?>
		        	.content.section-<?php echo $contentCount; ?> .main, .content.section-<?php echo $contentCount; ?> .main2, .content.section-<?php echo $contentCount; ?> .main3, .content.section-<?php echo $contentCount; ?> .main4 {
		        		color:<?php echo $mainFontColor; ?>;
		        	}
		        <?php } ?>
	        </style>
	        <?php } ?>
	        <div id="<?php echo $inlineLink; ?>" class="innerwrapper" style="background-color: <?php echo $sectionBgColor; ?>;">
			    <div class="content section-<?php echo $contentCount; ?>">

			    <!--desktop-->

			        <div class="sidebar<?php if ($contentCount & 1) {echo '2';} ?> desktop" style="background-color:<?php echo $sideBgColor; ?> ;">
			        	<?php if (!empty($url)) { echo '<h2><a href="' . $url . '" target="_blank">' . $title . '</a></h2>' . $desc . '<h3><font style="font-size:14px;">Working with:</font><br><a href="' . $companyUrl . '" target="_blank">' . $company . '</a></h3>';
			        		} else { echo '<h2>' . $title . '</h2>' . $desc . '<h3><font style="font-size:14px;">Working with:</font><br><a href="' . $companyUrl . '" target="_blank">' . $company . '</a></h3>'; 
			        		} ?>
			        	<div class="fixed-footer-nav">
							<a href="#port"><div><span class="dashicons dashicons-arrow-up-alt2"></span></div></a>
							<a href="#foot"><div><span class="dashicons dashicons-arrow-down-alt2"></span></div></a>
						</div>
			        </div>
			        <div class="main<?php if ($contentCount & 1) {echo '2';} ?> desktop" style="background-color:<?php echo $mainBgColor; ?> ;">

			        	<?php if (have_rows('work_display')) :
	                        while (have_rows('work_display')) : the_row();
	                    	$text = get_sub_field('image_description');
	                    	$desk = get_sub_field('desktop_image');
	                    	$tab = get_sub_field('tablet_image');
	                    	$phone = get_sub_field('phone_image');

	                    	if (!empty($text)) { echo '<h1>' . $text . '</h1>'; }
	                    	if (!empty($desk)) { echo '<img src="' . $desk . '">'; }
	                    	if (!empty($tab)) { echo '<img src="' . $tab . '">'; }
	                    	if (!empty($phone)) { echo '<img src="' . $phone . '">'; } 
	                    	?>

	                    <?php endwhile; endif; ?>

			        </div>
			        <div class="clear desktop"></div>

			        <!--/desktop-->
			        <!--mobile-->

			        <div class="sidebar<?php echo '3'; ?> mobile" style="background-color:<?php echo $sideBgColor; ?> ;">
			        	<?php if (!empty($url)) { echo '<h2><a href="' . $url . '" target="_blank">' . $title . '</a></h2>' . $desc . '<h3><font style="font-size:14px;">Working with:</font><br><a href="' . $companyUrl . '" target="_blank">' . $company . '</a></h3>';
			        		} else { echo '<h2>' . $title . '</h2>' . $desc . '<h3><font style="font-size:14px;">Working with:</font><br><a href="' . $companyUrl . '" target="_blank">' . $company . '</a></h3>'; 
			        		} ?>
			        	<div class="fixed-footer-nav">
							<a href="#port"><div><span class="dashicons dashicons-arrow-up-alt2"></span></div></a>
							<a href="#foot"><div><span class="dashicons dashicons-arrow-down-alt2"></span></div></a>
						</div>
			        </div>
			        <div class="main<?php echo '3'; ?> mobile" style="background-color:<?php echo $mainBgColor; ?> ;">

			        	<?php if (have_rows('work_display')) :
	                        while (have_rows('work_display')) : the_row();
	                    	$desc = get_sub_field('image_description');
	                    	$desk = get_sub_field('desktop_image');
	                    	$tab = get_sub_field('tablet_image');
	                    	$phone = get_sub_field('phone_image');

	                    	if (!empty($desc)) { echo '<h1>' . $desc . '</h1>'; }
	                    	if (!empty($desk)) { echo '<img src="' . $desk . '">'; }
	                    	if (!empty($tab)) { echo '<img src="' . $tab . '">'; }
	                    	if (!empty($phone)) { echo '<img src="' . $phone . '">'; } 
	                    	?>

	                    <?php endwhile; endif; ?>

			        </div>

			        <!--/mobile-->

			    </div>
			</div>
			<hr class="mobile">
	        <?php
	        $contentCount++;
	        endwhile;
	        else:
	        endif;
	      	?>  

			<?php get_footer(); ?>