<?php
/**
 * The template for displaying the footer
 */
$footerSocial = get_field('footer_social',139);
$footerContact = get_field('footer_contact',139);
$footerWork = get_field('footer_work',139);
?>
			
			<footer id="foot">
				<div class="footer-wrapper">
					<div id="footer-contact" class="footer-content">
						<p>Social Media:</p>
						<?php echo $footerSocial; ?>
					</div>
					<div id="footer-sm" class="footer-content">
						<p>Phone or Email:</p>
						<ul>
							<li id="mail"><img src="<?php echo $footerContact; ?>"></li>
						</ul>
					</div>
					<div id="footer-location" class="footer-content">
						<p>Work Area:</p>
						<?php echo $footerWork; ?>
					</div>
				</div>
			</footer>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>