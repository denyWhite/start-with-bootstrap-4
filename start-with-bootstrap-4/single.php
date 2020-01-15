<?php
/**
 * Шаблон отдельной записи (single.php)
 * @package WordPress
 * @subpackage start-with-bootstrap-4
 */
get_header(); ?>
<section>
	<div class="container">
		<div class="row">
			<div class="<?php content_class_by_sidebar(); ?>">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1 class="display-3"><?php the_title(); ?></h1>
                        <div class="meta">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><?php the_time(get_option('date_format')." в ".get_option('time_format')); ?></li>
                                    <li class="breadcrumb-item"><?php the_author_posts_link(); ?></li>
                                    <li class="breadcrumb-item"><?php the_category(', ') ?></li>
                                    <li class="breadcrumb-item"><?php the_tags('', ', ', '');?></li>
                                </ol>
                            </nav>
                        </div>
						<?php the_content(); ?>
					</article>
				<?php endwhile; ?>
                <?php previos_and_next();?>
				<?php if (comments_open() || get_comments_number()) comments_template('', true); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
