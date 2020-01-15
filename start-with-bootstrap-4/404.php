<?php
/**
 * Страница 404 ошибки (404.php)
 * @package WordPress
 * @subpackage start-with-bootstrap-4
 */
get_header(); ?>
<section>
	<div class="container">
		<div class="row">
			<div class="<?php content_class_by_sidebar(); ?>">
				<h1>Ошибка 404</h1>
				<p>Страница не найдена</p>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>