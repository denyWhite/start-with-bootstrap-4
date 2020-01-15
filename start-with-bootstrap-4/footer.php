<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage start-with-bootstrap-4
 */
?>
	<footer class="bg-dark">
		<div class="container">
					<?php $args = array(
                        'menu_id' => '',
						'theme_location' => 'bottom',
						'container'=> false,
						'menu_class' => 'nav',
				  		'fallback_cb' => false,
                        'depth' => 1,
                        'walker' => new bootstrap_menu4_bottom()
				  	);
					wp_nav_menu($args);
					?>
		</div>
	</footer>
<?php wp_footer(); ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
