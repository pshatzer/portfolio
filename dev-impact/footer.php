<?php
/**
 * The template for displaying the footer
 */

?>
			
			<footer id="foot" >
				<div class="footer-wrapper">
					<h2>My Info</h2>
					<div class="col-wrapper">
						<div id="footer-sm" class="footer-content">
							<h3>Social Media:</h3>
							<a href="https://www.linkedin.com/in/peter-shatzer-11196729" target="_blank">LinkedIn</a></br>
							<a href="https://twitter.com/petershatzer" target="_blank">Twitter</a></br>
						</div>
						<div id="footer-info" class="footer-content">
							<h3>Call or Email Anytime:</h3>
							<img id="mail" src="<?php echo THEME_IMAGES . '/mail.png'; ?>"><br>
							<img id="num" src="<?php echo THEME_IMAGES . '/num.png'; ?>">
						</div>
						<div id="footer-available" class="footer-content">
							<h3>Current Availability:</h3>
							<p>Contract/1099 after 5pm EST and anytime on weekends.</p>
						</div>
						<div id="footer-location" class="footer-content">
							<h3>Location:</h3>
	                        <p>I'm in Northeastern United States, <a href="https://www.google.com/maps/place/New+Canaan" target="_blank">New Canaan, CT</a>.<br>Right outside New York City.</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>