<?php
/**
 * Шаблон сайдбара (sidebar.php)
 * @package WordPress
 * @subpackage start-with-bootstrap-4
 */
?>
<?php if (is_active_sidebar( 'sidebar' )) { ?>
<aside class="col-sm-3 offset-sm-1">
	<?php dynamic_sidebar('sidebar'); ?>
</aside>
<?php } ?>