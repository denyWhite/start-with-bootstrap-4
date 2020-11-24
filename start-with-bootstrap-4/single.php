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
                        <p class="nav-right"><a href="/blog">На главную</a></p>
						<h1 class="title"><?php the_title(); ?></h1>
                        <div class="meta">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><span class="pseudo">&#8249;date&#8250;</span><?php the_time(get_option('date_format')); echo "&nbsp;г."; ?><span class="pseudo">&#8249;/date&#8250;</span></li>
                                    <?php $cats = get_the_category_list(', '); ?>
                                    <?php if ($cats) :?><li class="breadcrumb-item"><?= $cats; ?></li><?php endif;?>
                                    <?php $tags = get_the_tag_list('', ', ', ''); ?>
                                    <?php if ($tags): ?><li class="breadcrumb-item"><?= $tags; ?></li><?php endif;?>
                                </ol>
                            </nav>
                        </div>
						<?php the_content(); ?>
					</article>
				<?php endwhile; ?>
                <?php previos_and_next();?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
